<?php
include("../../config.php");

$id = $_POST['id_venta'];

//Primero se borra la compra
$pdo->beginTransaction();
$sql = "DELETE FROM compras WHERE id_compra = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);


if($query->execute()){

    //luego se modifica el stock de producto
    $stockAnterior = $_POST['stock'];
    $cantidad = $_POST['cantidad'];
    $stock = $stockAnterior - $cantidad;

    $sql = "Update productos SET stock = :stock, fyh_actualizacion = :fyh_actualizacion WHERE id_producto = :id_producto";
    $query = $pdo->prepare($sql);
    $query->bindParam('stock', $stock);
    $query->bindParam('fyh_actualizacion', $fechaHora);
    $query->bindParam('id_producto', $_POST['id_producto']);

    if($query->execute()){
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Compra eliminada exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/admin/compras');
        }
        else{
            $pdo->rollBack();
            session_start();
            $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/admin/compras/delete.php?id_compra='.$id);
        }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/compras/delete.php?id_compra='.$id);
}


