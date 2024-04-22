<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_mascota = $_GET['id_mascota'];
include("../../app/controllers/mascotas/ver_datos_masc.php");
?>

<div class="container-fluid pt-4">
    <h1>Mascota Seleccionada</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Está seguro de eliminarla?</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/mascotas/borrar_mascota.php?id_mascota=<?php echo $id_mascota;?>" method="post">
                        <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="especie">Especie</label>
                                            <input type="text" class="form-control" name="especie" value="<?php echo $especie?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="raza">Raza</label>
                                            <input type="test" class="form-control" name="raza" value="<?php echo $raza?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fechaNac">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" name="fechaNac" value="<?php echo $fechaNac?>" disabled>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="text" value="<?php echo $idUsuario?>" name="id_usuario" hidden>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-md-12 p-4">
                                        <a href="<?php echo $URL;?>/admin/mascotas/index.php?id_usuario=<?php echo $idUsuario?>" class="btn btn-secondary m-1">Cancelar</a>
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