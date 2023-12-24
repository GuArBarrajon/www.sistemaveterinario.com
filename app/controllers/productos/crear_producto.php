<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty( $_POST['nombre']) and !empty($_POST['stock']) and !empty($_POST['stockMin']) and !empty($_POST['stockMax']) and !empty($_POST['costo']) and !empty($_POST['precio']) and !empty($_POST['fechaIngreso'])){
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $stockMin = $_POST['stockMin'];
    $stockMax = $_POST['stockMax'];
    $costo = $_POST['costo'];
    $precio = $_POST['precio'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $idUsuario = $_POST['idUsuario'];

    //para subir el archivo de la imagen al servidor
    $nombreArchivo = date(format:'Y-m-d-H-i-s').$_FILES['file']['name']; //se concatena con la fecha y hora por si hay imágenes con el mismo nombre
    $location = "../../../Images/productos/".$nombreArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    
    $contador = 0;
    //consulta en la base de datos para verificar si ya existe el código de producto
    $sql = "SELECT * FROM productos WHERE codigo = '$codigo'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $productos = $query->fetchAll();
    foreach($productos as $producto){
        $contador = $contador + 1;
    }
    
    if($contador > 0){
        session_start();
        $_SESSION['mensaje'] = "Ya existe un producto con el código ".$codigo;
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/productos/create.php');
    }
    else{
        $sql = "INSERT INTO productos (codigo, nombre, descripcion, imagen, stock, stock_minimo, stock_maximo, costo, precio, fecha_ingreso, fyh_creacion, id_usuario)
        VALUES (:codigo, :nombre, :descripcion, :imagen, :stock, :stock_minimo, :stock_maximo, :costo, :precio, :fecha_ingreso, :fyh_creacion, :id_usuario)";
        $query = $pdo->prepare($sql);
        $query->bindParam('codigo', $codigo);
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
        $query->bindParam('id_usuario', $idUsuario);
        
        if($query->execute()){
            session_start();
            $_SESSION['mensaje'] = "Producto guardado exitosamente";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/admin/productos');
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/admin/productos/create.php');
        }
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos requeridos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/productos/create.php');
}


?>