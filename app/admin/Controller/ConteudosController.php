<?php

App::uses('AppController', 'Controller');

/**
 * Conteudos Controller
 *
 * @property Conteudo $Conteudo
 * @property PaginatorComponent $Paginator
 */
class ConteudosController extends AppController {

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
    public function index() {
        $this->Conteudo->recursive = 0;
        $this->set('conteudos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Conteudo->exists($id)) {
            $this->Session->setFlash('Registro não encontrado.', 'default', array('class' => 'alert alert-danger space'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Conteudo.' . $this->Conteudo->primaryKey => $id));
        $this->set('conteudo', $this->Conteudo->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Conteudo->create();
            if ($this->Conteudo->save($this->request->data)) {
                $this->Session->setFlash('Registro salvo com sucesso!', 'default', array('class' => 'alert alert-success space'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Conteudo->exists($id)) {
            $this->Session->setFlash('Registro não encontrado.', 'default', array('class' => 'alert alert-danger space'));
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Conteudo->save($this->request->data)) {
                $this->Session->setFlash('Registro editado com sucesso!', 'default', array('class' => 'alert alert-success space'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
            }
        } else {
            $options = array('conditions' => array('Conteudo.' . $this->Conteudo->primaryKey => $id));
            $this->request->data = $this->Conteudo->find('first', $options);
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
        $this->Conteudo->id = $id;
        if (!$this->Conteudo->exists()) {
            $this->Session->setFlash('Registro não encontrado.', 'default', array('class' => 'alert alert-danger space'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Conteudo->delete()) {
            $this->Session->setFlash('Registro excluído com sucesso!', 'default', array('class' => 'alert alert-success space'));
        } else {
            $this->Session->setFlash('Registro não pode ser excluído. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
