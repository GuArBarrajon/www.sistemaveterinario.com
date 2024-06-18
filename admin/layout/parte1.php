<?php

session_start();
if(!isset($_SESSION['session email'])){
  header('Location: '.$URL.'/login');
}
else{
  $emailSesion = $_SESSION['session email'];
  $sql = "SELECT * FROM usuarios WHERE email = '$emailSesion'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll();
  foreach($usuarios as $usuario){
    $idUsuarioSesion = $usuario['id_usuario'];
    $nombreUsuarioSesion = $usuario['nombres'].' '.$usuario['apellido'];
    $cargoUsuarioSesion = $usuario['cargo'];
  }
  if($cargoUsuarioSesion == "cliente"){
    header('Location: '.$URL);
  }
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME; ?></title>
  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo $URL;?>/Images/pata.ico" type="image/x-icon">

  <!--Estilos CSS-->
  <link rel="stylesheet" href="<?php echo $URL;?>/css/style.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Iconos -->
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="<?php echo $URL;?>/Templates/plugins/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $URL;?>/admin" class="nav-link" title="Inicio Administrador"><?php echo APP_NAME; ?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(60, 15, 102);">
    <!-- Brand Logo -->
    <a href="<?php echo $URL;?>" class="brand-link" title="Vista clientes">
        <img src="<?php echo $URL;?>/Images/pata.ico" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo APP_NAME;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-1 mb-3 d-flex">
            <div class="inf">
            <a>
            <p class="d-block">Bienvenido</p>
            <p><?=$nombreUsuarioSesion; ?></p></a>
            </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>admin/Usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>admin/Usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>/admin/productos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>admin/productos/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Producto</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Turnos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>/admin/turnos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Turnos Solicitados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-store"> </i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>/admin/clientes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Proveedores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>/admin/proveedores" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>admin/proveedores/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Proveedor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>/admin/compras" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>admin/compras/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva Compra</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas bi-currency-dollar"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL;?>/admin/ventas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>admin/ventas/create.php?desde=admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva Venta</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link bg-danger">
              <i class="nav-icon fas fa-door-open"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">