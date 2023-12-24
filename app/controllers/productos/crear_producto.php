<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty($_POST['nombres']) and !empty($_POST['apellido']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['verificar']) and !empty($_POST['cargo'])){
    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifPassword = $_POST['verificar'];
    $cargo = $_POST['cargo'];
    
    $contador = 0;
    //consulta en la base de datos para verificar si ya existe el email
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll();
    foreach($usuarios as $usuario){
        $contador = $contador + 1;
    }
    
    if($contador > 0){
        session_start();
        $_SESSION['mensaje'] = "Ya existe un usuario con el email ".$email;
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/usuarios/create.php');
    }
    else{
        if($password == $verifPassword){
            //encripta la contraseña
            $password = password_hash($password, algo: PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO usuarios (nombres, apellido, email, password, cargo, fyh_creacion)
            VALUES (:nombres, :apellido, :email, :password, :cargo, :fyh_creacion)";
            $query = $pdo->prepare($sql);
            $query->bindParam('nombres', $nombres);
            $query->bindParam('apellido', $apellido);
            $query->bindParam('email', $email);
            $query->bindParam('password', $password);
            $query->bindParam('cargo', $cargo);
            $query->bindParam('fyh_creacion', $fechaHora);
            
            if($query->execute()){
                session_start();
                $_SESSION['mensaje'] = "Usuario registrado exitosamente";
                $_SESSION['icono'] = "success";
                header('Location: '.$URL.'/admin/usuarios');
            }
            else{
                session_start();
                $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
                $_SESSION['icono'] = "error";
                header('Location: '.$URL.'/admin/usuarios/create.php');
            }
        
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "Error: las contraseñas no son iguales";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/admin/usuarios/create.php');
        }
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/usuarios/create.php');
}


?>