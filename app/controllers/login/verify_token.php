<?php

$token_usuario = $_GET['token'];
$token_h = hash("sha256", $token_usuario); //se reencripta el token

//Primero se busca el registro
$sql = "SELECT * FROM usuarios WHERE token = '$token_h'";
$query = $pdo->prepare($sql);
$query->execute();
$usuario = $query->fetch();


if(empty($usuario['token'])){?>
    <script>window.location.replace("http://localhost/www.sistemaveterinario.com/login/index.php?message=not_found");</script><?php 
}
else{
    //Segundo: verifica que no haya vencido el token
    if (strtotime($usuario['vencimiento_token']) <= time()){?>
        <script>window.location.replace("http://localhost/www.sistemaveterinario.com/login/index.php?message=expired")</script><?php
    }
}