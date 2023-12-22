<?php

//consulta a la base de datos
$sql = "SELECT * FROM usuarios";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll();

?>