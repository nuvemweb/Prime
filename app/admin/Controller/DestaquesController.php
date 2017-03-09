<?php

App::uses('AppController', 'Controller');

/**
 * Destaques Controller
 *
 * @property Destaque $Destaque
 * @property PaginatorComponent $Paginator
 */
class DestaquesController extends AppController {

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
        $this->Destaque->recursive = 0;
        $this->set('destaques', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Destaque->exists($id)) {
            $this->Session->setFlash('Registro não encontrado.', 'default', array('class' => 'alert alert-danger space'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Destaque.' . $this->Destaque->primaryKey => $id));
        $this->set('destaque', $this->Destaque->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Destaque->create();
            if ($this->Destaque->save($this->request->data)) {
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
        if (!$this->Destaque->exists($id)) {
            $this->Session->setFlash('Registro não encontrado.', 'default', array('class' => 'alert alert-danger space'));
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Destaque->save($this->request->data)) {
                $this->Session->setFlash('Registro editado com sucesso!', 'default', array('class' => 'alert alert-success space'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Registro não pode ser salvo. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
            }
        } else {
            $options = array('conditions' => array('Destaque.' . $this->Destaque->primaryKey => $id));
            $this->request->data = $this->Destaque->find('first', $options);
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
        $this->Destaque->id = $id;
        if (!$this->Destaque->exists()) {
            $this->Session->setFlash('Registro não encontrado.', 'default', array('class' => 'alert alert-danger space'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Destaque->delete()) {
            $this->Session->setFlash('Registro excluído com sucesso!', 'default', array('class' => 'alert alert-success space'));
        } else {
            $this->Session->setFlash('Registro não pode ser excluído. Por favor, tente novamente', 'default', array('class' => 'alert alert-danger space'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
