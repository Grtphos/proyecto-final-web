<?php

class Usuario {
    private $db;
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerUsuarios($limite, $pagina){
        
        #conocer el total de registros
         $registros = $this->db->query('SELECT count(id) AS total FROM usuarios');
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
         
        $this->db->query("SELECT id, idUsuario, rfcUsuario, nombreUsuario, emailUsuario, passwordUsuario, direccionUsuario, ciudadUsuario, estadoUsuario, telefonoUsuario, permisoUsuario, fotografiaUsuario FROM usuarios LIMIT $registroInicio, $limite");
        
        
        $resultado['registros'] = $this->db->registros();
        $resultado = array_merge($datos_paginas, $resultado);
        return $resultado;
    }
    
    public function agregarUsuario($datos){
        #preparar
        
        $this->db->query('INSERT INTO usuarios (idUsuario, rfcUsuario, nombreUsuario, emailUsuario, passwordUsuario, direccionUsuario, ciudadUsuario, estadoUsuario, telefonoUsuario, permisoUsuario, fotografiaUsuario)  VALUES (:idUsuario, :rfcUsuario, :nombreUsuario, :emailUsuario, :passwordUsuario, :direccionUsuario, :ciudadUsuario, :estadoUsuario, :telefonoUsuario, :permisoUsuario, :fotografiaUsuario)');
        
        #vincular
        $this->db->bind(':idUsuario' , $datos['idUsuario']);
        $this->db->bind(':rfcUsuario' , $datos['rfcUsuario']);
        $this->db->bind(':nombreUsuario' , $datos['nombreUsuario']);
        $this->db->bind(':emailUsuario' , $datos['emailUsuario']);
        $this->db->bind(':passwordUsuario' , $datos['passwordUsuario']);
        $this->db->bind(':direccionUsuario' , $datos['direccionUsuario']);
        $this->db->bind(':ciudadUsuario' , $datos['ciudadUsuario']);
        $this->db->bind(':estadoUsuario' , $datos['estadoUsuario']);
        $this->db->bind(':telefonoUsuario' , $datos['telefonoUsuario']);
        $this->db->bind(':permisoUsuario' , $datos['permisoUsuario']);
        $this->db->bind(':fotografiaUsuario' , $datos['fotografiaUsuario']);
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    public function obtenerUsuario($id){
        #preparar
        
        $this->db->query('SELECT id, idUsuario, rfcUsuario, nombreUsuario, emailUsuario, passwordUsuario, direccionUsuario, ciudadUsuario, estadoUsuario, telefonoUsuario, permisoUsuario, fotografiaUsuario FROM usuarios WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->registro());
        return $resultado;
    }
    public function actualizarUsuario($datos){
        #preparar
        
        $this->db->query('UPDATE usuarios set idUsuario = :idUsuario, rfcUsuario = :rfcUsuario, nombreUsuario = :nombreUsuario, passwordUsuario = :passwordUsuario, direccionUsuario = :direccionUsuario, ciudadUsuario = :ciudadUsuario, estadoUsuario = :estadoUsuario, telefonoUsuario = :telefonoUsuario, permisoUsuario = :permisoUsuario, fotografiaUsuario = :fotografiaUsuario WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $datos['id']);
        $this->db->bind(':idUsuario' , $datos['idUsuario']);
        $this->db->bind(':rfcUsuario' , $datos['rfcUsuario']);
        $this->db->bind(':nombreUsuario' , $datos['nombreUsuario']);
        //$this->db->bind(':emailUsuario' , $datos['emailUsuario']);
        $this->db->bind(':passwordUsuario' , $datos['passwordUsuario']);
        $this->db->bind(':direccionUsuario' , $datos['direccionUsuario']);
        $this->db->bind(':ciudadUsuario' , $datos['ciudadUsuario']);
        $this->db->bind(':estadoUsuario' , $datos['estadoUsuario']);
        $this->db->bind(':telefonoUsuario' , $datos['telefonoUsuario']);
        $this->db->bind(':permisoUsuario' , $datos['permisoUsuario']);
        $this->db->bind(':fotografiaUsuario' , $datos['fotografiaUsuario']);
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function eliminarUsuario($id){
        #preparar
        
        $this->db->query('DELETE FROM usuarios WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    
    public function obtenerUsuariosLibres(){
        
        $this->db->query("SELECT id, idUsuario, rfcUsuario, nombreUsuario, emailUsuario, passwordUsuario, direccionUsuario, ciudadUsuario, estadoUsuario, telefonoUsuario, permisoUsuario, fotografiaUsuario FROM usuarios");
        
        
        $resultado = $this->db->registros();
        return $resultado;
    }
    
    
}
