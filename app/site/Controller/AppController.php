<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $helpers = array('Data', 'Link', 'RenderElement');
    public $slug_idioma;


    public function beforeFilter() {
    }

    public function beforeRender() {
    }
}
