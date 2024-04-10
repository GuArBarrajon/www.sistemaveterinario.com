<?php
include("../../config.php");

$id = $_GET['id_proveedor'];


$sql = "DELETE FROM proveedores WHERE id_proveedor = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Proveedor borrado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/proveedores');
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/proveedores/delete.php?id_proveedor='.$id);
}
?>