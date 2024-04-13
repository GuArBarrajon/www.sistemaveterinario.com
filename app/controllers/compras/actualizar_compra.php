<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados
if(empty( $_POST['comprobante']) or empty($_POST['cantidad']) or empty($_POST['precio']) or empty($_POST['fechaCompra'])){
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/compras/create.php');
}
else{
    //creamos el nuevo registro de compra
    $pdo->beginTransaction();
    $sql = "Update compras SET id_proveedor = :id_proveedor, fecha_compra = :fecha_compra, comprobante = :comprobante,
    precio_compra = :precio_compra, cantidad = :cantidad, fyh_actualizacion = :fyh_actualizacion WHERE id_compra = :id_compra";
        $query = $pdo->prepare($sql);
        $query->bindParam('id_proveedor', $_POST['id_proveedor']);
        $query->bindParam('fecha_compra', $_POST['fechaCompra']);
        $query->bindParam('comprobante', $_POST['comprobante']);
        $query->bindParam('precio_compra', $_POST['precio']);
        $query->bindParam('cantidad', $_POST['cantidad']);
        $query->bindParam('fyh_actualizacion', $fechaHora);
        $query->bindParam('id_compra', $_POST['id_compra']);

        if($query->execute()){
            //ahora se actualiza la tabla productos
            $stockAnterior = $_POST['stock'];
            $cantidadAnterior = $_POST['cantidadAnterior'];
            $cantidad = $_POST['cantidad'];
            $stock = $stockAnterior + ($cantidad - $cantidadAnterior);
            $costo = $_POST['precio'];
            $precio = $costo +($costo * 0.3);
            $id_prod = $_POST['id_producto'];


            $sql = "Update productos SET stock = :stock, costo = :costo, precio = :precio, fyh_actualizacion = :fyh_actualizacion WHERE id_producto = :id_producto";
            $query = $pdo->prepare($sql);
            $query->bindParam('stock', $stock);
            $query->bindParam('costo', $costo);
            $query->bindParam('precio', $precio);
            $query->bindParam('fyh_actualizacion', $fechaHora);
            $query->bindParam('id_producto', $id_prod);
                
            if($query->execute()){
                $pdo->commit();
                session_start();
                $_SESSION['mensaje'] = "Compra guardada exitosamente";
                $_SESSION['icono'] = "success";
                header('Location: '.$URL.'/admin/compras');
            }
            else{
                $pdo->rollBack();
                session_start();
                $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
                $_SESSION['icono'] = "error";
                header('Location: '.$URL.'/admin/compras/create.php?id_compra='.$_POST['id_compra']);
            }
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/admin/compras/create.php?id_compra='.$_POST['id_compra']);
        }
}

?>