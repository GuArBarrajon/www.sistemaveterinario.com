<?php
include("../../config.php");

$fecha = $_GET['fecha'];
$hora_turno;

$query = $pdo->prepare("SELECT * FROM reservas WHERE fecha = :fecha");
$query->bindParam('fecha', $fecha);
$query->execute();

$datos = $query->fetchAll();
foreach($datos as $dato){
    $hora_turno = $dato['hora'];
    
    $horario = ['8.00', '8.30', '9.00', '9.30', '10.00', '10.30', '11.00', '11.30', '12.00', '12.30', '13.00', '13.30',
    '14.00', '14.30', '15.00', '15.30', '16.00', '16.30', '17.00', '17.30', '18.00', '18.30', '19.00', '19.30'];
    for($i = 0; $i < 24; $i++){
        if($horario[$i] == $hora_turno){
            $num = $i + 1;
            $hora_respuesta = "#btn_h".$num;
            echo "<script> $('$hora_respuesta').attr('disabled', true); $('$hora_respuesta').css('color', 'red'); $('$hora_respuesta').css('font-weight', '700') </script>";
        }
    }
}