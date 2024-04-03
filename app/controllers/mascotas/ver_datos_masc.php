<?php

//consulta a la base de datos
$sql = "SELECT * FROM mascotas WHERE id_mascota = '$id_mascota'";
$query = $pdo->prepare($sql);
$query->execute();
$mascota = $query->fetch();

$nombre = $mascota['nombre'];
$especie = $mascota['especie'];
$raza = $mascota['raza'];
$fechaNac = $mascota['fecha_nac'];
$idUsuario = $mascota['id_usuario'];

?>