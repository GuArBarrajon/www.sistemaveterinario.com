<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty( $_POST['nombre']) and !empty($_POST['stock']) and !empty($_POST['stockMin']) and !empty($_POST['stockMax']) and !empty($_POST['costo']) and !empty($_POST['precio']) and !empty($_POST['fechaIngreso'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    //$nombreArchivo = $_POST['imagen'];
    $stock = $_POST['stock'];
    $stockMin = $_POST['stockMin'];
    $stockMax = $_POST['stockMax'];
    $costo = $_POST['costo'];
    $precio = $_POST['precio'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $id_prod= $_POST['id_producto'];

    //si se cambia la imagen
    if($_FILES['file']['name'] != null){
        $nombreArchivo = date(format:'Y-m-d-H-i-s').$_FILES['file']['name']; //se concatena con la fecha y hora por si hay imágenes con el mismo nombre
        $location = "../../../Images/productos/".$nombreArchivo;
        move_uploaded_file($_FILES['file']['tmp_name'], $location);
    }
    else{
        $nombreArchivo = $_POST['imagen'];
    }

    $sql = "Update productos SET nombre = :nombre, descripcion = :descripcion, imagen = :imagen, stock = :stock, 
    stock_minimo = :stock_minimo, stock_maximo = :stock_maximo, costo = :costo, precio = :precio, 
    fecha_ingreso = :fecha_ingreso, fyh_creacion = :fyh_creacion WHERE id_producto = :id_producto";
    $query = $pdo->prepare($sql);
    $query->bindParam('nombre', $nombre);
    $query->bindParam('descripcion', $descripcion);
    $query->bindParam('imagen', $nombreArchivo);
    $query->bindParam('stock', $stock);
    $query->bindParam('stock_minimo', $stockMin);
    $query->bindParam('stock_maximo', $stockMax);
    $query->bindParam('costo', $costo);
    $query->bindParam('precio', $precio);
    $query->bindParam('fecha_ingreso', $fechaIngreso);
    $query->bindParam('fyh_creacion', $fechaHora);
    $query->bindParam('id_producto', $id_prod);
        
    if($query->execute()){
        session_start();
        $_SESSION['mensaje'] = "Producto actualizado exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/admin/productos');
    }
    else{
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/productos/update.php?id_producto='.$id_prod);
    }

}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos requeridos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/productos/update.php');
}

?>