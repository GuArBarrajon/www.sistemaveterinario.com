<?php
include ('../../config.php'); 
$emailRecuperar = $_POST['email'];

//Primero se busca el registro del usuario
$sql = "SELECT * FROM usuarios WHERE email = '$emailRecuperar'";
$query = $pdo->prepare($sql);
$resp = $query->execute();
$usuario = $query->fetch();

$id = $usuario['id_usuario'];
//si existe el usuario
if(!empty($id)){
    try{
        //luego se crea el token y se inserta en el registro del usuario
        $token = bin2hex(random_bytes(16)); //se crea un token aleatorio
        $token_h = hash("sha256", $token); //se encripta el token
        $vencimiento = date("Y-m-d H:i:s", time() + 60 * 30); //se crea un ventimiento a los 30 minutos
        //se guarda el token y el vencimiento en el registro del usuario
        $sql = "UPDATE usuarios SET token = '$token_h', vencimiento_token = '$vencimiento' WHERE id_usuario = $id";
        $query = $pdo->prepare($sql);
        $query->execute();

        //después se manda el email de recuparación
        $para      = $emailRecuperar;
        $asunto    = 'Recuperar password del centro veterinario';
        $link      = 'Por favor, visite la página de <a href="http://localhost/www.sistemaveterinario.com/login/cambiarPassword.php?token='.$token.'">Recuperación de contraseña</a>'; 
        $body   = <<<HTML
                    <h1>Mensaje de recuperación de contraseña</h1>
                    <p>Hola, este es un correo generado para solicitar la recuperación de su contraseña.</p> 
                    <p>$link</p>
                    <p>El link es válido por 30 minutos. Pasado ese tiempo, vuelva a gestionar la recuperación de contraseña.</p>
                    HTML;
        $cabeceras = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf8'. "\r\n" .
            'From: veterinariacudi@outlook.com' . "\r\n" .
            'Reply-To: veterinariacudi@outlook.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($para, $asunto, $body, $cabeceras);
        
        session_start();
        $_SESSION['mensaje'] = "Por favor, revise su correo";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'login');
    }
    catch(Exception $e){
        session_start();
        $_SESSION['mensaje'] = "Algo salió mal, intente de nuevo";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'login');
    }

}
else{
    session_start();
    $_SESSION['mensaje'] = "No existe un usuario registrado con ese email";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'login');
}