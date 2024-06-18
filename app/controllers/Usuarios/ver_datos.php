<?php

//consulta a la base de datos
$sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll();

foreach($usuarios as $usuario){
    $nombres = $usuario['nombres'];
    $apellido = $usuario['apellido'];
    $email = $usuario['email'];
    $celular = $usuario['celular'];
    $calle = $usuario['calle'];
    $altura = $usuario['altura'];
    $localidad = $usuario['localidad'];

    $contraseña = $usuario['password'];
    $cargo= $usuario['cargo'];
    $fCreacion =$usuario['fyh_creacion'];
    $fActualizacion =$usuario['fyh_actualizacion'];
}

?>