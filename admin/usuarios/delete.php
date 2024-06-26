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
            <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Está seguro de eliminarlo?</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/Usuarios/borrar_usuario.php?id_usuario=<?php echo $id_usuario;?>" method="post">
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
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="<?php echo $celular?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="calle">Calle</label>
                                    <input type="text" class="form-control" name="calle" value="<?php echo $calle?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="altura">Altura</label>
                                    <input type="text" class="form-control" name="altura" value="<?php echo $altura?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="localidad">Localidad</label>
                                    <input type="text" class="form-control" name="localidad" value="<?php echo $localidad?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Rol</label>
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
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/usuarios" class="btn btn-secondary m-1">Cancelar</a>
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