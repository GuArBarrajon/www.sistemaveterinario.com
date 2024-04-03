<?php

//consulta a la base de datos
$sql = "SELECT * FROM historias_clinicas WHERE id_mascota = '$id_mascota'";
$query = $pdo->prepare($sql);
$query->execute();
$historias = $query->fetchAll();

?>