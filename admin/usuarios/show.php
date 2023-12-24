<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_usuario = $_GET['id_usuario'];
include("../../app/controllers/Usuarios/ver_datos.php");
?>

<div class="container-fluid pt-4">
    <h1>Usuario Seleccionado</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Usuario</b></h3>
                </div>    
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" name="nombres" value="<?php echo $nombres?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido?>" disabled>
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
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" name="cargo" value="<?php echo $cargo?>" disabled>
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
                            <div class="col-md-12 p-4 text-center">
                                <a href="<?php echo $URL;?>/admin/usuarios" class="btn btn-primary m-1">Volver a la lista</a>
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