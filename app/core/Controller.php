<?php

    class Controller {
        public function view($view,$data = [] ) {
            // Check data is array ?
            if( !is_array($data)) {
                throw new Exception('Please input array type on view variable');
            }
            extract($data);
            $viewPath = "../app/views/{$view}.php";
            if( file_exists($viewPath)) {
                require_once $viewPath;
            } else {
                throw new Exception('View not found');
            }
        }

        private function build($view) {
            $this->view($view);
        }

    }


?>