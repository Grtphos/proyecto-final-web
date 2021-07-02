<?php

/*
 Fecha de creacion:
 Autor            :
 Version          :
 */

 #mapear las URL
 /*
  ejemplo pw20211.mx/usuarios/agregar/1
  0) URL
  1) Controlador
  2) Metodo
  3) Argumentos
  */

  //que el nombre sea igual que al de la clase
 class Ruta {
    protected $controladorActual = 'Paginas';
    protected $metodoAcutal = 'index';
    protected $parametros = [];
    
    public function __construct(){
    
     $url = $this ->getURL();
     //esto es agregado para el debug
     //var_dump($url);
     
     if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
      $this->controladorActual = ucwords($url[0]);
     }
     unset($url[0]);
     
     include_once '../app/controllers/' . $this->controladorActual . '.php';
     
     $this->controladorActual = new $this->controladorActual;
     
     if(isset($url[1])){
      if(method_exists($this->controladorActual,$url[1])){
       $this->metodoAcutal = $url[1];
       unset($url[1]);
      }
     }
      
      $this->parametros = ($url)? array_values($url):[];
      
      call_user_func_array([$this->controladorActual, $this->metodoAcutal],$this->parametros);
      
     }
    
    public function getURL(){
     if(isset($_GET['url'])){
     $url = rtrim($_GET['url'],'/');
     $url = filter_var($url, FILTER_SANITIZE_URL);
     $url = explode('/',$url);
     return $url;
     }
    }
    
 } 