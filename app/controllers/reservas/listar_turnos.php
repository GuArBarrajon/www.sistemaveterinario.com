<?php

//consulta a la base de datos
$sql = "SELECT *, usu.nombres as nombres, usu.apellido as apellido, usu.email as email FROM reservas as res INNER JOIN usuarios as usu ON res.id_usuario = usu.id_usuario";
$query = $pdo->prepare($sql);
$query->execute();
$turnos = $query->fetchAll();

?>