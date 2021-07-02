<?php

class Usuarios extends Controller{
    public function __construct(){
        $this->usuarioModel = $this->model('Usuario');
    }
    
    public function index($limite = REGISTROS_X_PAGINA, $pagina = 1){
        $usuarios = $this->usuarioModel->obtenerUsuarios($limite, $pagina);
        
        $datos = [
                  'titulo' => 'Bienvenido(a)',
                  'usuarios' => $usuarios,
                  ];
        $this->view('paginas/usuarios/index', $datos);
    }
    
    public function agregar(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'idUsuario'           => trim($_POST['idUsuario']),
                  'rfcUsuario'          => trim($_POST['rfcUsuario']),
                  'nombreUsuario'       => trim($_POST['nombreUsuario']),
                  'emailUsuario'        => trim($_POST['emailUsuario']),
                  'passwordUsuario'     => sha1(trim($_POST['passwordUsuario'])),
                  'direccionUsuario'    => trim($_POST['direccionUsuario']),
                  'ciudadUsuario'       => trim($_POST['ciudadUsuario']),
                  'estadoUsuario'       => trim($_POST['estadoUsuario']),
                  'telefonoUsuario'     => trim($_POST['telefonoUsuario']),
                  'permisoUsuario'      => trim($_POST['permisoUsuario']),
                  'fotografiaUsuario'   => file_get_contents($_FILES['fotografiaUsuario']['tmp_name']),
                  ];
            
             $resultado = $this->usuarioModel->agregarUsuario($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/usuarios');
             }else{
                
                
             }
        
        }else{
            $this->view('paginas/usuarios/agregar');
        }
    }
    public function editar($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos = [
                  'id'                  => $id,
                  'idUsuario'           => trim($_POST['idUsuario']),
                  'rfcUsuario'          => trim($_POST['rfcUsuario']),
                  'nombreUsuario'       => trim($_POST['nombreUsuario']),
                  'emailUsuario'        => trim($_POST['emailUsuario']),
                  'passwordUsuario'     => sha1(trim($_POST['passwordUsuario'])),
                  'direccionUsuario'    => trim($_POST['direccionUsuario']),
                  'ciudadUsuario'       => trim($_POST['ciudadUsuario']),
                  'estadoUsuario'       => trim($_POST['estadoUsuario']),
                  'telefonoUsuario'     => trim($_POST['telefonoUsuario']),
                  'permisoUsuario'      => trim($_POST['permisoUsuario']),
                  'fotografiaUsuario'   => file_get_contents($_FILES['fotografiaUsuario']['tmp_name']),
                  ];
            
             $resultado = $this->usuarioModel->actualizarUsuario($datos);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/usuarios');
             }else{
                
                
             }
        
        }else{
            //hacer uso del modelo para buscar el usuario
            $usuario = $this->usuarioModel->obtenerUsuario($id);
            
            $datos = [
                  'id'                  => $usuario->id,
                  'idUsuario'           => $usuario->idUsuario,
                  'rfcUsuario'          => $usuario->rfcUsuario,
                  'nombreUsuario'       => $usuario->nombreUsuario,
                  'emailUsuario'        => $usuario->emailUsuario,
                  'passwordUsuario'     => $usuario->passwordUsuario,
                  'direccionUsuario'    => $usuario->direccionUsuario,
                  'ciudadUsuario'       => $usuario->ciudadUsuario,
                  'estadoUsuario'       => $usuario->estadoUsuario,
                  'telefonoUsuario'     => $usuario->telefonoUsuario,
                  'permisoUsuario'      => $usuario->permisoUsuario,
                  'fotografiaUsuario'   => $usuario->fotografiaUsuario,
                  ];
            
            $this->view('paginas/usuarios/editar' ,$datos);
        }
    }
    
    public function eliminar($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
             $resultado = $this->usuarioModel->eliminarUsuario($id);
             
             #validad el resultado de la funcion agregar
             if($resultado){
                
                //crear la funcion redireccionar
                redireccionar('/usuarios');
             }else{
                
                
             }
        
        }else{
            //hacer uso del modelo para buscar el usuario
            $usuario = $this->usuarioModel->obtenerUsuario($id);
            
            $datos = [
                  'id'                  => $usuario->id,
                  'idUsuario'           => $usuario->idUsuario,
                  'rfcUsuario'          => $usuario->rfcUsuario,
                  'nombreUsuario'       => $usuario->nombreUsuario,
                  'emailUsuario'        => $usuario->emailUsuario,
                  'passwordUsuario'     => $usuario->passwordUsuario,
                  'direccionUsuario'    => $usuario->direccionUsuario,
                  'ciudadUsuario'       => $usuario->ciudadUsuario,
                  'estadoUsuario'       => $usuario->estadoUsuario,
                  'telefonoUsuario'     => $usuario->telefonoUsuario,
                  'permisoUsuario'      => $usuario->permisoUsuario,
                  'fotografiaUsuario'   => $usuario->fotografiaUsuario,
                  ];
            
            $this->view('paginas/usuarios/eliminar' ,$datos);
        }
    }
    
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
