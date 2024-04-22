<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_compra = $_GET['id_compra'];
include("../../app/controllers/compras/ver_compra.php");


?>

<div class="container-fluid pt-4">
    <h1>Compra Nº: <?= $compra['nro_compra'] ?></h1>
    <form action="<?php echo $URL;?>app/controllers/compras/borrar_compra.php" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                    <div class="card-header">
                        <h3 class="card-title"><b>Está seguro de eliminar esta entrada?</b></h3>
                    </div>    
                    <div class="card-body">
                            <div class="row">
                                <div style="display: flex">
                                    <h3>Datos del Producto </h3>
                                </div>
                                <?php 
                                    $id_producto = $compra['id_producto'];
                                    include("../../app/controllers/productos/ver_datos_prod.php");
                                ?>
                            <!-- Formulario productos -->
                            <div class="row" style="font-size: 12px">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" name="codigo" value="<?= $codigo ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="<?= $nombre ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adescripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion" value="<?= $descripcion ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" name="stock" value="<?= $stock ?>" style="background: #8064A2; color: white" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stockMin">Stock Mínimo</label>
                                        <input type="number" class="form-control" name="stockMin" value="<?= $stockMin ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stockMax">Stock Máximo</label>
                                        <input type="number" class="form-control" name="stockMax" value="<?= $stockMax ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="costo">Costo x Unidad</label>
                                        <input type="text" class="form-control" name="costo" value="<?= $costo ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="precio">Precio de Venta x Unidad</label>
                                        <input type="text" class="form-control" name="precio" value="<?= $precio ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fechaIngreso">Fecha de Ingreso</label>
                                        <input type="date" class="form-control" name="fechaIngreso" value="<?= $fechaIngreso ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php 
                                            $id_usuario = $idUsuario;
                                            include("../../app/controllers/Usuarios/ver_datos.php");
                                        ?>
                                        <label for="nomUsuario">Usuario</label>
                                        <input type="text" class="form-control" name="nomUsuario" value="<?= $usuario['nombres'].' '.$usuario['apellido'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <img src="<?php echo '../../Images/productos/'.$producto['imagen']; ?>" width="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr>
                        <!-- Datos de compra -->
                        <div class="row py-2 px-3">
                            <div class="col-md-2">
                                <label for="">Nro. Compra</label>
                                <input type="text" class="form-control" value="<?= $compra['nro_compra'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="">Fecha Compra</label>
                                <input type="date" class="form-control" name="fechaCompra" value="<?= $compra['fecha_compra']  ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="">Comprobante</label>
                                <input type="text" class="form-control" name="comprobante" value="<?= $compra['comprobante']  ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="">Precio Unitario</label>
                                <input type="text" class="form-control" name="precio" value="<?= $compra['precio_compra']  ?>" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" min="0" name="cantidad" value="<?= $compra['cantidad']  ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <?php 
                                    $id_usuario = $compra['id_usuario'];
                                    include("../../app/controllers/Usuarios/ver_datos.php");
                                ?>
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" value="<?= $nombres.' '.$apellido ?>" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                                <div class="px-3" style="display: flex">
                                    <h3>Datos del Proveedor </h3>
                                </div>
                                <!-- Formulario proveedor -->
                                <?php 
                                    $id_proveedor = $compra['id_proveedor'];
                                    include("../../app/controllers/proveedores/ver_datos_proveedor.php");
                                ?>
                                    <div class="card-body col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?= $nombre ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono" value="<?= $telefono?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="email">Correo</label>
                                                        <input type="text" class="form-control" name="email" value="<?= $email ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" value="<?= $direccion ?>" disabled>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="id_compra" value="<?= $id_compra ?>" hidden>
                                                <input type="text" class="form-control" name="id_producto" value="<?= $id_producto ?>" hidden>
                                                <input type="number" class="form-control" name="stock" value="<?= $stock ?>" hidden>
                                                <input type="number" class="form-control" min="0" name="cantidad" value="<?= $compra['cantidad']  ?>" hidden>
                                            </div>
                                    </div>
                                </div>
                                <!-- Botones -->
                                <div class="row">
                                    <div class="col-md-12 p-4">
                                        <a href="<?= $URL.'admin/compras' ?>" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-danger">Borrar</button>  
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