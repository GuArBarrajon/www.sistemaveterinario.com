<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_proveedor = $_GET['id_proveedor'];
include("../../app/controllers/proveedores/ver_datos_proveedor.php");
?>

<div class="container-fluid pt-4">
    <h1>Proveedor: <?php echo $nombre?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success" style="background-color: rgb(225, 255, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Proveedor</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/proveedores/actualizar_datos.php" method="post">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $telefono?>" minlength="10" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" value="<?php echo $direccion?>" required>
                                </div>
                            </div>
                            <div>
                                <input type="text" value="<?php echo $id_proveedor?>" name="id_proveedor" hidden>
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/proveedores" class="btn btn-secondary m-1">Cancelar</a>
                                <input type="submit" class="btn btn-success m-1" value="Actualizar">
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include("../layout/parte2.php");    
include("../layout/mensaje.php");
?>