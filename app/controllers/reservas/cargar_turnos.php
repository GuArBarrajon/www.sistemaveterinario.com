<?php
include("../../config.php");

$sql= "SELECT title, start, end, color FROM reservas";
$query= $pdo->prepare($sql);
$query->execute();

$resultado = $query->fetchAll();

echo json_encode($resultado);