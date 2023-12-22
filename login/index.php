<?php
include ('../app/config.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo $URL;?>/Images/pata.ico" type="image/x-icon">
  
  <title><?php echo APP_NAME; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href='<?php echo $URL;?>/Templates/plugins/fontawesome-free/css/all.min.css'>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/Templates/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $URL;?>/Templates/index2.html"><b>Formulario de Ingreso</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <img src="<?php echo $URL;?>/Images/pata.jpg" alt="Logo" width="100" height="100" class="rounded-circle mx-auto d-block">
      <p class="login-box-msg" style="font-weight: 800;">Ingrese sus datos</p>

      <form action="<?php echo $URL;?>/app/controllers/login/controller_login.php" method="post">
      
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          <a href="<?php echo $URL;?>" class="btn btn-secondary btn-block mt-3">Cancelar</a>
        </div>
      </form>
    </div>

  </div>
</div>

<!-- jQuery -->
<script src="<?php echo $URL;?>/Templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/Templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/Templates/dist/js/adminlte.min.js"></script>
</body>
</html>
