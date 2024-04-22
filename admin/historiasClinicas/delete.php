<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_historia = $_GET['id_historia'];
include("../../app/controllers/historiasClinicas/ver_historia.php");
?>

<div class="container-fluid pt-4">
    <h1>Entrada de la historia clínica seleccionada</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Está seguro de eliminar esta entrada?</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/historiasClinicas/borrar_historia.php?id_historia=<?php echo $id_historia;?>" method="post">
                        <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="text" class="form-control" name="fecha" value="<?php echo $fecha?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Desripción</label>
                                            <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tratamiento">Tratamiento</label>
                                            <input type="text" class="form-control" name="tratamiento" value="<?php echo $tratamiento?>" disabled>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="text" value="<?php echo $idMascota?>" name="id_mascota" hidden>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-md-12 p-4">
                                        <a href="<?php echo $URL;?>admin/historiasClinicas/index.php?id_mascota=<?php echo $idMascota?>" class="btn btn-secondary m-1">Cancelar</a>
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