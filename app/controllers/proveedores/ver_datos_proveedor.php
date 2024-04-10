<?php

//consulta a la base de datos
$sql = "SELECT * FROM proveedores WHERE id_proveedor = '$id_proveedor'";
$query = $pdo->prepare($sql);
$query->execute();
$proveedores = $query->fetchAll();

foreach($proveedores as $proveedor){
    $nombre = $proveedor['nombre'];
    $telefono = $proveedor['telefono'];
    $email = $proveedor['email'];
    $direccion = $proveedor['direccion'];
    $fCreacion =$proveedor['fyh_creacion'];
    $fActualizacion =$proveedor['fyh_actualizacion'];
}

?>