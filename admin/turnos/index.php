<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/reservas/listar_turnoss.php");
?>

<div class="container pt-4">
    <h1>Listado de Turnos</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Turnos Solicitados</b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Nombres</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Mascota</th>
                                <th>Servicio</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach($turnos as $turno){
                                $contador = $contador + 1;
                                $id_turno = $turno['id_reserva'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$turno['nombres'].'</td>';
                                echo '<td>'.$turno['apellido'].'</td>';
                                echo '<td>'.$turno['email'].'</td>';
                                echo '<td>'.$turno['nombre_mascota'].'</td>';
                                echo '<td>'.$turno['tipo_servicio'].'</td>';
                                echo '<td>'.$turno['fecha'].'</td>';
                                echo '<td>'.$turno['hora'].'</td>';?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="delete.php?id_turno=<?php echo $id_turno?>" class="btn btn-danger" title="Borrar"><i class="bi bi-trash"></i></a>
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
include("../layout/mensaje.php");      
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Turnos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Turnos",
                "infoFiltered": "(Filtrado de _MAX_ total Turnos",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Turnos",
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