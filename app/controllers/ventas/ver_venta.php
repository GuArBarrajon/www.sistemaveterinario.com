<?php

//consulta a la base de datos
$sql = "SELECT * FROM ventas as comp WHERE id_venta = '$id_venta'";
$query = $pdo->prepare($sql);
$query->execute();
$venta = $query->fetch();


?>