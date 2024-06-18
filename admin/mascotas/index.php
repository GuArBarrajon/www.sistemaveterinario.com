<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_usuario = $_GET['id_usuario'];
include("../../app/controllers/mascotas/listar_mascotas.php");
include("../../app/controllers/Usuarios/ver_datos.php");
?>

<div class="container pt-4">
    <h1>Listado de Mascotas de <?php echo '<b>'.$usuario['nombres'].' '.$usuario['apellido'].'</b>';?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>A la derecha de cada mascota puede acceder a la historia clínica</b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Especie</th>
                                <th>Raza</th>
                                <th>Fecha Nacimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach($mascotas as $mascota){
                                $contador = $contador + 1;
                                $fecha = date ('d/m/Y', strtotime($mascota['fecha_nac']));
                                $id_mascota = $mascota['id_mascota'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$mascota['nombre'].'</td>';
                                echo '<td>'.$mascota['especie'].'</td>';
                                echo '<td>'.$mascota['raza'].'</td>';
                                echo '<td>'.$fecha.'</td>';?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="../historiasClinicas/index.php?id_mascota=<?php echo $id_mascota?>" class="btn btn-info" title="Historia Clínica"><i class="bi bi-clipboard2-pulse"></i></a>
                                        <a href="delete.php?id_mascota=<?php echo $id_mascota?>" class="btn btn-danger" title="Borrar mascota"><i class="bi bi-trash"></i></a>
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
    <div class="row">
            <div class="col-md-12 pb-2">
                <a href="<?php echo $URL;?>/admin/clientes" class="btn btn-success"><i class="bi bi-arrow-left"></i> | Volver a Clientes</a>
                <a href="<?php echo $URL;?>admin/mascotas/create.php?id_usuario=<?php echo $id_usuario?>" class="btn btn-primary">Nueva mascota</a>
            </div>
    </div>
</div>

<?php
include("../layout/parte2.php");
include("../layout/mensaje.php");      
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Mascotas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Mascotas",
                "infoFiltered": "(Filtrado de _MAX_ total Mascotas",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Mascotas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [
                {
                    extend: "collection",
                    text: "Reportes",
                    orientation: "landscape",
                    buttons: [
                        { text: "Copiar", extend: "copy"}, 
                        { extend: "pdf" }, 
                        { extend: "csv" }, 
                        { extend: "excel" }, 
                        { text: "Imprimir", extend: "print"}
                    ]
                },
                {
                    extend: "colvis",
                    text: "Visor de columnas"
                }
            ],
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });

</script>