<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_mascota = $_GET['id_mascota'];
include("../../app/controllers/mascotas/ver_datos_masc.php");
?>

<div class="container-fluid pt-4">
    <h1>Historia clínica de <?php echo '<b>'.$mascota['nombre'].'</b>';?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Nuevo entrada de la historia clínica</b></h3>
                </div>    
                <div class="card-body">
                   
                    <form action="<?php echo $URL;?>/app/controllers/historiasClinicas/crear_historia.php" method="post">
                        <div class="row">
                        <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="text" class="form-control" name="fecha" value="<?php echo $fechaHoy?>" disabled>
                                        <input type="text" class="form-control" name="fecha2" value="<?php echo $fechaHoy?>" hidden>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Desripción</label>
                                            <input type="text" class="form-control" name="descripcion">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tratamiento">Tratamiento</label>
                                            <input type="text" class="form-control" name="tratamiento">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="text" value="<?php echo $id_mascota?>" name="id_mascota" hidden>
                                    </div>
                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/historiasClinicas/index.php?id_mascota=<?php echo $id_mascota?>" class="btn btn-secondary m-1">Cancelar</a>
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