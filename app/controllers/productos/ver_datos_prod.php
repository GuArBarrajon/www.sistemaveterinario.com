<?php

//consulta a la base de datos
$sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll();

foreach($productos as $producto){
    $nombres = $usuario['nombres'];
    $apellido = $usuario['apellido'];
    $email = $usuario['email'];
    $contraseña = $usuario['password'];
    $cargo= $usuario['cargo'];
    $fCreacion =$usuario['fyh_creacion'];
    $fActualizacion =$usuario['fyh_actualizacion'];
}

?>