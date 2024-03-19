<?php
include("../../config.php");

$id = $_GET['id_turno'];

$sql = "DELETE FROM reservas WHERE id_reserva = :id";
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
if($query->execute()){
    session_start();
    $_SESSION['mensaje'] = "Turno borrado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/admin/turnos');
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/admin/turnos/delete.php?id_turno='.$id);
}
?>