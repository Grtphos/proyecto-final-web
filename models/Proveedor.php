<?php

class Proveedor {
    private $db;
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerProveedores($limite, $pagina){
        
        #conocer el total de registros
         $registros = $this->db->query('SELECT count(id) AS total FROM provedores');
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
         
        $this->db->query("SELECT id, idProve, nombreProve, empresaProve, ciudadProve, telefonoProve, emailProve, fotografiaProve FROM provedores LIMIT $registroInicio, $limite");
        
        
        $resultado['registros'] = $this->db->registros();
        $resultado = array_merge($datos_paginas, $resultado);
        return $resultado;
    }
    
    public function agregarProveedor($datos){
        #preparar
        
        $this->db->query('INSERT INTO provedores (idProve, nombreProve, empresaProve, ciudadProve, telefonoProve, emailProve, fotografiaProve)  VALUES (:idProve, :nombreProve, :empresaProve, :ciudadProve, :telefonoProve, :emailProve, :fotografiaProve)');
        
        #vincular
        $this->db->bind(':idProve' , $datos['idProve']);
        $this->db->bind(':nombreProve' , $datos['nombreProve']);
        $this->db->bind(':empresaProve' , $datos['empresaProve']);
        $this->db->bind(':ciudadProve' , $datos['ciudadProve']);
        $this->db->bind(':telefonoProve' , $datos['telefonoProve']);
        $this->db->bind(':emailProve' , $datos['emailProve']);
        $this->db->bind(':fotografiaProve' , $datos['fotografiaProve']); 
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    public function obtenerProveedor($id){
        #preparar
        
        $this->db->query('SELECT id, idProve, nombreProve, empresaProve, ciudadProve, telefonoProve, emailProve, fotografiaProve FROM provedores WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->registro());
        return $resultado;
    }
    public function actualizarProveedor($datos){
        #preparar
        
        $this->db->query('UPDATE provedores set idProve = :idProve, nombreProve = :nombreProve, empresaProve = :empresaProve, ciudadProve = :ciudadProve, telefonoProve = :telefonoProve, fotografiaProve = :fotografiaProve WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $datos['id']);
        $this->db->bind(':idProve' , $datos['idProve']);
        $this->db->bind(':nombreProve' , $datos['nombreProve']);
        $this->db->bind(':empresaProve' , $datos['empresaProve']);
        $this->db->bind(':ciudadProve' , $datos['ciudadProve']);
        $this->db->bind(':telefonoProve' , $datos['telefonoProve']);
        //$this->db->bind(':emailProve' , $datos['emailProve']);
        $this->db->bind(':fotografiaProve' , $datos['fotografiaProve']);
        
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function eliminarProveedor($id){
        #preparar
        
        $this->db->query('DELETE FROM provedores WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function obtenerProveedoresLibres(){
        
        $this->db->query("SELECT id, idProve, nombreProve, empresaProve, ciudadProve, telefonoProve, emailProve, fotografiaProve FROM provedores");
        
        
        $resultado = $this->db->registros();
        return $resultado;
    }
    
    
}
