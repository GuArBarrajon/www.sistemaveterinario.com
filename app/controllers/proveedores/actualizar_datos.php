<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty($_POST['nombre']) and !empty($_POST['telefono']) and !empty($_POST['email']) and !empty($_POST['direccion'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $id_proveedor = $_POST['id_proveedor'];

    $sql = "Update proveedores SET nombre = :nombre, telefono = :telefono, email = :email,
    direccion = :direccion, fyh_actualizacion = :fyh_actualizacion WHERE id_proveedor = :id_proveedor";
    $query = $pdo->prepare($sql);
    $query->bindParam('nombre', $nombre);
    $query->bindParam('telefono', $telefono);
    $query->bindParam('email', $email);
    $query->bindParam('direccion', $direccion);
    $query->bindParam('fyh_actualizacion', $fechaHora);
    $query->bindParam('id_proveedor', $id_proveedor);
        
    if($query->execute()){
        session_start();
        $_SESSION['mensaje'] = "Proveedor actualizado exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/admin/proveedores');
    }
    else{
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/proveedores/update.php?id_proveedor='.$id_proveedor);
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/proveedores/update.php?id_proveedor='.$id_proveedor);
}

?>