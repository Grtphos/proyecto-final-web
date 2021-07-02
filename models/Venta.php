<?php

class Venta {
    private $db;
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerVentas($limite, $pagina){
        
        #conocer el total de registros
         $registros = $this->db->query('SELECT count(id) AS total FROM ventas');
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
         
        $this->db->query("SELECT id, idVenta, fechaVenta, articuloVenta, cantidadVenta, precioVenta, totalVenta, tipoVenta FROM ventas LIMIT $registroInicio, $limite");
        
        
        $resultado['registros'] = $this->db->registros();
        $resultado = array_merge($datos_paginas, $resultado);
        return $resultado;
    }
    
    public function agregarVenta($datos){
        #preparar
        
        $this->db->query('INSERT INTO ventas (idVenta, fechaVenta, articuloVenta, cantidadVenta, precioVenta, totalVenta, tipoVenta)  VALUES (:idVenta, :fechaVenta, :articuloVenta, :cantidadVenta, :precioVenta, :totalVenta, :tipoVenta)');
        
        #vincular
        $this->db->bind(':idVenta' , $datos['idVenta']);
        $this->db->bind(':fechaVenta' , $datos['fechaVenta']);
        $this->db->bind(':articuloVenta' , $datos['articuloVenta']);
        $this->db->bind(':cantidadVenta' , $datos['cantidadVenta']);
        $this->db->bind(':precioVenta' , $datos['precioVenta']);
        $this->db->bind(':totalVenta' , $datos['totalVenta']);
        $this->db->bind(':tipoVenta' , $datos['tipoVenta']);
        
        $resultado = ($this->db->execute())?true:false;
        return $resultado;
    }
    public function obtenerVenta($id){
        #preparar
        
        $this->db->query('SELECT id, idVenta, fechaVenta, articuloVenta, cantidadVenta, precioVenta, totalVenta, tipoVenta FROM ventas WHERE id = :id');
        
        #vincular
        $this->db->bind(':id' , $id);
        
        
        $resultado = ($this->db->registro());
        return $resultado;
    }
}