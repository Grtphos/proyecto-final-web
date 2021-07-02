<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios agregar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/proveedores/eliminar/<?= $datos['id'] ?>" id="formProveedor" method="POST" enctype="multipart/form-data">
        <!--<div class="form-row">-->
        <div class="col-md-12">
            <p>Estas seguro de querer eliminar este registro <?= isset($datos['idProve'])?$datos['idProve']:''; ?> con nombre <?= isset($datos['nombreProve'])?$datos['nombreProve']:''; ?></p>
        </div>
        
        
        <div class="row-md-8"></div>
        <div class="row-md-2">
        <button type="button" onClick=history.go(-1) class="btn btn-primary btn-block"><i class="fas fa-undo"></i>  Regresar</button>
        <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Eliminar </button>
        </div>
        <br>
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