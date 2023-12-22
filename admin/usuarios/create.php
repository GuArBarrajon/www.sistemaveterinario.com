<?php
include("../../app/config.php");
include("../layout/parte1.php");
?>

<div class="container-fluid pt-4">
    <h1>Registro de Nuevo Usuario</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Usuario</b></h3>

                </div>
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/Usuarios/crear_usuario.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" name="nombres">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="apellido">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="verificar">Verificar Contraseña</label>
                                    <input type="password" class="form-control" name="verificar">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <select id="" class="form-control" name="cargo">
                                        <option value="administrador">Administrador</option>
                                        <option value="cliente">Cliente</option>
                                    </select>
                                </div> 
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin" class="btn btn-secondary m-1">Cancelar</a>
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
?>