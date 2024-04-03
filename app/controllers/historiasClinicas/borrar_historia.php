<?php
include("../../config.php");

$id = $_GET['id_historia'];
$idMasc = $_POST['id_mascota'];

$sql = "DELETE FROM historias_clinicas WHERE id_historia = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);

if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Entrada borrada exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/historiasClinicas/index.php?id_mascota='.$idMasc);
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/historiasClinicas/delete.php?id_hitoria='.$id);
}
?>