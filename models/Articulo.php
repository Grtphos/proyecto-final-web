<?php

class Articulo {
    
    private $db;
    
    public function __construct(){
        $this->db = new Base;
        }
        
    public function obtenerArticulos($limite, $pagina){
        
        #conocer el total de registros
         $registros = $this->db->query('SELECT count(id) AS total FROM articulos');
         $registros = $this->db->registro();
         
         #calcula el total de las paginas
         $totalPaginas = ceil($registros->total / $limite);
         
         #calcular el registro de inicio
         
         $registroInicio = ($pagina - 1) * $limite;
         
         $previa = $pagina - 1;
         $siguiente = $pagina + 1;
         
         $datos_paginas = ['limite' => $limite,
                           'pagina' => $pagina,
                           'totalPaginas' => $totalPaginas,
                           'previa' => $previa,
                           'siguiente' => $siguiente
                           ];
         
        $this->db->query("SELECT id, idArticulo, nombreArticulo, precioArticulo, fotografiaArticulo FROM articulos LIMIT $registroInicio, $limite");
        
        
        $resultado['registros'] = $this->db->registros();
        $resultado = array_merge($datos_paginas, $resultado);
        return $resultado;
    }
    
    public function agregarArticulo($datos){
        #preparar
        
        $this->db->query('INSERT INTO articulos (idArticulo, nombreArticulo, precioArticulo, fotografiaArticulo)  VALUES (:idArticulo, :nombreArticulo, :precioArticulo, :fotografiaArticulo)');
        
        #vincular
        $this->db->bind(':idArticulo' , $datos['idArticulo']);
        $this->db->bind(':nombreArticulo' , $datos['nombreArticulo']);
        $this->db->bind(':precioArticulo' , $datos['precioArticulo']);
        $this->db->bind(':fotografiaArticulo' , $datos['fotografiaArticulo']);
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function obtenerArticulo($id){
        #preparar
        
        $this->db->query('SELECT id, idArticulo, nombreArticulo, precioArticulo, fotografiaArticulo FROM articulos WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->registro());
        return $resultado;
    }
    
    public function actualizarArticulo($datos){
        #preparar
        
        $this->db->query('UPDATE articulos set idArticulo = :idArticulo, nombreArticulo = :nombreArticulo, precioArticulo = :precioArticulo, fotografiaArticulo = :fotografiaArticulo WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $datos['id']);
        $this->db->bind(':idArticulo' , $datos['idArticulo']);
        $this->db->bind(':nombreArticulo' , $datos['nombreArticulo']);
        $this->db->bind(':precioArticulo' , $datos['precioArticulo']);
        $this->db->bind(':fotografiaArticulo' , $datos['fotografiaArticulo']);
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function eliminarArticulo($id){
        #preparar
        
        $this->db->query('DELETE FROM articulos WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function obtenerArticulosLibres(){
        
        $this->db->query("SELECT id, idArticulo, nombreArticulo, precioArticulo, fotografiaArticulo FROM articulos");
        
        
        $resultado = $this->db->registros();
        return $resultado;
    }

}
