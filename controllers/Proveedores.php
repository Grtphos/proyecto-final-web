<?php

class Proveedores extends Controller{
    public function __construct(){
        $this->proveedorModel = $this->model('Proveedor');
    }
    
    public function index($limite = REGISTROS_X_PAGINA, $pagina = 1){
        $proveedores = $this->proveedorModel->obtenerProveedores($limite, $pagina);
        
        $datos = [
                  'titulo' => 'Bienvenido(a)',
                  'proveedores' => $proveedores,
                  ];
        $this->view('paginas/proveedores/index', $datos);
    }
    
    public function agregar(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'idProve'           => trim($_POST['idProve']),
                  'nombreProve'       => trim($_POST['nombreProve']),
                  'empresaProve'        => trim($_POST['empresaProve']),
                  'ciudadProve'       => trim($_POST['ciudadProve']),
                  'telefonoProve'     => trim($_POST['telefonoProve']),
                  'emailProve'      => trim($_POST['emailProve']),
                  'fotografiaProve'   => file_get_contents($_FILES['fotografiaProve']['tmp_name']),
                  ];
            
             $resultado = $this->proveedorModel->agregarProveedor($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/proveedores');
             }else{
                
                
             }
        
        }else{
            $this->view('paginas/proveedores/agregar');
        }
    }
    public function editar($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'id'                => $id,
                  'idProve'           => trim($_POST['idProve']),
                  'nombreProve'       => trim($_POST['nombreProve']),
                  'empresaProve'      => trim($_POST['empresaProve']),
                  'ciudadProve'       => trim($_POST['ciudadProve']),
                  'telefonoProve'     => trim($_POST['telefonoProve']),
                  'emailProve'        => trim($_POST['emailProve']),
                  'fotografiaProve'   => file_get_contents($_FILES['fotografiaProve']['tmp_name']),
                  ];
            
             $resultado = $this->proveedorModel->actualizarProveedor($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/proveedores');
             }else{
                
                
             }
        
        }else{
            //hacer uso del modelo para buscar el usuario
            $proveedor = $this->proveedorModel->obtenerProveedor($id);
            
            $datos = [
                  'id'                => $proveedor->id,
                  'idProve'           => $proveedor->idProve,
                  'nombreProve'       => $proveedor->nombreProve,
                  'empresaProve'      => $proveedor->empresaProve,
                  'ciudadProve'       => $proveedor->ciudadProve,
                  'telefonoProve'     => $proveedor->telefonoProve,
                  'emailProve'        => $proveedor->emailProve,
                  'fotografiaProve'   => $proveedor->fotografiaProve,
                  ];
            
            $this->view('paginas/proveedores/editar' ,$datos);
        }
    }
    
    public function eliminar($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
             $resultado = $this->proveedorModel->eliminarProveedor($id);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/proveedores');
             }else{
                
                
             }
        
        }else{
            //hacer uso del modelo para buscar el usuario
            $proveedor = $this->proveedorModel->obtenerProveedor($id);
            
            $datos = [
                  'id'                => $proveedor->id,
                  'idProve'           => $proveedor->idProve,
                  'nombreProve'       => $proveedor->nombreProve,
                  'empresaProve'      => $proveedor->empresaProve,
                  'ciudadProve'       => $proveedor->ciudadProve,
                  'telefonoProve'     => $proveedor->telefonoProve,
                  'emailProve'        => $proveedor->emailProve,
                  'fotografiaProve'   => $proveedor->fotografiaProve,
                  ];
            
            $this->view('paginas/proveedores/eliminar' ,$datos);
        }
    }
    //aun pendiente
    public function csv(){
        
        $csv = fopen( RUTA_APP . '/archivos/usuarios_' . time() . '.csv', 'w+');
        
        $usuarios = $this->usuarioModel->obtenerUsuariosLibres();
        
        fwrite($csv, "ID, IDUSUARIO, NOMBRE, RFC, CORREO, TELEFONO\n");
        foreach($usuarios as $registro){
            fwrite($csv, $registro->id .',' .
                         $registro->idUsuario.',' .
                         $registro->nombreUsuario.',' .
                         $registro->rfcUsuario.',' .
                         $registro->emailUsuario.',' .
                         $registro->telefonoUsuario . "\n");
        }
        fclose($csv);
        
        echo json_encode(['hecho'=>true]);
    }
    
    public function xml(){
        
        $xml = fopen( RUTA_APP . '/archivos/usuarios_' . time() . '.xml', 'w+');
        
        $usuarios = $this->usuarioModel->obtenerUsuariosLibres();
        
        fwrite($xml, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<usuarios>\n");
        foreach($usuarios as $registro){
            fwrite($xml,
                    "<usuario>\n<id>"   . $registro->id              . "</id>\n" .
                    "<idUsuario>"       . $registro->idUsuario       . "</idUsuario>\n" .
                    "<nombre>"          . $registro->nombreUsuario   . "</nombre>\n" .
                    "<rfc>"             . $registro->rfcUsuario      . "</rfc>\n" .
                    "<email>"           . $registro->emailUsuario    . "</email>\n" .
                    "<telefono>"        . $registro->telefonoUsuario . "</telefono>\n</usuario>\n");
        }
        fwrite($xml, "</usuarios>");
        fclose($xml);
        
        echo json_encode(['hecho'=>true]); //json_decode();
    }
    
    public function json(){
        
        $json = fopen( RUTA_APP . '/archivos/usuarios_' . time() . '.json', 'w+');
        
        $usuarios = $this->usuarioModel->obtenerUsuariosLibres();
        
        $registros_json = [];
        foreach($usuarios as $registro){
            $registros_json[] = [
                                'id'          => $registro->id ,
                                'idUsuario'   => $registro->idUsuario ,
                                'nombre'      => $registro->nombreUsuario ,  
                                'rfc'         => $registro->rfcUsuario , 
                                'email'       => $registro->emailUsuario , 
                                'telefono'    => $registro->telefonoUsuario 
                                ];
        }
        fwrite($json, json_encode($registros_json));
        fclose($json);
        
        echo json_encode(['hecho'=>true]); //json_decode();
    }
    
    
    public function imprimir(){
        
        $usuarios = $this->usuarioModel->obtenerUsuariosLibres();
        
        $registros_json = [];
        foreach($usuarios as $registro){
            $registros_json[] = [
                                'id'          => $registro->id ,
                                'idUsuario'   => $registro->idUsuario ,
                                'nombreUsuario'      => $registro->nombreUsuario ,  
                                'rfcUsuario'         => $registro->rfcUsuario , 
                                'emailUsuario'       => $registro->emailUsuario , 
                                'telefonoUsuario'    => $registro->telefonoUsuario 
                                ];
        }
        $datos = ['usuarios' => $registros_json];
        
        $this->view('paginas/usuarios/impresion2' ,$datos);
    }
    
    
}
