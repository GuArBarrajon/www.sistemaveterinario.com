<?php

//consulta a la base de datos
$sql = "SELECT * FROM productos";
$query = $pdo->prepare($sql);
$query->execute();
$productos = $query->fetchAll();

?>