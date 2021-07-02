<?php

class Articulos extends Controller{
    public function __construct(){
        $this->articuloModel = $this->model('Articulo');
    }
    
    public function index($limite = REGISTROS_X_PAGINA, $pagina = 1){
        $articulos = $this->articuloModel->obtenerArticulos($limite, $pagina);
        
        $datos = [
                  'titulo' => 'Bienvenido(a)',
                  'articulos' => $articulos,
                  ];
        $this->view('paginas/articulos/index', $datos);
    }
    
    public function agregar(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'idArticulo'           => trim($_POST['idArticulo']),
                  'nombreArticulo'       => trim($_POST['nombreArticulo']),
                  'precioArticulo'       => trim($_POST['precioArticulo']),
                  'fotografiaArticulo'   => file_get_contents($_FILES['fotografiaArticulo']['tmp_name']),
                  ];
            
             $resultado = $this->articuloModel->agregarArticulo($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/articulos/index.php');
             }else{
                
                
             }
        
        }else{
            $this->view('paginas/articulos/agregar');
        }
    }
    
    public function editar($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'id'                   => $id,
                  'idArticulo'           => trim($_POST['idArticulo']),
                  'nombreArticulo'       => trim($_POST['nombreArticulo']),
                  'precioArticulo'       => trim($_POST['precioArticulo']),
                  'fotografiaArticulo'   => file_get_contents($_FILES['fotografiaArticulo']['tmp_name']),
                  ];
            
             $resultado = $this->articuloModel->actualizarArticulo($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/articulos');
             }else{
                
                
             }
        
        }else{
            //hacer uso del modelo para buscar el usuario
            $usuario = $this->articuloModel->obtenerArticulo($id);
            
            $datos = [
                  'id'                   => $usuario->id,
                  'idArticulo'           => $usuario->idArticulo,
                  'nombreArticulo'       => $usuario->nombreArticulo,
                  'precioArticulo'       => $usuario->precioArticulo,
                  'fotografiaArticulo'   => $usuario->fotografiaArticulo,
                  ];
            
            $this->view('paginas/articulos/editar' ,$datos);
        }
    }
    
    public function eliminar($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
             $resultado = $this->articuloModel->eliminarArticulo($id);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/articulos');
             }else{
                
                
             }
        
        }else{
            //hacer uso del modelo para buscar el usuario
            $usuario = $this->articuloModel->obtenerArticulo($id);
            
            $datos = [
                  'id'                   => $usuario->id,
                  'idArticulo'           => $usuario->idArticulo,
                  'nombreArticulo'       => $usuario->nombreArticulo,
                  'precioArticulo'       => $usuario->precioArticulo,
                  'fotografiaArticulo'   => $usuario->fotografiaArticulo,
                  ];
            
            $this->view('paginas/articulos/eliminar' ,$datos);
        }
    }
    
    public function csv(){
        
        $csv = fopen( RUTA_APP . '/archivos/articulos_' . time() . '.csv', 'w+');
        
        $articulos = $this->articuloModel->obtenerArticulosLibres();
        
        fwrite($csv, "ID, IDARTICULO, NOMBRE, PRECIO\n");
        foreach($articulos as $registro){
            fwrite($csv, $registro->id .',' .
                         $registro->idArticulo.',' .
                         $registro->nombreArticulo.',' .
                         $registro->precioArticulo."\n");
        }
        fclose($csv);
        
        echo json_encode(['hecho'=>true]);
    }
    
    public function xml(){
        
        $xml = fopen( RUTA_APP . '/archivos/articulos_' . time() . '.xml', 'w+');
        
        $articulos = $this->articuloModel->obtenerArticulosLibres();
        
        fwrite($xml, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<articulos>\n");
        foreach($articulos as $registro){
            fwrite($xml,
                    "<articulo>\n<id>"  . $registro->id              . "</id>\n" .
                    "<idArticulo>"      . $registro->idArticulo      . "</idArticulo>\n" .
                    "<nombre>"          . $registro->nombreArticulo  . "</nombre>\n" .
                    "<precio>"          . $registro->precioArticulo  . "</precio>\n</articulo>\n");
        }
        fwrite($xml, "</articulos>");
        fclose($xml);
        
        echo json_encode(['hecho'=>true]); //json_decode();
    }
    
    public function json(){
        
        $json = fopen( RUTA_APP . '/archivos/articulos_' . time() . '.json', 'w+');
        
        $articulos = $this->articuloModel->obtenerArticulosLibres();
        
        $registros_json = [];
        foreach($articulos as $registro){
            $registros_json[] = [
                                'id'          => $registro->id ,
                                'idArticulo'  => $registro->idArticulo ,
                                'nombre'      => $registro->nombreArticulo ,  
                                'precio'      => $registro->precioArticulo  
                                ];
        }
        fwrite($json, json_encode($registros_json));
        fclose($json);
        
        echo json_encode(['hecho'=>true]); //json_decode();
    }
    
    public function imprimir(){
        
        $articulos = $this->articuloModel->obtenerArticulosLibres();
        
        $registros_json = [];
        foreach($articulos as $registro){
            $registros_json[] = [
                                'id'          => $registro->id ,
                                'idArticulo'  => $registro->idArticulo ,
                                'nombre'      => $registro->nombreArticulo ,  
                                'precio'      => $registro->precioArticulo 
                                ];
        }
        $datos = ['articulos' => $registros_json];
        
        $this->view('paginas/articulos/impresion' ,$datos);
    }
}