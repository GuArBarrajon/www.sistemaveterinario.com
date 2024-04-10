<?php

//consulta a la base de datos
$sql = "SELECT * FROM proveedores";
$query = $pdo->prepare($sql);
$query->execute();
$proveedores = $query->fetchAll();

?>