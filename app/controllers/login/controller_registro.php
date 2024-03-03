<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty($_POST['nombres']) and !empty($_POST['apellido']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['password2'])){
    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $cargo = "cliente";
    
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
        header('Location: '.$URL.'/login/registro.php');
    }
    else{
        if($password == $password2){
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

                //Se crea y se loguea automáticamente
                $email = $_POST['email'];
                $contraseña = $_POST['password'];

                //consulta a la base de datos por email ingresado
                $sql = "SELECT * FROM usuarios WHERE email = '$email'";
                $query = $pdo->prepare($sql);
                $query->execute();
                $usuarios = $query->fetchAll();

                //se recupara la contraseña de la base de datos para ese email
                $contador = 0;
                foreach($usuarios as $usuario){
                    $contador = $contador + 1;
                    $password_tabla = $usuario['password'];
                }

                /*Verifica si la contraseña ingresada es igual a la encriptada en la base de datos*/
                if ($contador > 0 && password_verify($contraseña, $password_tabla)){
                    session_start();
                    $_SESSION['session email'] = $email;
                    header('Location: '.$URL);
                }
                else{
                    echo '<script>alert("Los datos no son correctos"); window.location="../../../login";</script>';
                }
            }
            else{
                session_start();
                $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
                $_SESSION['icono'] = "error";
                header('Location: '.$URL.'/login/registro.php');
            }
        
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "Error: las contraseñas no son iguales";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/login/registro.php');
        }
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/login/registro.php');
}


?>