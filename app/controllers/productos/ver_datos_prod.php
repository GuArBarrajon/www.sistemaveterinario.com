<?php

//consulta a la base de datos
$sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
$query = $pdo->prepare($sql);
$query->execute();
$producto = $query->fetch();

$codigo = $producto['codigo'];
$nombre = $producto['nombre'];
$descripcion = $producto['descripcion'];
$imagen = $producto['imagen'];
$stock = $producto['stock'];
$stockMin = $producto['stock_minimo'];
$stockMax = $producto['stock_maximo'];
$costo = $producto['costo'];
$precio = $producto['precio'];
$fechaIngreso = $producto['fecha_ingreso'];
$idUsuario = $producto['id_usuario'];
$fCreacion =$producto['fyh_creacion'];
$fActualizacion =$producto['fyh_actualizacion'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = '$idUsuario'";
$query = $pdo->prepare($sql);
$query->execute();
$usuario = $query->fetch();

$nombreUsuario = $usuario['nombres']." ".$usuario['apellido'];

?>