<?php
// Asegúrate de iniciar la sesión al principio del script
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Verifica si el usuario ha iniciado sesión y muestra un saludo
$saludo = '';
if (isset($_SESSION['username'])) {
    $saludo = '¡Bienvenido/a, ' . htmlspecialchars($_SESSION['username']) . '!';
}

?>

<nav class="navbar navbar-expand-sm navbar-dark bg-purple">
  <!-- ...resto de tu código de navegación... -->
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo navbar"  width="80px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      
        
    </button>
    
      <ul class="navbar-nav me-auto">
       <li class="nav-item dropdown">
        <li>
        <a class="nav-link" href="?controller=Carrito">  <i class="fa-solid fa-cart-shopping"></i></a>
           
        </li>
        <li>
        <a class="nav-link" href="?controller=Articulo&action=listarticle"> <i class="fa-solid fa-shirt"></i></a>
           
        </li>
       
       
        </li>
      </ul>
      </ul>
  <!-- Dropdown para usuario/admin -->
  <!-- Dropdown del usuario -->
  <ul class="navbar-nav d-flex">
          <!-- Saludo de bienvenida -->
        <?php if (isset($_SESSION['username'])): ?>
          <span class="navbar-text">
            ¡Bienvenido/a, <?= htmlspecialchars($_SESSION['username']) ?>!
          </span>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fa-solid fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <!-- Opciones para el administrador -->
              <li><a class="dropdown-item" href="?controller=Dashboard">Admin<i class="fa-solid fa-toolbox"></i></a></li>
              <li><a class="dropdown-item" href="?controller=Logout">Cerrar Sesión <i class="fa-solid fa-right-from-bracket"></i></a></li>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'cliente'): ?>
              <!-- Opciones para el cliente -->
              <li><a class="dropdown-item" href="?controller=Perfil">Perfil <i class="fa-solid fa-id-badge"></i></a></li>
              <li><a class="dropdown-item" href="?controller=Logout">Cerrar Sesión <i class="fa-solid fa-right-from-bracket"></i></a></li>
            <?php else: ?>
              <!-- Opciones para visitantes -->
              <li><a class="dropdown-item" href="?controller=Login&action=showLoginForm">Login <i class="fa-solid fa-right-to-bracket"></i></a></li>
              <li><a class="dropdown-item" href="?controller=Registro&action=showRegistroForm">Registro <i class="fa-solid fa-address-card"></i></a></li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Añade el saludo aquí en la barra de navegación o en cualquier lugar que prefieras en tu encabezado -->

<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/la.jpg" alt="Los Angeles" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>Aprovecha nuestras ofertas</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/chicago.jpg" alt="Chicago" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Aprovecha nuestras ofertas</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/ny.jpg" alt="New York" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>Aprovecha nuestras ofertas</p>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>



