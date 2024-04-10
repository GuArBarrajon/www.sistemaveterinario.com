<?php

session_start();
$emailSesion = "";
$cargoUsuarioSesion = "";
if(isset($_SESSION['session email'])){
    echo $emailSesion;
    $emailSesion = $_SESSION['session email'];
    $sql = "SELECT * FROM usuarios WHERE email = '$emailSesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll();
    foreach($usuarios as $usuario){
        $idUsuarioSesion = $usuario['id_usuario'];
        $nombreUsuarioSesion = $usuario['nombres'];
        $apellidoUsuarioSesion = $usuario['apellido'];
        $cargoUsuarioSesion = $usuario['cargo'];
    }
}

?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Centro Veterinario</title>
        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo $URL;?>/Images/pata.ico" type="image/x-icon">

        <!--Estilos CSS-->
        <link rel="stylesheet" href="<?php echo $URL;?>/css/style.css">

        <!--Estilos Bootstrap-->
        <link href="<?php echo $URL;?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <!--Iconos-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <!--jQuery-->
        <script src="<?php echo $URL;?>/js/jquery-3.7.1.min.js"></script>
        <script src="<?php echo $URL;?>/Templates/plugins/jquery/jquery.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $URL;?>/Templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    </head>
    <body>
        <!--Barra de navegación-->
            <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo $URL;?>" style="color: rgb(118, 71, 161); font-weight: 800;" title="Inicio">
                        <img src="<?php echo $URL;?>/Images/pata.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" >
                        Centro Veterinario
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link btn" href="<?php echo $URL;?>#productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="<?php echo $URL;?>#galeria">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="<?php echo $URL;?>#nosotros">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="<?php echo $URL;?>#fin">Contacto</a>
                    </li>

                    <?php 
                        if ($cargoUsuarioSesion != "" and $cargoUsuarioSesion != "cliente"){?>
                            <li class="nav-item">
                                <a class="nav-link btn" href="<?php echo $URL;?>admin/clientes">Turnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" href="<?php echo $URL;?>/admin">Administrador</a>
                            </li><?php
                        }
                        else{?>
                            <li class="nav-item">
                                <a class="nav-link btn" href="<?php echo $URL;?>reservar.php">Turnos</a>
                            </li><?php
                        }
                    ?>
                    </ul>
                    <div class="d-flex" role="search">
                        <?php 
                            if($emailSesion == ""){
                                ?>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ingresar
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item btn" href="<?php echo $URL;?>login/index.php">Iniciar sesión</a></li>
                                                <li><a class="dropdown-item btn" href="<?php echo $URL;?>login/registro.php">Registrarse</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                <?php
                            }
                            else{
                                ?>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo $emailSesion;?>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item btn" href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php">Cerrar sesión</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>
                </div>
            </nav>