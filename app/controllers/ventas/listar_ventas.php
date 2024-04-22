<?php
$sql = "SELECT * FROM ventas";
$query = $pdo->prepare($sql);
$query->execute();
$ventas = $query->fetchAll();

?>