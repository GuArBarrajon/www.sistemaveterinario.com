<?php
include ('../../config.php'); 
$id = $_POST['id_usuario'];

$pass = $_POST['password'];
$pass2 = $_POST['password2'];

if($pass == $pass2){
    //encripta la contraseña
    $pass = password_hash($pass, algo: PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET password = '$pass', fyh_actualizacion = '$fechaHora', token = NULL, vencimiento_Token = NULL WHERE id_usuario = $id";
    $query = $pdo->prepare($sql);
    $query->execute();


    session_start();
    $_SESSION['mensaje'] = "La contraseña fue cambiada exitósamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL);
}
else{
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas ingresadas no son iguales";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'login/cambiarContra.php');
}