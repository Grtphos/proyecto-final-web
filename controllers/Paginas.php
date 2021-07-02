<?php

class Paginas extends Controller{
    public function __construct(){
        
    }
    public function index(){
        $datos = [
                  'titulo' => 'Bienvenido(a)',
                  'subtitulo' => 'Estas en Disney'
                  ];
        $this->view('paginas/dashboard', $datos);
    }
}
