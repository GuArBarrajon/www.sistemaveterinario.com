<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/Usuarios/listar_usuarios.php");
?>

<div class="container pt-4">
    <h1>Listado de Usuarios</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Usuarios registrados</b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table class="table table-responsive table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombres</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($usuarios as $usuario){
                                echo '<tr>';
                                echo '<td>'.$usuario['id_usuario'].'</td>';
                                echo '<td>'.$usuario['nombres'].'</td>';
                                echo '<td>'.$usuario['apellido'].'</td>';
                                echo '<td>'.$usuario['email'].'</td>';
                                echo '<td>'.$usuario['cargo'].'</td>';?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-info">Ver</button>
                                        <button type="button" class="btn btn-success">Editar</button>
                                        <button type="button" class="btn btn-danger">Borrar</button>
                                    </div>
                                </td>
                                <?php
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("../layout/parte2.php");      
?>