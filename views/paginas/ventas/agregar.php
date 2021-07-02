<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios agregar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/ventas/agregar" id="formVentas" method="POST" enctype="multipart/form-data">
        
        <h1 class="text-center">Ventas</h1>
<hr>
<br>

  <div class="col-md-2">
    <label for="idVenta" class="form-label">ID Venta</label>
    <input type="text" class="form-control" id="idVenta" name="idVenta" required="required">
  </div>
  <div class="col-md-2 ">
    <label for="fechaVenta" class="form-label">Fecha</label>
    <input type="text" class="form-control" id="fechaVenta" name="fechaVenta" required="required">
  </div>
<br>
  <div class="col-md-4">
    <label for="articuloVenta" class="form-label">Articulo</label>
    <input type="text" class="form-control" id="articuloVenta" name="articuloVenta" required="required">
  </div>
  <div class="col-2">
    <label for="cantidadVenta" class="form-label">Cantidad</label>
    <input type="text" class="form-control" id="cantidadVenta" name="cantidadVenta" placeholder="">
  </div>
  <div class="col-2">
    <label for="precioVenta" class="form-label">Precio</label>
    <input type="text" class="form-control" id="precioVenta" name="precioVenta" placeholder="">
  </div>
  <div class="col-2">
    <label for="totalVenta" class="form-label">Total</label>
    <input type="text" class="form-control" id="totalVenta" name="totalVenta" placeholder="">
  </div>
<br>
<div class="form-row">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipoVenta" id="tipoVenta" value="1">
  <label class="form-check-label" for="normal">Contado</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipoVenta" id="tipoVenta" value="2">
  <label class="form-check-label" for="normal">Credito</label>
</div>
</div>
<hr>
<div class="form">
            <div class="row-md-8"></div>
            <div class="row-md-2">
                <button type="button" onClick=history.go(-1) class="btn btn-primary btn-block"><i class="fas fa-undo"></i>Regresar</button>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Agregar Venta </button>
            </div>
            <br>
        </div>
            
        </form>
    </div>
    <div class="col-sm-1"></div>
    
    
</div>
<?php
#cierre del if de mero arriba
        }
        else{ ?>
            <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card bg-default">
                    <div class="card-header">Avisos</div>
                    <div class="card-body">
                        Usted esta "logeado" como:
                        <?= isset($_SESSION['nombreUsuario'])?$_SESSION['nombreUsuario']:'No se ha "logeado"'; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
<?php
        }
include RUTA_APP . '/views/includes/footer.inc.php';
?>