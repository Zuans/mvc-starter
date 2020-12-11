<?php

class Anime extends Controller {
    
    public function index() {
        echo 'Anime/index';
    }

    public function show($id = null ) {
        echo 'ini adalah show function menampilkan id anime' . $id;
    }

    public function detail($id = null ) {
        return $this->view('anime/detail',[
            'id' => $id,
        ]);
    }
}


?>