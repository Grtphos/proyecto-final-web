<?php

/**/
#conexion a base de datos

class Base {
    private $motor = DB_MOTOR;
    private $server = DB_SERVER;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    
    private $stmt;
    private $dbh;
    private $error;
    
    public function __construct(){
        
        $dsn = "$this->motor:host=$this->server;dbname=$this->dbname";
        $opciones = [
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                     PDO::ATTR_PERSISTENT => true,
                     ];
        try{
            
            $this->dbh = new PDO($dsn,$this->user,$this->password,$opciones);
            $this->dbh->exec('set name utf8');
        } catch(PDOException $e){
            
                $this->error = 'Se ha porducio un error al tratar de ingresar a la base de datos';
                //echo $this->error;
                //file_put_contents('../archivos/errores.log', $e->getMessage(). "\n",FILE_APPEND);
            }
    }
    
    #preparar las consultas
    public function query($sql){
        
       $this->stmt = $this->dbh->prepare($sql);
    }
    
    #vincular las consultas
    public function bind($parametro , $valor , $tipo = null){
        if(is_null($tipo)){
            switch (true){
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
            $this->stmt->bindValue($parametro,$valor,$tipo);
        }
    }
    
    public function execute(){
        return $this->stmt->execute();
    }
    
    public function registros(){
        $this->execute(); 
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function registro(){
        $this->execute(); 
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}
