<?php
include("../../config.php");

$id = $_GET['id_carrito'];
$desde = $_GET['desde'];

$sql = "DELETE FROM carrito WHERE id_carrito = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);

if($query->execute()){
    header('Location: '.$URL.'/admin/ventas/create.php?desde='.$desde);
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/ventas/create.php?desde='.$desde);
}