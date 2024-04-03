<?php
include("../../config.php");

$servicio = $_POST['servicio'];
switch ($servicio){
    case "Peluqueria": $color = '#5DADE2'; break;
    case "Laboratorio": $color = '#EDBB99'; break;
    case "Estudios": $color = '#76D7C4'; break;
    case "Consulta": $color = '#D68910'; break;
    case "Vacunatorio": $color = '#9B59B6 '; break;
}

$sql = "INSERT INTO reservas (id_usuario, nombre_mascota, tipo_servicio, fecha, hora, title, start, end, color, fyh_creacion, fyh_actualizacion) 
VALUES (:id_usuario, :nombre_mascota, :tipo_servicio, :fecha, :hora, :title, :start, :end, :color, :fyh_creacion, :fyh_actualizacion)";
$query = $pdo->prepare($sql);
$query->bindParam('id_usuario', $_POST['idUsuario']);
$query->bindParam('nombre_mascota', $_POST['nombreMascota']);
$query->bindParam('tipo_servicio', $servicio);
$query->bindParam('fecha', $_POST['fechaReserva']);
$query->bindParam('hora', $_POST['horaReserva']);
$query->bindParam('title', $_POST['servicio']);
$query->bindParam('start', $_POST['fechaReserva']);
$query->bindParam('end', $_POST['fechaReserva']);
$query->bindParam('color', $color);
$query->bindParam('fyh_creacion', $fechaHora);
$query->bindParam('fyh_actualizacion', $fechaHora);
            
if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se ha registrado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'reservar.php');
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'reservar.php');
}

?>