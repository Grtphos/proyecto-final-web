<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios agregar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/proveedores/agregar" id="formProveedor" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <h2 class="text-center">Informacion del Proveedor</h2>
            <div class="col-md-6">
                <label for="idProve">ID Proveedor : </label>
                <input type="text" id="idProve" placeholder="ID del Proveedor" required="required" name="idProve" maxlength="50">
            </div>
            <hr>
            <div class="form-group col-md-8">
                <label for="nombreProve">Nombre Proveedor</label>
                <input type="text" class="form-control" id="nombreProve" placeholder="Nombre del Proveedor" required="required" name="nombreProve" maxlength="130">
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
                <input type="text" class="form-control" id="empresaProve" placeholder="Nombre de la Empresa" required="required" name="empresaProve" maxlength="13">
            </div>
            <hr>
            <div class="form-group col-md-4">
                <label for="ciudadProve">Ciudad : </label>
                <select id="ciudadProve" name="ciudadProve" >
                    <option value="no">Seleccione uno...</option>
                    <option value="Ahumada">Ahumada</option>
                    <option value="Aldama">Aldama</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Allende">Allende</option>
                    <option value="Balleza">Balleza</option>
                    <option value="Batopilas">Batopilas</option>
                    <option value="Buenaventura">Buenaventura</option>
                    <option value="Camargo">Camargo</option>
                    <option value="Casas Grandes">Casas Grandes</option>
                    <option value="Coyame">Coyame</option>
                    <option value="Cuauhtemoc">Cuauhtemoc</option>
                    <option value="Delicias">Delicias</option>
                    <option value="Gran Morelos">Gran Morelos</option>
                    <option value="Guachochi">Guachochi</option>
                    <option value="Hidalgo del Parral">Hidalgo del Parral</option>
                    <option value="Ignacio Zaragoza">Ignacio Zaragoza</option>
                    <option value="Jimenez">Jimenez</option>
                    <option value="Julimes">Julimes</option>
                    <option value="Juarez">Juarez</option>
                    <option value="Madera">Madera</option>
                    <option value="Meoqui">Meoqui</option>
                    <option value="Namiquipa">Namiquipa</option>
                    <option value="Ojinaga">Ojinaga</option>
                    <option value="Rosales">Rosales</option>
                    <option value="San Francisco de Conchos">San Francisco de Conchos</option>
                    <option value="Satevo">Satevo</option>
                    <option value="Saucillo">Saucillo</option>
                    <option value="Valle de Zaragoza">Valle de Zaragoza</option>
                </select>
            </div>
            <hr>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefonoProve">Teléfono</label>
                <input type="text" class="form-control" name ="telefonoProve" id="telefonoProve" required="required">
            </div>         
            <hr>
            <div class="form-group col-md-6">
                <label for="emailProve">email</label>
                <input type="email" class="form-control" name ="emailProve" id="emailProve" required="required">
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
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Agregar </button>
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