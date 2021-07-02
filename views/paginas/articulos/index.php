<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';

#verificar autentificacion
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
    
?>
<div class="row">
    <!--seccion de usuarios-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <a class="btn btn-info btn-lg float-end" href="<?= RUTA_URL ?>/articulos/agregar/"><i class="fa fa-plus"></i>Nuevo Articulo</a>
        
        <table class="table table-striped">
            
            <thead>
                <th>ID</th>
                <th>ID Articulo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Fotografia</th>
                <th>Opciones</th>
            </thead>
            
            <tbody id="contenidoTabla">
                
                <?php $registros = $datos['articulos']['registros'];
                
                foreach($registros as $registro){  ?>
                    <tr>
                        <td><?=  $registro->id ?></td>
                        <td><?=  $registro->idArticulo ?></td>
                        <td><?=  $registro->nombreArticulo ?></td>
                        <td><?=  $registro->precioArticulo ?></td>
                        <td> <img src="data:image/png;base64,<?=  base64_encode($registro->fotografiaArticulo) ?>" alt="Foto" width="200"></td>
                        <td><a href="<?= RUTA_URL ?>/articulos/editar/<?= $registro->id ?>" class="btn btn-warning stn-sm"><i class="fa fa-edit"></i></a> <a href="<?= RUTA_URL ?>/articulos/eliminar/<?= $registro->id ?>" class="btn btn-danger stn-sm"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php }
                ?>
                
            </tbody>
            
            <tfoot>
                <tr><td colspan="6">Todos los derechos reservados, <?= date('Y'); ?></td></tr>
                <tr><td colspan="5">&nbsp;</td><td colspan="1">
                <button type="button" class="btn btn-info btn-sm" title="Exportar a CSV"><i class="fa fa-file-csv" id="csv"></i></button>
                <button type="button" class="btn btn-info btn-sm" title="Exportar a XML"><i class="fa fa-file-code" id="xml"></i></button>
                <button type="button" class="btn btn-info btn-sm" title="Exportar a JSON"><i class="fa fa-file-export" id="json"></i></button>
                
                <a href="<?= RUTA_URL ?>/articulos/imprimir" target="_blank" class="btn btn-info btn-sm" title="Imprimir en PDF"><i class="fa fa-file-pdf"></i></a>
                </td></tr>
            </tfoot>
            
        </table>
        
        <!--datos de navegacion-->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($datos['articulos']['pagina'] <=1)?'disabled':'' ?>">
                <a class="page-link" href="<?php if($datos['articulos']['pagina'] <=1 ) {echo '#';} else { echo RUTA_URL . '/articulos/index/' . $datos['articulos']['limite'] . '/' . $datos['articulos']['previa']; }?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i = 1; $i <= $datos['articulos']['totalPaginas']; $i++){ ?>
            <li class="page-item <?= ($datos['articulos']['pagina'] ==$i)?'active':'' ?>"><a class="page-link" href="<?= RUTA_URL . '/articulos/index/' . $datos['articulos']['limite'] . '/' . $i; ?>"><?= $i ?> </a></li>
            <?php } ?>
        
            <li class="page-item <?= ($datos['articulos']['pagina'] >= $datos['articulos']['totalPaginas'])?'disabled':'' ?>">
                <a class="page-link" href="<?php if($datos['articulos']['pagina'] >= $datos['articulos']['totalPaginas'] ) {echo '#';} else { echo RUTA_URL . '/articulos/index/' . $datos['articulos']['limite'] . '/' . $datos['articulos']['siguiente']; }?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
        </nav>
                  
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
<?php }
include RUTA_APP . '/views/includes/footer.inc.php';
?>


<script>
    $(function(){
        $('#csv').on('click',function(){
            $.ajax({
                type: 'GET',
                url: "<?= RUTA_URL ?>/articulos/csv",
                dataType: 'json',
                success: function(respuesta){
                    if (respuesta.hecho) {
                        alert('Archivo creado con exito');
                        }
                    },
                error: function(e){
                    colsole.log(e.responseText);
                    }
                
                });            
            });
        
        $('#xml').on('click',function(){
            $.ajax({
                type:'GET',
                url: "<?= RUTA_URL ?>/articulos/xml",
                dataType: 'json',
                success: function(respuesta){
                    if (respuesta.hecho) {
                        alert('Archivo creado con exito');
                        }
                    },
                error: function(e){
                    colsole.log(e.responseText);
                    }
                
                });            
            });
        
        $('#json').on('click',function(){
            $.ajax({
                type:'GET',
                url: "<?= RUTA_URL ?>/articulos/json",
                dataType: 'json',
                success: function(respuesta){
                    if (respuesta.hecho) {
                        alert('Archivo creado con exito');
                        }
                    },
                error: function(e){
                    colsole.log(e.responseText);
                    }
                
                });            
            });
        });
</script>