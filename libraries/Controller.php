<?php

/**/

#Administrador de controladores, modelos y vistas

class Controller {
    //posible uso de validacion de seguridad
    public function __construct(){
        
    }
    //para llamarlas vistas
    public function view($view, $datos=[]){
        if(file_exists('../app/views/' . $view . '.php')){
      include_once '../app/views/' . $view . '.php';
     }
     else {
        //uso de funcion die();
        die ('La vista no existe');
     }
    }
    
    public function model($model){
        //validar con if exsist y prmera letra mayuscula
        include_once '../app/models/' . $model . '.php';
        //no hay una presentacion en body (html)
        return new $model();
    }
}
