<?php
include("../../config.php");

$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$verifPassword = $_POST['verificar'];
$cargo = $_POST['cargo'];
$fecha = "2023/11/05";

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
    $query->bindParam('fyh_creacion', $fecha);
    $query->execute();
}
else{
    echo '<script>alert("Las contraseñas no son iguales"); window.location="../../../admin/usuarios/create.php";</script>';
}
?>