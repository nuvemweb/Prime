<?php

App::uses('AppModel', 'Model');

/**
 * Destaque Model
 *
 */
class Destaque extends AppModel {

    public $imagem_upload = null;
    public $displayField = 'nome';

    public function beforeSave($options = null) {


        //INICIO - Editar - Método de upload para pastas com ID 
        if (!empty($this->data[$this->alias]['id'])) {
            $this->imagem_upload = $this->data[$this->alias]['imagem'];
            unset($this->data[$this->alias]['imagem']);
            if (!empty($this->imagem_upload) && !empty($this->imagem_upload['name'])) {
                App::import('Component', 'Upload');
                $Upload = new UploadComponent();
                $tamanhos = array(
                    //'largura' => 'altura',
                    //defina o tamanho da imagem aqui
                );
                $this->data[$this->alias]['imagem'] = $Upload->upload($this->imagem_upload, "upload" . DS . "destaques" . DS . $this->data[$this->alias]['id'] . DS, false, $tamanhos, true);
            }
        } else {
            $this->imagem_upload = $this->data[$this->alias]['imagem'];
            $this->data[$this->alias]['imagem'] = "";
        }
        //FIM - Editar - Método de upload para pastas com ID 
    }

    public function afterSave($created = true, $options = null) {
        //INICIO - Adicionar - Método de upload para pastas com ID 
        if ($this->imagem_upload["name"] != "") {
            $imagem_salva = $this->find("first", array(
                'conditions' => array($this->alias . ".id =" => $this->data[$this->alias]['id']),
                'fields' => array($this->alias . '.imagem')
            ));
            if ($imagem_salva[$this->alias]["imagem"] == "") {
                $this->data[$this->alias]['imagem'] = $this->imagem_upload;
                $this->save($this->data);
            } else {
                return;
            }
        }
        //Fim - Adicionar - Método de upload para pastas com ID 
    }

}
