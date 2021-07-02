<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
if(isset($_SESSION['autorizado']) && $_SESSION['autorizado'] == '4ut0ri3ad0'){
?>
<div class="row">
    <!--seccion de usuarios editar-->
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        
        <form action="<?= RUTA_URL; ?>/usuarios/editar/<?= $datos['id'] ?>" id="formUsuario" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <h2 class="text-center">Informacion de Usuario</h2>
            <div class="col-md-6">
                <label for="idUsuario">ID Usuario</label>
                <input type="text" class="form-control" id="idUsuario" placeholder="ID Usuario" required="required" name="idUsuario" maxlength="14" value="<?= isset($datos['idUsuario'])?$datos['idUsuario']:'' ?>">
            </div>
            <hr>
            <div class="form-group col-md-8">
                <label for="nombreUsurio">Nombre Usuario</label>
                <input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" required="required" name="nombreUsuario" maxlength="130" value="<?= isset($datos['nombreUsuario'])?$datos['nombreUsuario']:'' ?>">
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
                <input type="text" class="form-control" id="rfcUsuario" placeholder="R.F.C." required="required" name="rfcUsuario" maxlength="13" value="<?= isset($datos['rfcUsuario'])?$datos['rfcUsuario']:'' ?>">
            </div>
            <hr>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="emailUsuario">Email</label>
                <input type="email" name= "emailUsuario" class="form-control" id="emailUsuario" placeholder="Correo" required="required" value="<?= isset($datos['emailUsuario'])?$datos['emailUsuario']:'' ?>">
            </div>
            <hr>
        </div>
        <fieldset>
        <div class="form-group">
            <label for="direccionUsuario">Direcci&oacute;n</label>
            <input type="text" class="form-control" id="direccionUsuario" name ="direccionUsuario" placeholder="Direcci&oacute;n" value="<?= isset($datos['direccionUsuario'])?$datos['direccionUsuario']:'' ?>">
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ciudadUsuario">Ciudad</label>
                <input type="text" class="form-control" name="ciudadUsuario" id="ciudadUsuario" value="<?= isset($datos['ciudadUsuario'])?$datos['ciudadUsuario']:'' ?>">
            </div>
            <hr>
            <div class="form-group col-md-4">
                <label for="estadoUsuario">Estado</label>
                <select id="estadoUsuario" name="estadoUsuario" class="form-control">
                    <option value="no">Seleccione uno...</option>
                    <option value="Aguascalientes" 
                    >Aguascalientes</option>
                    <option value="Baja California" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Baja California'?'selected':''):''; ?>>Baja California</option>
                    <option value="Baja California Sur" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Baja California Sur'?'selected':''):''; ?>>Baja California Sur</option>
                    <option value="Campeche" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Campeche'?'selected':''):''; ?>>Campeche</option>
                    <option value="Chiapas" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Chiapas'?'selected':''):''; ?>>Chiapas</option>
                    <option value="Chihuahua" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Chihuahua'?'selected':''):''; ?>>Chihuahua</option>
                    <option value="CDMX" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='CDMX'?'selected':''):''; ?>>Ciudad de México</option>
                    <option value="Coahuila" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Coahuila'?'selected':''):''; ?>>Coahuila</option>
                    <option value="Colima" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Colima'?'selected':''):''; ?>>Colima</option>
                    <option value="Durango" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Durango'?'selected':''):''; ?>>Durango</option>
                    <option value="Estado de México" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Estado de México'?'selected':''):''; ?>>Estado de México</option>
                    <option value="Guanajuato" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Guanajuato'?'selected':''):''; ?>>Guanajuato</option>
                    <option value="Guerrero" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Guerrero'?'selected':''):''; ?>>Guerrero</option>
                    <option value="Hidalgo" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Hidalgo'?'selected':''):''; ?>>Hidalgo</option>
                    <option value="Jalisco" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Jalisco'?'selected':''):''; ?>>Jalisco</option>
                    <option value="Michoacán" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Michoacán'?'selected':''):''; ?>>Michoacán</option>
                    <option value="Morelos" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Morelos'?'selected':''):''; ?>>Morelos</option>
                    <option value="Nayarit" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Nayarit'?'selected':''):''; ?>>Nayarit</option>
                    <option value="Nuevo León" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Nuevo León'?'selected':''):''; ?>>Nuevo León</option>
                    <option value="Oaxaca" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Oaxaca'?'selected':''):''; ?>>Oaxaca</option>
                    <option value="Puebla" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Puebla'?'selected':''):''; ?>>Puebla</option>
                    <option value="Querétaro" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Querétaro'?'selected':''):''; ?>>Querétaro</option>
                    <option value="Quintana Roo" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Quintana Roo'?'selected':''):''; ?>>Quintana Roo</option>
                    <option value="San Luis Potosí" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='San Luis Patosí'?'selected':''):''; ?>>San Luis Potosí</option>
                    <option value="Sinaloa" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Sinaola'?'selected':''):''; ?>>Sinaloa</option>
                    <option value="Sonora" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Sonora'?'selected':''):''; ?>>Sonora</option>
                    <option value="Tabasco" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Tabasco'?'selected':''):''; ?>>Tabasco</option>
                    <option value="Tamaulipas" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Tamaulipas'?'selected':''):''; ?>>Tamaulipas</option>
                    <option value="Tlaxcala" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Tlaxcala'?'selected':''):''; ?>>Tlaxcala</option>
                    <option value="Veracruz" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Veracruz'?'selected':''):''; ?>>Veracruz</option>
                    <option value="Yucatán" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Yucatán'?'selected':''):''; ?>>Yucatán</option>
                    <option value="Zacatecas" <?= isset($datos['estadoUsuario'])?($datos['estadoUsuario']=='Zacatecas'?'selected':''):''; ?>>Zacatecas</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefonoUsuario">Teléfono</label>
                <input type="text" class="form-control" name ="telefonoUsuario" id="telefonoUsuario" required="required" value="<?= isset($datos['telefonoUsuario'])?$datos['telefonoUsuario']:'' ?>">
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
                            <input type="radio" name="permisoUsuario" id="normal" value="N" <?= isset($datos['permisoUsuario'])?($datos['permisoUsuario']=='N'?'checked':''):''; ?>>
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
                            <input type="radio" name="permisoUsuario" id="administrador" value="A" <?= isset($datos['permisoUsuario'])?($datos['permisoUsuario']=='A'?'checked':''):''; ?> >
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
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Actualizar </button>
            </div>
            <br>
        </div>
        
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
                <div class="card text-center">
                <div class="card-header">
                  Inicio de Seccion
                </div>
                <div class="card-body">
                  <h5 class="card-title">Importante</h5>
                  <p class="card-text">Usted ha iniciado seccion como:
                        <?= isset($_SESSION['nombreUsuario'])?$_SESSION['nombreUsuario']:'No ha iniciado seccion'; ?></p>
                  <a href="<?= RUTA_URL ?>/auths/login" class="btn btn-primary">Ir a inicio de seccion</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
<?php
        }
include RUTA_APP . '/views/includes/footer.inc.php';
?>