<?php

//$pagina es el controlador, el metodo por defalut es index
function redireccionar($pagina){
    header('Location' . RUTA_URL . $pagina);
}

//agregar todas las funciones propias