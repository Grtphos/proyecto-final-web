<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios agregar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/proveedores/editar/<?= $datos['id'] ?>" id="formProveedor" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <h2 class="text-center">Informacion del Proveedor</h2>
            <div class="col-md-6">
                <label for="idProve">ID Proveedor : </label>
                <input type="text" id="idProve" placeholder="ID del Proveedor" required="required" name="idProve" maxlength="50" value="<?= isset($datos['idProve'])?$datos['idProve']:'' ?>">
            </div>
            <hr>
            <div class="form-group col-md-8">
                <label for="nombreProve">Nombre Proveedor</label>
                <input type="text" class="form-control" id="nombreProve" placeholder="Nombre del Proveedor" required="required" name="nombreProve" maxlength="130" value="<?= isset($datos['nombreProve'])?$datos['nombreProve']:'' ?>">
            </div>
            <hr>
            <div class="form-group col-md-6">
                <label for="fotografiaProve">Fotografía</label>
                <input type="file" class="form-control" id="fotografiaProve" name ="fotografiaProve">
            </div>
            <hr>
        </div>
            <h2 class="text-center">Datos de la Empresa</h2>
            <div class="col-md-4">     
                <label for="empresaProve">Nombre de la Empresa</label>
                <input type="text" class="form-control" id="empresaProve" placeholder="Nombre de la Empresa" required="required" name="empresaProve" maxlength="13" value="<?= isset($datos['empresaProve'])?$datos['empresaProve']:'' ?>">
            </div>
            <hr>
            <div class="form-group col-md-4">
                <label for="ciudadProve">Ciudad : </label>
                <select id="ciudadProve" name="ciudadProve" >
                    <option value="no">Seleccione uno...</option>
                    <option value="Ahumada" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Ahumada'?'selected':''):''; ?>>Ahumada</option>
                    <option value="Aldama" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Aldama'?'selected':''):''; ?>>Aldama</option>
                    <option value="Campeche" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Campeche'?'selected':''):''; ?>>Campeche</option>
                    <option value="Allende" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Allende'?'selected':''):''; ?>>Allende</option>
                    <option value="Balleza" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Balleza'?'selected':''):''; ?>>Balleza</option>
                    <option value="Batopilas" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Batopilas'?'selected':''):''; ?>>Batopilas</option>
                    <option value="Buenaventura" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Buenaventura'?'selected':''):''; ?>>Buenaventura</option>
                    <option value="Camargo" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Camargo'?'selected':''):''; ?>>Camargo</option>
                    <option value="Casas Grandes" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Casas Grandes'?'selected':''):''; ?>>Casas Grandes</option>
                    <option value="Coyame" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Coyame'?'selected':''):''; ?>>Coyame</option>
                    <option value="Cuauhtemoc"<?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Cuauhtemoc'?'selected':''):''; ?>>Cuauhtemoc</option>
                    <option value="Delicias" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Delicias'?'selected':''):''; ?>>Delicias</option>
                    <option value="Gran Morelos" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Gran Morelos'?'selected':''):''; ?>>Gran Morelos</option>
                    <option value="Guachochi" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Guachochi'?'selected':''):''; ?>>Guachochi</option>
                    <option value="Hidalgo del Parral" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Hidalgo del Parral'?'selected':''):''; ?>>Hidalgo del Parral</option>
                    <option value="Ignacio Zaragoza" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Ignacio Zaragoza'?'selected':''):''; ?>>Ignacio Zaragoza</option>
                    <option value="Jimenez" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Jimenez'?'selected':''):''; ?>>Jimenez</option>
                    <option value="Julimes" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Julimes'?'selected':''):''; ?>>Julimes</option>
                    <option value="Juarez" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Juarez'?'selected':''):''; ?>>Juarez</option>
                    <option value="Madera" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Madera'?'selected':''):''; ?>>Madera</option>
                    <option value="Meoqui" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Meoqui'?'selected':''):''; ?>>Meoqui</option>
                    <option value="Namiquipa" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Namiquipa'?'selected':''):''; ?>>Namiquipa</option>
                    <option value="Ojinaga" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Ojinaga'?'selected':''):''; ?>>Ojinaga</option>
                    <option value="Rosales" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Rosales'?'selected':''):''; ?>>Rosales</option>
                    <option value="San Francisco de Conchos" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='San Francisco de Conchos'?'selected':''):''; ?>>San Francisco de Conchos</option>
                    <option value="Satevo" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Satevo'?'selected':''):''; ?>>Satevo</option>
                    <option value="Saucillo" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Saucillo'?'selected':''):''; ?>>Saucillo</option>
                    <option value="Valle de Zaragoza" <?= isset($datos['ciudadProve'])?($datos['ciudadProve']=='Valle de Zaragoza'?'selected':''):''; ?>>Valle de Zaragoza</option>
                </select>
            </div>
            <hr>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefonoProve">Teléfono</label>
                <input type="text" class="form-control" name ="telefonoProve" id="telefonoProve" required="required" value="<?= isset($datos['telefonoProve'])?$datos['telefonoProve']:'' ?>">
            </div>         
            <hr>
            <div class="form-group col-md-6">
                <label for="emailProve">Correo</label>
                <input type="email" class="form-control" name ="emailProve" id="emailProve" required="required" value="<?= isset($datos['emailProve'])?$datos['emailProve']:'' ?>">
            </div>
            <hr>
        </div>
        </fieldset>    
            <!--<div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>-->
            <br>
        <div class="form-row">
            <div class="row-md-8"></div>
            <div class="row-md-2">
                <button type="button" onClick=history.go(-1) class="btn btn-primary btn-block"><i class="fas fa-undo"></i>Regresar</button>
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Actualizar </button>
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