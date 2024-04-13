<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/productos/listar_productos.php");
?>

<div class="container pt-4">
    <h1>Listado de Productos</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Nuestros productos</b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach($productos as $producto){
                                $contador = $contador + 1;
                                $id_producto = $producto['id_producto'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$producto['codigo'].'</td>';
                                echo '<td>'.$producto['nombre'].'</td>';
                                echo '<td>'.$producto['descripcion'].'</td>';
                                if($producto['stock'] <= $producto['stock_minimo']){
                                    echo '<td style="background: #91303b;color: white" title="Ha llegado a su stock mínimo. Hora de reponer">'.$producto['stock'].'</td>';
                                }else if ($producto['stock'] >= $producto['stock_maximo']){
                                    echo '<td style="background: #91303b;color: white" title="Ha alcanzado su stock máximo. Evite comprar">'.$producto['stock'].'</td>';
                                }else{
                                    echo '<td>'.$producto['stock'].'</td>';
                                }
                                echo '<td>'.$producto['precio'].'</td>';?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="show.php?id_producto=<?php echo $id_producto?>" class="btn btn-info" title="Ver"><i class="bi bi-eye"></i></a>
                                        <a href="update.php?id_producto=<?php echo $id_producto?>" class="btn btn-success" title="Editar"><i class="bi bi-pencil"></i></a>
                                        <a href="delete.php?id_producto=<?php echo $id_producto?>" class="btn btn-danger" title="Borrar"><i class="bi bi-trash"></i></a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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