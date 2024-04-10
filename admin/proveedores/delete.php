<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_proveedor = $_GET['id_proveedor'];
include("../../app/controllers/proveedores/ver_datos_proveedor.php");
?>

<div class="container-fluid pt-4">
    <h1>Proveedor Seleccionado</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Está seguro de eliminarlo?</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/proveedores/borrar_proveedor.php?id_proveedor=<?php echo $id_proveedor;?>" method="post">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $telefono?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" value="<?php echo $direccion?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="creacion">Creado</label>
                                    <input type="text" class="form-control" name="creacion" value="<?php echo $fCreacion?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="actualizacion">Actualizado</label>
                                    <input type="text" class="form-control" name="actualizacion" value="<?php echo $fActualizacion?>" disabled>
                                </div> 
                            </div>
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/proveedores" class="btn btn-secondary m-1">Cancelar</a>
                                <input type="submit" class="btn btn-danger m-1" value="Borrar">
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