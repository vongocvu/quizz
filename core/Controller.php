<?php 
  class Controller {

      protected $data = array();

      public function __construct () {
        $this->data['sub_content']['__contruct'] = '';
      }

      public function model($model){
        if (file_exists(_DIR_ROOT_.'/app/models/'.$model.'.php')){
            require_once _DIR_ROOT_.'/app/models/'.$model.'.php';
            if (class_exists($model)){
                $model = new $model();
                return $model;
            }
        }

        return false;
    }

      public function render ($view, $data = []) {
            extract($data);
            require_once _DIR_ROOT_ . '/app/views/' . $view . '.php';
      }
  }
