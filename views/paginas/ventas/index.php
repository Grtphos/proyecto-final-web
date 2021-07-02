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
        
        <a class="btn btn-info btn-lg float-end" href="<?= RUTA_URL ?>/ventas/agregar/"><i class="fa fa-plus"></i>Agregar Nueva Venta</a>
        
        
        <table class="table table-striped">
            
            <thead>
                <th>ID</th>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Tipo</th>
            </thead>
            
            <tbody id="contenidoTabla">
                
                <?php $registros = $datos['ventas']['registros'];
                
                foreach($registros as $registro){  ?>
                    <tr>
                        <td><?=  $registro->id ?></td>
                        <td><?=  $registro->idVenta ?></td>
                        <td><?=  $registro->fechaVenta ?></td>
                        <td><?=  $registro->articuloVenta ?></td>
                        <td><?=  $registro->cantidadVenta ?></td>
                        <td><?=  $registro->precioVenta ?></td>
                        <td><?=  $registro->totalVenta ?></td>
                        <td><?=  $registro->tipoVenta ?></td>
                        
                    </tr>
                <?php }
                ?>
                
            </tbody>
            
            <tfoot>
                
            </tfoot>
            
        </table>
        
        <!--datos de navegacion-->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <li class="page-item <?= ($datos['ventas']['pagina'] <=1)?'disabled':'' ?>">
        <a class="page-link" href="<?php if($datos['ventas']['pagina'] <=1 ) {echo '#';} else { echo RUTA_URL . '/ventas/index/' . $datos['ventas']['limite'] . '/' . $datos['ventas']['previa']; }?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
        </a>
        </li>
        <?php for($i = 1; $i <= $datos['ventas']['totalPaginas']; $i++){ ?>
        <li class="page-item <?= ($datos['ventas']['pagina'] ==$i)?'active':'' ?>"><a class="page-link" href="<?= RUTA_URL . '/ventas/index/' . $datos['ventas']['limite'] . '/' . $i; ?>"><?= $i ?> </a></li>
        <?php } ?>
        
        <li class="page-item <?= ($datos['ventas']['pagina'] >= $datos['ventas']['totalPaginas'])?'disabled':'' ?>">
        <a class="page-link" href="<?php if($datos['ventas']['pagina'] >= $datos['ventas']['totalPaginas'] ) {echo '#';} else { echo RUTA_URL . '/ventas/index/' . $datos['ventas']['limite'] . '/' . $datos['ventas']['siguiente']; }?>" aria-label="Next">
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
