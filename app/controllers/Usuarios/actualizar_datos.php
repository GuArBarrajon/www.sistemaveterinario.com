<?php
include("../../config.php");

$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$calle = $_POST['calle'];
$altura = $_POST['altura'];
$localidad = $_POST['localidad'];
$password = $_POST['password'];
$verifPassword = $_POST['verificar'];
$cargo = $_POST['cargo'];
$id_usuario = $_POST['id_usuario'];

//si no se cambia la contraseña
if($password == ""){
    $sql = "Update usuarios SET nombres = :nombres, apellido = :apellido, celular = :celular, calle = :calle, altura = :altura,
    localidad = :localidad, cargo = :cargo, fyh_actualizacion = :fyh_actualizacion WHERE id_usuario = :id_usuario";
    $query = $pdo->prepare($sql);
    $query->bindParam('nombres', $nombres);
    $query->bindParam('apellido', $apellido);
    $query->bindParam('celular', $celular);
    $query->bindParam('calle', $calle);
    $query->bindParam('altura', $altura);
    $query->bindParam('localidad', $localidad);
    $query->bindParam('cargo', $cargo);
    $query->bindParam('fyh_actualizacion', $fechaHora);
    $query->bindParam('id_usuario', $id_usuario);
        
    if($query->execute()){
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/admin/usuarios');
    }
    else{
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/usuarios/update.php?id_usuario='.$id_usuario);
    }
}
else{
    //si se cambia la contraseña
    if($password == $verifPassword){

        //encripta la contraseña
        $password = password_hash($password, algo: PASSWORD_DEFAULT);

        $sql = "Update usuarios SET nombres = :nombres, apellido = :apellido, password = :password, celular = :celular, calle = :calle, altura = :altura,
        localidad = :localidad, cargo = :cargo, fyh_actualizacion = :fyh_actualizacion WHERE id_usuario = :id_usuario";
        $query = $pdo->prepare($sql);
        $query->bindParam('nombres', $nombres);
        $query->bindParam('apellido', $apellido);
        $query->bindParam('password', $password);
        $query->bindParam('celular', $celular);
        $query->bindParam('calle', $calle);
        $query->bindParam('altura', $altura);
        $query->bindParam('localidad', $localidad);
        $query->bindParam('cargo', $cargo);
        $query->bindParam('fyh_actualizacion', $fechaHora);
        $query->bindParam('id_usuario', $id_usuario);
            
        if($query->execute()){
            session_start();
            $_SESSION['mensaje'] = "Usuario actualizado exitosamente";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/admin/usuarios');
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/admin/usuarios/update.php?id_usuario='.$id_usuario);
        }
    }
    else{
        session_start();
        $_SESSION['mensaje'] = "Error: las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/usuarios/update.php?id_usuario='.$id_usuario);
    }
}

?>