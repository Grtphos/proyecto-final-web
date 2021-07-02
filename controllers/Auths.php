<?php

class Auths extends Controller{
    public function __construct(){
        $this->authModel = $this->model('Auth');
    }
    
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $datos=[
                   'emailUsuario' => trim($_POST['emailUsuario']),
                   'passwordUsuario' => sha1(trim($_POST['passwordUsuario']))
                    ];
            $resultado = $this->authModel->obtenerUsuario($datos);
            session_start();
            if($resultado){
                
                $_SESSION['nombreUsuario'] = trim($resultado->nombreUsuario);
                $_SESSION['permisoUsuario'] = trim($resultado->permisoUsuario);
                $_SESSION['autorizado'] = '4ut0ri3ad0';
                
                $this->view('paginas/dashboard', $datos);
            }else{
                
                $_SESSION['nombreUsuario'] = 'No autorizado';
                $_SESSION['permisoUsuario'] = '';
                $_SESSION['autorizado'] = 'n04ut0ri3ad0';
                
                $datos = [
                  'titulo' => 'No autorizado'
                  ];
        $this->view('paginas/auth/login', $datos);
            }
        }else{
            
            $datos = [
                  'titulo' => 'Bienvenido(a)',
                  'subtitulo' => 'Estas en Disney Channel'
                  ];
        $this->view('paginas/auth/login', $datos);
        }
        
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        
        $datos = [
                  'titulo' => 'No autorizado'
                  ];
        $this->view('paginas/auth/login', $datos);
    }
    
}