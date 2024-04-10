<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty($_POST['nombre']) and !empty($_POST['telefono']) and !empty($_POST['email']) and !empty($_POST['direccion'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    
    $contador = 0;
    //consulta en la base de datos para verificar si ya existe el email
    $sql = "SELECT * FROM proveedores WHERE email = '$email'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $proveedores = $query->fetchAll();
    foreach($proveedores as $proveedor){
        $contador = $contador + 1;
    }
    
    if($contador > 0){
        session_start();
        $_SESSION['mensaje'] = "Ya existe un proveedor con el email ".$email;
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/proveedores/create.php');
    }
    else{        
            $sql = "INSERT INTO proveedores (nombre, telefono, email, direccion, fyh_creacion)
            VALUES (:nombre, :telefono, :email, :direccion, :fyh_creacion)";
            $query = $pdo->prepare($sql);
            $query->bindParam('nombre', $nombre);
            $query->bindParam('telefono', $telefono);
            $query->bindParam('email', $email);
            $query->bindParam('direccion', $direccion);
            $query->bindParam('fyh_creacion', $fechaHora);
            
            if($query->execute()){
                session_start();
                $_SESSION['mensaje'] = "Proveedor registrado exitosamente";
                $_SESSION['icono'] = "success";
                header('Location: '.$URL.'/admin/proveedores');
            }
            else{
                session_start();
                $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
                $_SESSION['icono'] = "error";
                header('Location: '.$URL.'/admin/proveedores/create.php');
            }
        
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/proveedores/create.php');
}


?>