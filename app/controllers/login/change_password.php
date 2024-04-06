<?php
include ('../../config.php'); 
$id = $_POST['id_usuario'];
$token = $_POST['token_usuario'];

$pass = $_POST['password'];
$pass2 = $_POST['password2'];

if($pass == $pass2){
    //encripta la contraseña
    $pass = password_hash($pass, algo: PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET password = '$pass', fyh_actualizacion = '$fechaHora', token = NULL, vencimiento_Token = NULL WHERE id_usuario = $id";
    $query = $pdo->prepare($sql);
    $query->execute();


    session_start();
    $_SESSION['mensaje'] = "Inicie sesión con su nueva contraseña";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'login');
}
else{
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas ingresadas no son iguales";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'login/cambiarPassword.php?token='.$token);
}