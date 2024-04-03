<?php
include("../../config.php");
$idUsuario = $_POST['id_usuario'];

//verificamos que todos los campos hayan sido completados 
if(!empty($_POST['nombre']) and !empty($_POST['especie']) and !empty($_POST['raza']) and !empty($_POST['fecha_nac']) ){
    $nombre = $_POST['nombre'];
    $especie = $_POST['especie'];
    $raza = $_POST['raza'];
    $fechaNac = $_POST['fecha_nac'];
    
    $sql = "INSERT INTO mascotas (id_usuario, nombre, especie, raza, fecha_nac)
    VALUES (:id_usuario, :nombre, :especie, :raza, :fecha_nac)";
    $query = $pdo->prepare($sql);
    $query->bindParam('id_usuario', $idUsuario);
    $query->bindParam('nombre', $nombre);
    $query->bindParam('especie', $especie);
    $query->bindParam('raza', $raza);
    $query->bindParam('fecha_nac', $fechaNac);
            
    if($query->execute()){
        session_start();
        $_SESSION['mensaje'] = "Mascota registrada exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/admin/mascotas/index.php?id_usuario='.$idUsuario);
    }
    else{
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/mascotas/create.php?id_usuario='.$idUsuario);
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/mascotas/create.php?id_usuario='.$idUsuario);
}


?>