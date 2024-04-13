<?php

//consulta a la base de datos
$sql = "SELECT * FROM compras as comp WHERE id_compra = '$id_compra'";
$query = $pdo->prepare($sql);
$query->execute();
$compra = $query->fetch();


?>