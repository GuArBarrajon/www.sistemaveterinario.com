<?php

//consulta a la base de datos
$sql = "SELECT * FROM carrito WHERE id_venta = '$contadorVentas'";
$query = $pdo->prepare($sql);
$query->execute();
$carritos = $query->fetchAll();

?>