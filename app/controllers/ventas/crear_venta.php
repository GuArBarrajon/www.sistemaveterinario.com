<?php
include("../../config.php");

$cargo = $_GET['cargo'];

//verificamos que todos los campos hayan sido completados
if(empty($_POST['total'])){
    session_start();
    $_SESSION['mensaje'] = "Seleccione un producto";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/ventas/create.php');
}
else if(empty($_POST['id_cliente'])){
    session_start();
    $_SESSION['mensaje'] = "Seleccione un cliente";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/ventas/create.php');
}
else{
    //creamos el nuevo registro de compra
    $sql = "INSERT INTO ventas (id_cliente, total, fecha, fyh_creacion) VALUES (:id_cliente, :total, :fecha, :fyh_creacion)";
        $query = $pdo->prepare($sql);
        $query->bindParam('id_cliente', $_POST['id_cliente']);
        $query->bindParam('total', $_POST['total']);
        $query->bindParam('fecha', $_POST['fechaVenta']);
        $query->bindParam('fyh_creacion', $fechaHora);

        if($query->execute()){
            //ahora se actualiza la tabla productos 
            $contadorVentas = $_POST['numVenta'];
            include("listar_carrito.php");
            foreach($carritos as $carrito){
                $id_producto = $carrito['id_producto'];
                include("../productos/ver_datos_prod.php");
                $nuevo_stock = $stock - $carrito['cantidad'];

                $sql = "Update productos SET stock = :stock, fyh_actualizacion = :fyh_actualizacion WHERE id_producto = :id_producto";
                $query = $pdo->prepare($sql);
                $query->bindParam('stock', $nuevo_stock);
                $query->bindParam('fyh_actualizacion', $fechaHora);
                $query->bindParam('id_producto', $id_producto);

                if($query->execute()){

                }
                else{
                    session_start();
                    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
                    $_SESSION['icono'] = "error";
                    header('Location: '.$URL.'/admin/ventas/create.php');
                }
            }
            session_start();
            $_SESSION['mensaje'] = "Operación efectuada exitosamente";
            $_SESSION['icono'] = "success";
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
}