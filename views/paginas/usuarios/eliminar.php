<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios agregar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/usuarios/eliminar/<?= $datos['id'] ?>" id="formUsuario" method="POST" enctype="multipart/form-data">
        <!--<div class="form-row">-->
        <div class="col-md-12">
            <p>Estas seguro de querer eliminar este registro <?= isset($datos['idUsuario'])?$datos['idUsuario']:''; ?> con nombre <?= isset($datos['nombreUsuario'])?$datos['nombreUsuario']:''; ?></p>
        </div>
        
        
        <div class="col-md-8"></div>
        <div class="col-md-2">
        <button type="button" onClick=history.go(-1) class="btn btn-primary btn-block"><i class="fas fa-undo"></i>  Regresar</button>
        </div>
        <br>
        <div class="col-md-2">
        <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Eliminar </button>
        </div>
        <!--<div class="form-group col-md-4"></div> -->
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