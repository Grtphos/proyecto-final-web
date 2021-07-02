<?php

class Auth {
    private $db;
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerUsuario($datos){
        
        $this->db->query('SELECT nombreUsuario, permisoUsuario FROM usuarios WHERE emailUsuario = :emailUsuario AND passwordUsuario = :passwordUsuario');
        
        $this->db->bind(':emailUsuario' , $datos['emailUsuario']);
        $this->db->bind(':passwordUsuario' , $datos['passwordUsuario']);
        
        $resultado = $this->db->registro();
        return $resultado;
    }
}
