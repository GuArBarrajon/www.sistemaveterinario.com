<?php

//consulta a la base de datos
$sql = "SELECT * FROM mascotas WHERE id_usuario = '$id_usuario'";
$query = $pdo->prepare($sql);
$query->execute();
$mascotas = $query->fetchAll();

?>