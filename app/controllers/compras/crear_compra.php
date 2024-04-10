<?php
include("../../config.php");


//verificamos que todos los campos hayan sido completados
if(empty($_POST['id_producto'])){
    session_start();
    $_SESSION['mensaje'] = "Seleccione un producto";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/compras/create.php');
}
else if(empty($_POST['id_proveedor'])){
    session_start();
    $_SESSION['mensaje'] = "Seleccione un proveedor";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/compras/create.php');
}
else if(empty( $_POST['comprobante']) or empty($_POST['cantidad']) or empty($_POST['precio'])){
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/compras/create.php');
}
else{
    //creamos el nuevo registro de compra
    $sql = "INSERT INTO compras (id_proveedor, id_producto, id_usuario, nro_compra, fecha_compra, comprobante, precio_compra, cantidad, fyh_creacion)
            VALUES (:id_proveedor, :id_producto, :id_usuario, :nro_compra, :fecha_compra, :comprobante, :precio_compra, :cantidad, :fyh_creacion)";
        $query = $pdo->prepare($sql);
        $query->bindParam('id_proveedor', $_POST['id_proveedor']);
        $query->bindParam('id_producto', $_POST['id_producto']);
        $query->bindParam('id_usuario', $_POST['id_usuario']);
        $query->bindParam('nro_compra', $_POST['numCompra']);
        $query->bindParam('fecha_compra', $_POST['fechaCompra']);
        $query->bindParam('comprobante', $_POST['comprobante']);
        $query->bindParam('precio_compra', $_POST['precio']);
        $query->bindParam('cantidad', $_POST['cantidad']);
        $query->bindParam('fyh_creacion', $fechaHora);

        if($query->execute()){
            //ahora se actualiza la tabla productos
            $stockAnterior = $_POST['stock'];
            $cantidad = $_POST['cantidad'];
            $stock = $stockAnterior + $cantidad;
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
                session_start();
                $_SESSION['mensaje'] = "Compra guardada exitosamente";
                $_SESSION['icono'] = "success";
                header('Location: '.$URL.'/admin/compras');
            }
            else{
                session_start();
                $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
                $_SESSION['icono'] = "error";
                header('Location: '.$URL.'/admin/compras/create.php');
            }
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/admin/compras/create.php');
        }
}

?>