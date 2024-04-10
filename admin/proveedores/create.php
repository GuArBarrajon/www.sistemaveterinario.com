<?php
include("../../app/config.php");
include("../layout/parte1.php");
?>

<div class="container-fluid pt-4">
    <h1>Registro de Nuevo Proveedor</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Proveedor</b></h3>
                </div>    
                <div class="card-body">
                   
                    <form action="<?php echo $URL;?>/app/controllers/proveedores/crear_proveedor.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre*</label>
                                    <input type="text" class="form-control" name="nombre">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telefono">Teléfono*</label>
                                    <input type="text" class="form-control" name="telefono" minlength="10" maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Correo*</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="direccion">Dirección*</label>
                                    <input type="text" class="form-control" name="direccion">
                                </div>
                            </div>

                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/proveedores" class="btn btn-secondary m-1">Cancelar</a>
                                <input type="submit" class="btn btn-primary m-1" value="Guardar">
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