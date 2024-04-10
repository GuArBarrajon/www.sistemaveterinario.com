<?php

//consulta a la base de datos
$sql = "SELECT * FROM usuarios WHERE cargo = 'cliente'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll();

?>