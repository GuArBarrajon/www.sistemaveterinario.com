<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_usuario = $_GET['id_usuario'];
include("../../app/controllers/Usuarios/ver_datos.php");
?>

<div class="container-fluid pt-4">
    <h1>Usuario <?php echo $nombres." ".$apellido?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success" style="background-color: rgb(225, 255, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Usuario</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/Usuarios/actualizar_datos.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres*</label>
                                    <input type="text" class="form-control" name="nombres" value="<?php echo $nombres?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido*</label>
                                    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido?>" required>
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
                                    <label for="celular">Celular*</label>
                                    <input type="text" class="form-control" name="celular" value="<?php echo $celular?>" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="calle">Calle*</label>
                                    <input type="text" class="form-control" name="calle" value="<?php echo $calle?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="altura">Altura*</label>
                                    <input type="text" class="form-control" name="altura" value="<?php echo $altura?>" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="localidad">Localidad*</label>
                                    <input type="text" class="form-control" name="localidad" value="<?php echo $localidad?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña*</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="verificar">Verificar Contraseña*</label>
                                    <input type="password" class="form-control" name="verificar">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Rol*</label>
                                    <select id="" class="form-control" name="cargo" value="<?php echo $cargo?>" required>
                                        <?php
                                        if($cargo == "administrador"){?>
                                            <option value="administrador">Administrador</option>
                                            <option value="cliente">Cliente</option><?php
                                        }
                                        else{?>
                                            <option value="cliente">Cliente</option>
                                            <option value="administrador">Administrador</option><?php
                                        }
                                        ?>   
                                    </select>
                                </div> 
                            </div>
                            <div>
                                <input type="text" value="<?php echo $id_usuario?>" name="id_usuario" hidden>
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/usuarios" class="btn btn-secondary m-1">Cancelar</a>
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