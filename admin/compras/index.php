<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/compras/listar_compras.php");

?>

<div class="container pt-4">
    <h1>Listado de Compras</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Compras realizadas</b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Nro de compra</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Comprobante</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach($compras as $compra){
                                $contador = $contador + 1;
                                $id_compra = $compra['id_compra'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$compra['nro_compra'].'</td>';
                                echo '<td>';
                                echo '<a class="btn" href="'.$URL.'admin/productos/show.php?id_producto='.$compra['id_producto'].'">'.$compra['pnombre'].'</a>';
                                echo '</td>';
                                echo '<td>'.$compra['fecha_compra'].'</td>';
                                echo '<td>';
                                echo '<a class="btn" href="'.$URL.'admin/proveedores/show.php?id_proveedor='.$compra['id_proveedor'].'">'.$compra['provnombre'].'</a>';
                                echo '</td>';
                                echo '<td>'.$compra['comprobante'].'</td>';
                                echo '<td>'.$compra['precio_compra'].'</td>';
                                echo '<td>'.$compra['cantidad'].'</td>';?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="show.php?id_compra=<?php echo $id_compra?>" class="btn btn-info" title="Ver"><i class="bi bi-eye"></i></a>
                                        <a href="update.php?id_compra=<?php echo $id_compra?>" class="btn btn-success" title="Editar"><i class="bi bi-pencil"></i></a>
                                        <a href="delete.php?id_compra=<?php echo $id_compra?>" class="btn btn-danger" title="Borrar"><i class="bi bi-trash"></i></a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                "infoFiltered": "(Filtrado de _MAX_ total Compras",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
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
