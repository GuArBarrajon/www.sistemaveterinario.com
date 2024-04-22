<?php
include("../../config.php");

$id = $_GET['id_venta'];
$cargo = $_GET['cargo'];

$sql = "DELETE FROM carrito WHERE id_venta = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);

if($query->execute()){
    if($cargo == 'administrador'){
        header('Location: '.$URL.'/admin/ventas');
    }
    else{
        header('Location: '.$URL);
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/ventas/create.php');
}