<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios agregar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/usuarios/agregar" id="formUsuario" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <h2 class="text-center">Informacion de Usuario</h2>
            <div class="col-md-6">
                <label for="idUsuario">ID Usuario</label>
                <input type="text" class="form-control" id="idUsuario" placeholder="ID Usuario" required="required" name="idUsuario" maxlength="100">
            </div>
            <hr>
            <div class="form-group col-md-8">
                <label for="nombreUsurio">Nombre Usuario</label>
                <input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" required="required" name="nombreUsuario" maxlength="130">
            </div>
            <hr>
            <div class="form-group col-md-6">
                <label for="passwordUsuario">Password</label>
                <input type="password" class="form-control" name ="passwordUsuario" id="passwordUsuario" required="required">
            </div>
            <div class="form-group col-md-6">
                <label for="passwordCUsuario">Confirmaci&oacute;n Password</label>
                <input type="password" class="form-control" id="passwordCUsuario" name ="passwordCUsuario" required="required">
            </div>
            <hr>
            <h2 class="text-center">Datos Personales</h2>
            <div class="col-md-4">     
                <label for="rfcUsuario">R.F.C</label>
                <input type="text" class="form-control" id="rfcUsuario" placeholder="R.F.C." required="required" name="rfcUsuario" maxlength="13">
            </div>
            <hr>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="emailUsuario">Email</label>
                <input type="email" name= "emailUsuario" class="form-control" id="emailUsuario" placeholder="Correo" required="required" >
            </div>
            <hr>
        </div>
        <fieldset>
        <div class="form-group">
            <label for="direccionUsuario">Direcci&oacute;n</label>
            <input type="text" class="form-control" id="direccionUsuario" name ="direccionUsuario" placeholder="Direcci&oacute;n">
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ciudadUsuario">Ciudad</label>
                <input type="text" class="form-control" name="ciudadUsuario" id="ciudadUsuario">
            </div>
            <hr>
            <div class="form-group col-md-4">
                <label for="estadoUsuario">Estado</label>
                <select id="estadoUsuario" name="estadoUsuario" class="form-control">
                    <option value="no">Seleccione uno...</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="CDMX">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefonoUsuario">Teléfono</label>
                <input type="text" class="form-control" name ="telefonoUsuario" id="telefonoUsuario" required="required">
            </div>
            <hr>
            <div class="form-group col-md-6">
                <label for="fotografiaUsuario">Fotografía</label>
                <input type="file" class="form-control" id="fotografiaUsuario" name ="fotografiaUsuario">
            </div>
            <hr>
        </div>
        </fieldset>
        <fieldset>
        <h2 class="text-center">Permisos</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" name="permisoUsuario" id="normal" value="N">
                        </div>
                    </div>
                    <label for="normal" class="form-control" checked="checked">Normal</label>
                </div>
            </div>
            <br>
            <div class="form-group col-md-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" name="permisoUsuario" id="administrador" value="A" >
                        </div>
                    </div>
                    <label for="normal" class="form-control">Administrador</label>
                </div>
            </div>
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
        <div class="form">
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