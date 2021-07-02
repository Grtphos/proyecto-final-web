<?php

$mysqli = new mysqli("localhost","root","","pw20211");

$salida = "";
$query = "SELECT * FROM usuarios ORDER By id";

if(isset($_POST['consulta'])){
      $q = $mysqli->real_escape_string($_POST['consulta']);
      $query = "SELECT id ,idUsuario, nombreUsuario, ciudadUsuario FROM usuarios WHERE nombreUsuario LIKE '%".q."%' OR idUsuario LIKE '%".q."%' OR ciudadUsuario LIKE '%".q."%'";
}
$resultado = $mysqli->query($query);

if($resultado->num_rows > 0){
      $salida.="<table class='tabla_datos'>
                  <thead>
                        <tr>
                              <td>id</td>
                              <td>idUsuario</td>
                              <td>nombreUsuario</td>
                              <td>ciudadUsuario</td>
                        </tr>
                  </thead>
            <tbody>";
            
      while ($fila =  $resultado->fetch_assoc()){
            $salida.="<tr>
                  <td>".$fila['id']."</td>
                  <td>".$fila['idUsuario']."</td>
                  <td>".$fila['nombreUsuario']."</td>
                  <td>".$fila['ciudadUsuario']."</td>
            </tr>";
      }
      $salida.="</tbody></table>";
}else {
      $salida.="No se encontro ningun dato :C";
}

echo $salida:

$mysqli->close();

?>

