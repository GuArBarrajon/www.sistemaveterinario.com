<?php

//consulta a la base de datos
$sql = "SELECT * FROM reservas WHERE id_reserva = '$id_turno'";
$query = $pdo->prepare($sql);
$query->execute();
$turno = $query->fetch();

$idTurno = $turno['id_reserva'];
$idUsuario = $turno['id_usuario'];
$mascota = $turno['nombre_mascota'];
$servicio = $turno['tipo_servicio'];
$fecha= $turno['fecha'];
$hora= $turno['hora'];
$fCreacion =$turno['fyh_creacion'];
$fActualizacion =$turno['fyh_actualizacion'];



?>