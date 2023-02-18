<?php
class App {

      private $__controller, $__action, $__params;

      public function __construct()
      {

            $this->__controller = 'home';
            $this->__action = 'index';
            $this->__params = [];
            $this->handleUrl();
      }

      public function getUrl() {
            if (!empty($_SERVER['PATH_INFO'])) {
                  $url = $_SERVER['PATH_INFO'];
            } else {
                  $url = '/';
            }
            return $url;
      }

      public function handleUrl()
      {
            $url = $this->getUrl();

            $urlArr = array_filter(explode('/', $url));
            $urlArr = array_values($urlArr);

            $urlCheck = '';
        if (!empty($urlArr)){
            foreach ($urlArr as $key=>$item){
                $urlCheck.=$item.'/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck = implode('/', $fileArr);

                if (!empty($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }

                if (file_exists('app/controllers/'.($fileCheck).'.php')){
                    $urlCheck = $fileCheck;
                    break;
                }
            }

            $urlArr = array_values($urlArr);
        }
            

            if (!empty($urlArr[0])) {
                  $this->__controller = ucfirst($urlArr[0]);
            } else {
                  $this->__controller = ucfirst($this->__controller);
            }

            if (empty($urlCheck)){
                  $urlCheck = $this->__controller;
              }

            if (file_exists('app/controllers/' . $urlCheck . '.php')) {
                  require_once 'app/controllers/' . $urlCheck . '.php';

                  if (class_exists($this->__controller)) {
                        $this->__controller = new $this->__controller();
                        unset($urlArr[0]);
                  } else {
                        $this->loadError();
                  }
                  
            } else {
                  $this->loadError();
            };

            if (!empty($urlArr[1])) {
                  $this->__action = $urlArr[1];
                  unset($urlArr[1]);
            }

            $this->__params = array_values($urlArr);
           
            if (method_exists($this->__controller, $this->__action)){
                  call_user_func_array([$this->__controller, $this->__action], $this->__params);
              } else {
                  $this->loadError();
              }
      }

      public function loadError ($name = '404') {
          require_once 'errors/' .$name . '.php';
      }
}
