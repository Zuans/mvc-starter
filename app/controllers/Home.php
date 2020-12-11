<?php

class Home extends Controller {
    
    public function index() {
        echo 'default';
        $this->view('home/index');
    }

    public function show($id = null, $test = null) {
        $this->view('home/show');
    }
}

?>