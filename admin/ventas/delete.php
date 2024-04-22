<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_venta = $_GET['id_venta'];
include("../../app/controllers/ventas/ver_venta.php");


?>

<div class="container-fluid pt-4">
    <form action="<?php echo $URL;?>app/controllers/ventas/borrar_venta.php" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                    <div class="card-header">
                        <h3>Está seguro de eliminar esta entrada?</h3>
                    </div>    
                    <div class="card-body">
                        <!-- Datos de Venta -->
                        <div class="row pb-3 px-2">
                            <div class="col-md-2">
                                <label for="">Nro. Venta</label>
                                <input type="text" class="form-control" value="<?= $venta['id_venta'] ?>" disabled>
                                <input type="text" class="form-control" name="id_venta" value="<?= $venta['id_venta'] ?>" hidden>
                            </div>
                            <div class="col-md-2">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" name="fecha" value="<?= $venta['fecha']  ?>" disabled>
                            </div>
                        </div>
                            <div class="row">
                                <div style="display: flex">
                                    <h3>Datos del Producto </h3>
                                </div>
                                <!-- Formulario productos --> 
                                <div class="row pt-3  col-md-12" style="font-size: 16px">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover table-striped">
                                            <thead style="background: #8064A2; color: white">
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Producto</th>
                                                    <th>Descripción</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $contadorVentas = $venta['id_venta'];
                                                include("../../app/controllers/ventas/listar_carrito.php");
                                                $contadorCarrito = 0;
                                                $total = 0;
                                                foreach($carritos as $carrito){
                                                    $contadorCarrito = $contadorCarrito + 1; 
                                                    $id_producto = $carrito['id_producto'];
                                                    include("../../app/controllers/productos/ver_datos_prod.php");

                                                    echo '<tr>';
                                                    echo '<td>'.$contadorCarrito.'</td>';
                                                    echo '<td>'.$producto['nombre'].'</td>';
                                                    echo '<td>'.$producto['descripcion'].'</td>';
                                                    echo '<td>'.$carrito['cantidad'].'</td>';
                                                    echo '<td>'.$producto['precio'].'</td>';
                                                    $subto = $carrito['cantidad'] * $producto['precio'];
                                                    echo '<td>'.$subto.'</td>';
                                                    echo '</tr>';
                                                    $total = $total + $subto;
                                                }
                                                ?>

                                                <tr style="background: #8064A2; color: white;">
                                                    <th colspan="5" style="text-align: right">TOTAL</th>
                                                    <th><?= $total ?></th>
                                                    <input type="text" name="total" value="<?= $total ?>" hidden>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                                <div class="px-3" style="display: flex">
                                    <h3>Datos del Cliente </h3>
                                </div>
                                <!-- Formulario cliente -->
                                <?php 
                                    $id_usuario = $venta['id_cliente'];
                                    include("../../app/controllers/Usuarios/ver_datos.php");
                                ?>
                                    <div class="card-body col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?= $nombres.' '.$apellido ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="email">Correo</label>
                                                        <input type="text" class="form-control" name="email" value="<?= $email ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-4 pl-5">
                                                    <a href="<?= $URL.'admin/ventas' ?>" class="btn btn-primary">Volver a la Lista</a>
                                                    <input type="submit" class="btn btn-danger m-1" value="Borrar">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include("../layout/parte2.php");    
include("../layout/mensaje.php");
?>