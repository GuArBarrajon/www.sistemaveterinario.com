<?php
include("../../config.php");

$id = $_GET['id_mascota'];
$id_usuario = $_POST['id_usuario'];

$sql = "DELETE FROM historias_clinicas WHERE id_mascota = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
$query->execute();

$sql = "DELETE FROM mascotas WHERE id_mascota = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Mascota borrada exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/mascotas/index.php?id_usuario='.$id_usuario);
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/mascotas/delete.php?id_mascota='.$id);
}
?>