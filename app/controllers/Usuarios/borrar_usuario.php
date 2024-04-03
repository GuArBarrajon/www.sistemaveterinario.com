<?php
include("../../config.php");

$id = $_GET['id_usuario'];

//primero se buscan las mascotas registradas para este usuario
$sql = "SELECT * FROM mascotas WHERE id_usuario = '$id'";
$query = $pdo->prepare($sql);
$query->execute();
$mascotas = $query->fetchAll();

//luego se eliminan las historias clínicas de esas mascotas
foreach($mascotas as $mascota){
    $idMasc = $mascota['id_mascota'];
    $sql = "DELETE FROM historias_clinicas WHERE id_mascota = '$idMasc'";
    $query = $pdo->prepare($sql);
    $query->execute();
}

//después se borran las mascotas
$sql = "DELETE FROM mascotas WHERE id_usuario = '$id'";
$query = $pdo->prepare($sql);
$query->execute();

//por último, el usuario
$sql = "DELETE FROM usuarios WHERE id_usuario = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Usuario borrado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/usuarios');
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/usuarios/delete.php?id_usuario='.$id);
}
?>