<?php

session_start();
$emailSesion = "";
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
    </head>
    <body>
        <!--Barra de navegación-->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo $URL;?>" style="color: rgb(118, 71, 161); font-weight: 800;">
                        <img src="<?php echo $URL;?>/Images/pata.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" >
                        Centro Veterinario
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo $URL;?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    </ul>
                    <div class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        <?php 
                            if($emailSesion == ""){
                                ?>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ingresar
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item btn" href="login/index.php">Iniciar sesión</a></li>
                                                <li><a class="dropdown-item btn" href="login/registro.php">Registrarse</a></li>
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