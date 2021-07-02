<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>

<div class="row">
    
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form action="<?= RUTA_URL; ?>/articulos/agregar" id="formArticulo" method="POST" enctype="multipart/form-data">
            <!--<div class="form-row">-->
                <h2 class="text-center">Datos de la Maquinaria</h2>
                <div class="col-md-2">
                    <label for="idArticulo">ID Articulo</label>
                    <input type="text" class="form-control" id="idArticulo" placeholder="ID Articulo" required="required" name="idArticulo" maxlength="10">
                </div>
                <hr>
                <div class="col-md-4">
                    <label for="nombreArticulo">Nombre del Articulo</label>
                    <input type="text" class="form-control" id="nombreArticulo" placeholder="Nombre del Articulo" required="required" name="nombreArticulo" maxlength="130">
                </div>
                <hr>
                <div class="col-md-4">     
                    <label for="precioArticulo">Precio del Articulo</label>
                    <input type="text" class="form-control" id="precioArticulo" placeholder="Precio del Articulo" required="required" name="precioArticulo" maxlength="12">
                </div>
                <hr>
            <div class="col-md-6">
                <label for="fotografiaArticulo">Fotografía</label>
                <input type="file" class="form-control" id="fotografiaArticulo" name ="fotografiaArticulo">
            </div>
            
            <!--<div class="form">-->
            <hr>
            <br>
            <div class="col-md-4"></div>
            <div class="form-group col-md-2">
                <button type="button" onClick=history.go(-1) class="btn btn-primary btn-block"><i class="fas fa-undo"></i>Regresar</button>
            </div>
            <br>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Agregar </button>
            </div>
            <!--</div>-->
            <!--</div>-->       
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