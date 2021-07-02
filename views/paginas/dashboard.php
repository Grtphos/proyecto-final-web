<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
?>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="card text-center">
        <div class="card-header">
          Inicio de Seccion
        </div>
        <div class="card-body">
          <h5 class="card-title">Importante</h5>
          <p class="card-text">Usted ha iniciado seccion como:
                <?= isset($_SESSION['nombreUsuario'])?$_SESSION['nombreUsuario']:'No ha iniciado seccion'; ?></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php
include RUTA_APP . '/views/includes/footer.inc.php';
?>