<?php

//consulta a la base de datos
$sql = "SELECT * FROM historias_clinicas WHERE id_historia = '$id_historia'";
$query = $pdo->prepare($sql);
$query->execute();
$historia = $query->fetch();

$fecha = $historia['fecha_consulta'];
$descripcion = $historia['descripcion'];
$tratamiento = $historia['tratamiento'];
$idMascota = $historia['id_mascota'];

?>