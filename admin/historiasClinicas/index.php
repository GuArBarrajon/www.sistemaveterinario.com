<?php
include("../../app/config.php");
include("../layout/parte1.php");

$id_mascota = $_GET['id_mascota'];
include("../../app/controllers/mascotas/ver_datos_masc.php");
include("../../app/controllers/historiasClinicas/listar_historias.php");
?>

<div class="container pt-4">
    <h1>Historia Clínica de <?php echo '<b>'.$mascota['nombre'].'</b>';?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b></b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Fecha de consulta</th>
                                <th>Descripción</th>
                                <th>Tratamiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach($historias as $historia){
                                $contador = $contador + 1;
                                $id_historia = $historia['id_historia'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$historia['fecha_consulta'].'</td>';
                                echo '<td>'.$historia['descripcion'].'</td>';
                                echo '<td>'.$historia['tratamiento'].'</td>';?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="delete.php?id_historia=<?php echo $id_historia?>" class="btn btn-danger" title="Borrar historia"><i class="bi bi-trash"></i></a>
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
                <a href="<?php echo $URL;?>admin/mascotas/index.php?id_usuario=<?php echo $mascota['id_usuario']?>" class="btn btn-success"><i class="bi bi-arrow-left"></i> | Volver a Mascotas</a>
                <a href="<?php echo $URL;?>admin/historiasClinicas/create.php?id_mascota=<?php echo $id_mascota?>" class="btn btn-primary">Nueva entrada</a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Mascotas",
                "infoFiltered": "(Filtrado de _MAX_ total Entradas",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
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