<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_turno = $_GET['id_turno'];
include("../../app/controllers/reservas/ver_turno.php");
?>

<div class="container-fluid pt-4">
    <h1>Turno Seleccionado</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-danger" style="background-color: rgb(255, 225, 225);">
                <div class="card-header">
                    <h3 class="card-title"><b>Está seguro de eliminarlo?</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/reservas/borrar_turno.php?id_turno=<?php echo $id_turno;?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="turno">Número de Turno</label>
                                    <input type="number" class="form-control" name="turno" value="<?php echo $idTurno?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mascota">Mascota</label>
                                    <input type="text" class="form-control" name="mascota" value="<?php echo $mascota?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="servicio">Servicio</label>
                                    <input type="text" class="form-control" name="servicio" value="<?php echo $servicio?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="text" class="form-control" name="fecha" value="<?php echo $fecha?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="text" class="form-control" name="hora" value="<?php echo $hora?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora">Creado</label>
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
                                <a href="<?php echo $URL;?>/admin/turnos" class="btn btn-secondary m-1">Cancelar</a>
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