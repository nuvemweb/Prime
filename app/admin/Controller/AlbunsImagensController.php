<?php

App::uses('AppController', 'Controller');

/**
 * AlbunsImagens Controller
 *
 * @property AlbunsImagem $AlbunsImagem
 * @property PaginatorComponent $Paginator
 */
class AlbunsImagensController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $imagem_upload = "";
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index($id = null) {
        if (empty($id)) {
            return $this->redirect("/");
        }

        $this->paginate = array('order' => array('ordem' => 'asc',), 'limit' => 100, 'conditions' => array('AlbunsImagem.album_id' => $id),);
        $this->set('albunsImagens', $this->Paginator->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {
        if (empty($id)) {
            return $this->redirect("/");
        }
        if ($this->request->is('post')) {

            foreach ($this->request->data["AlbunsImagem"]['files'] as $value) {

                $this->imagem_upload = $value;
                if (!empty($this->imagem_upload) && !empty($this->imagem_upload['name'])) {
                    App::import('Component', 'Upload');
                    $Upload = new UploadComponent();
                    $tamanhos = array(
                        "248" => "186",
                        "155" => "116",
                        );
                    $this->request->data["AlbunsImagem"]['imagem'] = $Upload->upload($this->imagem_upload, "upload" . DS . "albuns" . DS . $this->request->data["AlbunsImagem"]['album_id'] . DS, false, $tamanhos);

                    unset($this->request->data["AlbunsImagem"]['files']);

                    if ($this->request->data["AlbunsImagem"]['imagem'] != "") {

                        $this->AlbunsImagem->create();
                        if ($this->AlbunsImagem->save($this->request->data)) {
                            $this->Session->setFlash('Registro salvo com sucesso!', 'default', array('class' => 'alert alert-success space'));
                        } else {
                            $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
                        }
                    }
                }
            }
            return $this->redirect(array('action' => 'index', $this->request->data["AlbunsImagem"]['album_id']));
        }

        $albuns = $this->AlbunsImagem->Album->find('list', array("conditions" => array("Album.id" => $id)));
        $this->set(compact('albuns'));
    }

    public function edit($id = null) {
        if (!$this->AlbunsImagem->exists($id)) {
            throw new NotFoundException(__('Inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->AlbunsImagem->save($this->request->data)) {
                $this->Session->setFlash('Registro editado com sucesso!', 'default', array('class' => 'alert alert-success space'));
                return $this->redirect(array('action' => 'index', $this->request->data["AlbunsImagem"]['album_id']));
            } else {
                $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
            }
        } else {
            $options = array('conditions' => array('AlbunsImagem.' . $this->AlbunsImagem->primaryKey => $id));
            $this->request->data = $this->AlbunsImagem->find('first', $options);
        }

        $albuns = $this->AlbunsImagem->Album->find('list', array("conditions" => array("Album.id" => $this->request->data["AlbunsImagem"]["album_id"])));
        $this->set(compact('albuns'));
    }

    public function changeOrdem() {

        if ($this->request->is(array('post', 'put'))) {

            $imagem = $this->AlbunsImagem->find("first",array("conditions"=>array("AlbunsImagem.id"=>$this->request->data["id"])));

            if (!empty($imagem)) {
                $imagem["AlbunsImagem"]["ordem"] = $this->request->data["ordem"];

                if ($this->AlbunsImagem->save($this->request->data)) {
                    //$this->Session->setFlash(__('The albuns video has been saved.'));
                    //return $this->redirect(array('action' => 'index', $this->request->data["AlbunsImagem"]['album_id']));
                    exit();
                } else {
                    exit();
                   // $this->Session->setFlash(__('The albuns video could not be saved. Please, try again.'));
                }

                exit();
            }
        } 

        
    }


    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->AlbunsImagem->id = $id;

        $this->AlbunsImagem->recursive = -1;
        $album = $this->AlbunsImagem->find('first', array("conditions" => array("AlbunsImagem.id" => $id), "fields" => array("AlbunsImagem.album_id", "AlbunsImagem.imagem")));

        if (!$this->AlbunsImagem->exists()) {
            throw new NotFoundException(__('Inválido'));
        }
        $this->request->allowMethod('post', 'delete');

        App::import('Component', 'Upload');
        $Upload = new UploadComponent();
        $tamanhos = array(
            "248" => "186",
            "155" => "116",
            );
        $Upload->delete("upload" . DS . "albuns" . DS . $album["AlbunsImagem"]["album_id"] . DS, $album["AlbunsImagem"]["imagem"], false, $tamanhos);
        if ($this->AlbunsImagem->delete()) {
            $this->Session->setFlash('Registro excluído com sucesso!', 'default', array('class' => 'alert alert-success space'));
        } else {
            $this->Session->setFlash('Registro não pode ser excluído. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
        }


        return $this->redirect(array('action' => 'index', $album["AlbunsImagem"]['album_id']));
    }

}
