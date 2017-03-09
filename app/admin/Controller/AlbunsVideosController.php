<?php

App::uses('AppController', 'Controller');

/**
 * AlbunsVideos Controller
 *
 * @property AlbunsVideo $AlbunsVideo
 * @property PaginatorComponent $Paginator
 */
class AlbunsVideosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index($id) {
        if (empty($id)) {
            return $this->redirect("/");
        }

        $this->paginate = array('order' => array('created' => 'desc',), 'limit' => 10, 'conditions' => array('AlbunsVideo.album_id' => $id),);

        $this->set('albunsVideos', $this->Paginator->paginate());
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

            $this->AlbunsVideo->create();
            if ($this->AlbunsVideo->save($this->request->data)) {
                $this->Session->setFlash('Registro salvo com sucesso!', 'default', array('class' => 'alert alert-success space'));
                return $this->redirect(array('action' => 'index', $this->request->data["AlbunsVideo"]['album_id']));
            } else {
                $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
            }
        }

        $albuns = $this->AlbunsVideo->Album->find('list', array("conditions" => array("Album.id" => $id)));
        $this->set(compact('albuns'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->AlbunsVideo->exists($id)) {
            throw new NotFoundException(__('Inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->AlbunsVideo->save($this->request->data)) {
                $this->Session->setFlash('Registro editado com sucesso!', 'default', array('class' => 'alert alert-success space'));
                return $this->redirect(array('action' => 'index', $this->request->data["AlbunsVideo"]['album_id']));
            } else {
                $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
            }
        } else {
            $options = array('conditions' => array('AlbunsVideo.' . $this->AlbunsVideo->primaryKey => $id));
            $this->request->data = $this->AlbunsVideo->find('first', $options);
        }

        $albuns = $this->AlbunsVideo->Album->find('list', array("conditions" => array("Album.id" => $this->request->data["AlbunsVideo"]["album_id"])));
        $this->set(compact('albuns'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->AlbunsVideo->id = $id;
        if (!$this->AlbunsVideo->exists()) {
            throw new NotFoundException(__('Inválido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->AlbunsVideo->delete()) {
            $this->Session->setFlash('Registro excluído com sucesso!', 'default', array('class' => 'alert alert-success space'));
        } else {
            $this->Session->setFlash('Registro não pode ser excluído. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
