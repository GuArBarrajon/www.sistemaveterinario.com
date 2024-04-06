<?php
include ('../../config.php');

//verificamos que todos los campos hayan sido completados
if(!empty($_POST['email']) and !empty($_POST['password'])){
    //datos que llegan del formulario
    $email = $_POST['email'];
    $contraseña = $_POST['password'];

    //consulta a la base de datos por email ingresado
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuario = $query->fetch();

    //verifica si hay un usuario registrado con ese email
    if (empty($usuario['email'])){
        session_start();
        $_SESSION['mensaje'] = "No existe un usuario registrado con ese email";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'login');
    }
    else{
        //se recupara la contraseña de la base de datos para ese email
        $password_tabla = $usuario['password'];
        $cargo_tabla = $usuario['cargo'];

        /*Verifica si la contraseña ingresada es igual a la encriptada en la base de datos*/
        if (password_verify($contraseña, $password_tabla)){
            session_start();
            $_SESSION['session email'] = $email;

            $_SESSION['mensaje'] = 'Bienvenido/a'.' '.$usuario['nombres'];
            $_SESSION['icono'] = "success";
            //redirige según sea administrador o cliente
            if($cargo_tabla == "administrador"){
                header('Location: '.$URL.'/admin');
            }
            else{
                header('Location: '.$URL);
            }
        }
        else{
            session_start();
            $_SESSION['mensaje'] = "La contraseña no es correcta";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'login');
        }
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Complete todos los campos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'login');
}
?>