<?php
#solo para debugs
ini_set('display_errors', false);

#variables de conexion
define('DB_MOTOR','mysql');
define('DB_SERVER','localhost');
define('DB_NAME','pw20211');
define('DB_USER','root');
define('DB_PASSWORD','');

define('REGISTROS_X_PAGINA' , 5);

#constantes magicas
define('RUTA_APP',dirname(dirname(__FILE__)));

define('RUTA_URL','http://pw20211.mx');

define('NOMBRE_SITIO','Proyecto WEB');

#echo RUTA_APP;