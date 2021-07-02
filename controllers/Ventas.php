<?php

class Ventas extends Controller{
    public function __construct(){
        $this->ventaModel = $this->model('Venta');
    }
    
    public function index($limite = REGISTROS_X_PAGINA, $pagina = 1){
        $ventas = $this->ventaModel->obtenerVentas($limite, $pagina);
        
        $datos = [
                  'titulo' => 'Bienvenido(a)',
                  'ventas' => $ventas,
                  ];
        $this->view('paginas/ventas/index', $datos);
    }
    
    public function agregar(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'idVenta'           => trim($_POST['idVenta']),
                  'fechaVenta'        => trim($_POST['fechaVenta']),
                  'articuloVenta'     => trim($_POST['articuloVenta']),
                  'cantidadVenta'     => trim($_POST['cantidadVenta']),
                  'precioVenta'       => trim($_POST['precioVenta']),
                  'totalVenta'        => trim($_POST['totalVenta']),
                  'tipoVenta'         => trim($_POST['tipoVenta']),
                  ];
            
             $resultado = $this->ventaModel->agregarVenta($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/ventas');
             }else{
                
                
             }
        
        }else{
            $this->view('paginas/ventas/agregar');
        }
    }
}