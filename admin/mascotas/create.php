<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_usuario = $_GET['id_usuario'];
include("../../app/controllers/Usuarios/ver_datos.php");
?>

<div class="container-fluid pt-4">
    <h1>Nuevo Mascota de <?php echo '<b>'.$usuario['nombres'].' '.$usuario['apellido'].'</b>';?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos de la mascota</b></h3>
                </div>    
                <div class="card-body">
                   
                    <form action="<?php echo $URL;?>/app/controllers/mascotas/crear_mascota.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre*</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="especie">Especie*</label>
                                    <input type="text" class="form-control" name="especie" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="raza">Raza*</label>
                                    <input type="text" class="form-control" name="raza" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pfecha_nac">Fecha Nacimiento (aprox)*</label>
                                    <input type="date" class="form-control" name="fecha_nac" required>
                                </div>
                            </div>
                            <div>
                                <input type="text" value="<?php echo $id_usuario?>" name="id_usuario" hidden>
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>admin/mascotas/index.php?id_usuario=<?php echo $id_usuario?>" class="btn btn-secondary m-1">Cancelar</a>
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