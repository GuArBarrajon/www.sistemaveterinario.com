<?php

//consulta a la base de datos
$sql = "SELECT *, prod.codigo as codigo, prod.nombre as pnombre, prod.descripcion as pdescripcion,
        prod.stock as pstock,prod.costo as pcosto ,prod.precio as pprecio, prod.stock_minimo as pstockmin,
        prod.stock_maximo as pstockmax, prod.fecha_ingreso as pfecha, prod.imagen as pimagen, prov.nombre as provnombre FROM compras as co 
        INNER JOIN productos as prod ON co.id_producto = prod.id_producto INNER JOIN proveedores as prov ON co.id_proveedor = prov.id_proveedor";
$query = $pdo->prepare($sql);
$query->execute();
$compras = $query->fetchAll();

?>