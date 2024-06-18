<?php
include("../../config.php");

//verificamos que todos los campos hayan sido completados 
if(!empty($_POST['nombres']) and !empty($_POST['apellido']) and !empty($_POST['email']) and !empty($_POST['celular']) and !empty($_POST['calle']) and !empty($_POST['altura']) and !empty($_POST['localidad']) and !empty($_POST['password']) and !empty($_POST['verificar']) and !empty($_POST['cargo'])){
    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $calle = $_POST['calle'];
    $altura = $_POST['altura'];
    $localidad = $_POST['localidad'];
    $contraseña = $_POST['password'];
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
        
            $sql = "INSERT INTO usuarios (nombres, apellido, email, celular, calle, altura, localidad, password, cargo, fyh_creacion)
            VALUES (:nombres, :apellido, :email, :celular, :calle, :altura, :localidad, :password, :cargo, :fyh_creacion)";
            $query = $pdo->prepare($sql);
            $query->bindParam('nombres', $nombres);
            $query->bindParam('apellido', $apellido);
            $query->bindParam('email', $email);
            $query->bindParam('celular', $celular);
            $query->bindParam('calle', $calle);
            $query->bindParam('altura', $altura);
            $query->bindParam('localidad', $localidad);
            $query->bindParam('password', $password);
            $query->bindParam('cargo', $cargo);
            $query->bindParam('fyh_creacion', $fechaHora);
            
            if($query->execute()){

            //después se manda el email de bienvenida
            $para      = $email;
            $asunto    = 'Bienvenido/a al sistema del centro veterinario';
            $link      = 'Por favor, visite la página <a href="http://localhost/www.sistemaveterinario.com/login">Ingresar al sistema</a>'; 
            $body   = <<<HTML
                        <h1>Mensaje de Bienvenida</h1>
                        <p>Hola, este es un correo generado para darle la bienvenida a nuestro sistema. Usted ha sido registrado por nuestro personal.</p> 
                        <p>Estando registrado podrá realizar compras y solicitar los turnos para el cuidado de sus mascotas.</p>
                        <p>$link</p>
                        <p>Su usuario es su correo electrónico $email</p>
                        <p>Su contraseña es $contraseña. Por favor, cámbiela una vez haya ingresado.</p>
                        HTML;
            $cabeceras = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf8'. "\r\n" .
            'From: veterinariacudi@outlook.com' . "\r\n" .
            'Reply-To: veterinariacudi@outlook.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            mail($para, $asunto, $body, $cabeceras);

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