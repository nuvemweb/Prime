<?php

App::uses('AppController', 'Controller');

class ContatoController extends AppController {

    public $uses = array();

    public function index() {
        if ($this->request->is('ajax') || $this->request->is('post')) {
            try {
                App::import('Component', 'EmailTemplate');
                $EmailTemplate = new EmailTemplateComponent();
                $EmailTemplate->EmailContato($this->request->data);
                exit("true");
            } catch (Exception $e) {
                exit(debug($e->getMessage()));
            }
        }
    }

}
