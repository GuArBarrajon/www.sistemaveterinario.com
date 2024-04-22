<?php
include("../../config.php");

$id_venta = $_GET['id_venta'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];

$sql = "INSERT INTO carrito (id_venta, id_producto, cantidad, fyh_creacion)
VALUES (:id_venta, :id_producto, :cantidad, :fyh_creacion)";
$query = $pdo->prepare($sql);
$query->bindParam('id_venta', $id_venta);
$query->bindParam('id_producto', $id_producto);
$query->bindParam('cantidad', $cantidad);
$query->bindParam('fyh_creacion', $fechaHora);

if($query->execute()){
    ?>
    <script>
        location.href = "<?php echo $URL.'admin/ventas/create.php'; ?>"
    </script>
    <?php
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL.'admin/ventas/create.php'; ?>"
    </script>
    <?php
}
