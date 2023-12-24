<?php
include("../../config.php");

$id = $_GET['id_usuario'];

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