<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Menú Principal</title>
 <link rel="stylesheet" href="../../public/css/bs/css/bootstrap.min.css">
 <link rel="stylesheet" href="../../public/css/fontawesome.min.css">
 <link rel="stylesheet" href="../../public/css/all.min.css">
</head>

<body>
 <header>
  <div class="container mt-2">
    <h1 class="text-center text-success">Implementos y Maquinaria Agricola "LOYA"</h1>
  </div>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" target="_blank"><img src="../../public/images/logo.png" alt="" width="80" height="54"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= RUTA_URL ?>"><i class="fa fa-home text-light"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= RUTA_URL ?>/usuarios/index"><i class="fas fa-portrait text-light"></i> Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= RUTA_URL ?>/proveedores/index"><i class="fas fa-address-card text-light"></i> Provedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= RUTA_URL ?>/articulos/index"><i class="fas fa-tractor text-light"></i> Maquinaria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= RUTA_URL ?>/ventas/index"><i class="fas fa-shopping-cart text-light"></i> Ventas</a>
        </li>
      </ul>
      <ul class="navbar-nav d-flex">
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Acceso
                </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li><a class="dropdown-item" href="<?= RUTA_URL ?>/auths/login">Login</a></li>
                  <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="<?= RUTA_URL ?>/auths/logout">Logout</a></li>
               </ul>
           </li>
       </ul>
    </div>
  </div>
</nav>
  
 </header>
 
 <main class="flex-shrink-0">
  <div class="container mt-1">