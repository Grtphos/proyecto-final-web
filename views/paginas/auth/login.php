<?php
session_start();
include RUTA_APP . '/views/includes/header.inc.php';
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h4 > <?php if(isset($datos)){
            echo isset ($datos['titulo'])?$datos['titulo']:'no se pudo mi pana';
        } ?> </h4>
        <div class="card aqua">
            <div class="card-header">
                Login <i class="fa fa-key text-warning float-right"></i>
            </div>
        <div class="card-body">
            <form action="<?= RUTA_URL;?>/auths/login" method="POST" >
            <div class="form-group">
                <label for="emailUsuario">Dirección de Correo</label>
                <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" aria-describedby="emailHelp" required placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Nunca comparta su contraseña con nadie.</small>
            </div>
            <div class="form-group">
                <label for="passwordUsuario">Password</label>
                <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" required placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
        </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php
include RUTA_APP . '/views/includes/footer.inc.php';
?>