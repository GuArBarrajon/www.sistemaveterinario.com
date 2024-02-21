<?php
include("../../config.php");

$id = $_GET['id_producto'];

$sql = "DELETE FROM productos WHERE id_producto = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Producto borrado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/productos');
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/productos/delete.php?id_producto='.$id);
}
?>