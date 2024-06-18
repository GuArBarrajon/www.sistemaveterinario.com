<?php
include("../../config.php");

$id_venta = $_POST['id_venta'];

//primero se buscan todos los carritos de esa venta
$pdo->beginTransaction();
$sql = "SELECT * FROM carrito WHERE id_venta = '$id_venta'";
$query = $pdo->prepare($sql);
$query->execute();
$carritos = $query->fetchAll();

//para cada carrito/producto de la venta:
foreach($carritos as $carrito){
    $id_producto = $carrito['id_producto'];
    $cantidad = $carrito['cantidad'];

    //buscamos el producto
    $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $producto = $query->fetch();

    //calculamos el nuevo stock, sumando al stock del producto la cantidad de la venta
    $nuevo_stock = $producto['stock'] + $cantidad;

    //actualizamos el stock de producto
    $sql = "Update productos SET stock = :stock, fyh_actualizacion = :fyh_actualizacion WHERE id_producto = :id_producto";
    $query = $pdo->prepare($sql);
    $query->bindParam('stock', $nuevo_stock);
    $query->bindParam('fyh_actualizacion', $fechaHora);
    $query->bindParam('id_producto', $id_producto);
    $query->execute();

    //borramos el carrito
    $sql = "DELETE FROM carrito WHERE id_carrito = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam('id', $carrito['id_carrito']);
    $query->execute();
}

//luego se borra la venta
$sql = "DELETE FROM ventas WHERE id_venta = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id_venta);

if($query->execute()){

    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Venta eliminada exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/ventas');
}
else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/ventas/delete.php?id_venta='.$id_venta);
}


