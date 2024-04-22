<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_producto = $_GET['id_producto'];
include("../../app/controllers/productos/ver_datos_prod.php");
?>

<div class="container-fluid pt-4">
    <h1>Producto Seleccionado</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Producto</b></h3>
                </div>    
                <div class="card-body">
                <div class="row">
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adescripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    if($stock <= $stockMin){?>
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" style="background: #91303b;color: white" title="Ha llegado a su stock mínimo. Hora de reponer" name="stock" value="<?php echo $stock?>" disabled><?php
                                    }else if ($stock >= $stockMax){?>
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" style="background: #91303b;color: white" title="Ha alcanzado su stock máximo. Evite comprar" name="stock" value="<?php echo $stock?>" disabled><?php
                                    }else{?>
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" name="stock" value="<?php echo $stock?>" disabled><?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stockMin">Stock Mínimo</label>
                                    <input type="number" class="form-control" name="stockMin" value="<?php echo $stockMin?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stockMax">Stock Máximo</label>
                                    <input type="number" class="form-control" name="stockMax" value="<?php echo $stockMax?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="costo">Costo x Unidad</label>
                                    <input type="text" class="form-control" name="costo" value="<?php echo $costo?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="precio">Precio de Venta/U</label>
                                    <input type="text" class="form-control" name="precio" value="<?php echo $precio?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="fechaIngreso">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" name="fechaIngreso" value="<?php echo $fechaIngreso?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fechaCreacion">Fecha de creación</label>
                                    <input type="text" class="form-control" name="fechaCreacion" value="<?php echo $fCreacion?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fechaActualizacion">Fecha de actualización</label>
                                    <input type="text" class="form-control" name="fechaActualizacion" value="<?php echo $fActualizacion?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="idUsuario">Usuario</label>
                                    <input type="text" class="form-control" name="idUsuario" value="<?php echo $nombreUsuario?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="file">Imagen</label>
                                    <img src="<?= $URL."/Images/productos/".$imagen;?>" alt="producto" width="200px">
                                </div>
                            </div>
                            <div class="col-md-12 px-4 text-center">
                                <a href="<?php echo $URL;?>/admin/productos" class="btn btn-primary m-1">Volder a la lista de Productos</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include("../layout/parte2.php");    
include("../layout/mensaje.php");
?>