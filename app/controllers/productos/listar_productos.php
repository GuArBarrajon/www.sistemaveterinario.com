<?php

//consulta a la base de datos
$sql = "SELECT *, us.nombres as nombre_usuario, us.apellido as apellido_usuario 
        FROM productos as prod INNER JOIN usuarios as us ON prod.id_usuario = us.id_usuario";
$query = $pdo->prepare($sql);
$query->execute();
$productos = $query->fetchAll();

?>