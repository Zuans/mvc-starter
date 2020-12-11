<?php

    class App {

        protected $controller,
                  $method,
                  $baseController = 'Home' ,
                  $baseMethod = 'index',
                  $params = [];


        public function __construct() {
            $url = $this->parseUrl();
            $this->controller = count($url) > 0 ? $this->setController($url[0]) : $this->setController($this->baseController);
            unset($url[0]);
            $this->method =  count($url) >= 1 ? $this->setMethod($this->controller,$url[1]) : $this->setMethod($this->controller,$this->baseMethod);
            unset($url[1]);
            if(count($url) > 0 ) {
                $this->params = $this->setParams($url);
            }

            call_user_func_array([$this->controller,$this->method],$this->params);
        }

        private function setController($controller) {
            if( file_exists('../app/controllers/'. $controller . '.php' )) {
                require_once '../app/controllers/' . $controller . '.php';
                return new $controller;
            } else {
                throw new Exception('Controller Not Found');
            }
        }

        private function setMethod($controller,$method) {
            if( method_exists($controller,$method)) {
                return $method;
            }else {
                throw new Exception('Method Not Found');
            }
        }

        private function setParams( $params) {
            return $params;
        }
    
        private function parseUrl() {
            if( isset($_GET['url'])) {
                $url = $_GET['url'];
                $url = trim($url);
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            } else {
                return [];
            }
        }

    }

?>