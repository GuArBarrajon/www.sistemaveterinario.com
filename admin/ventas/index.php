<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/ventas/listar_ventas.php");

?>
<!--Modal productos-->
<div class="modal fade" id="modal-ver-producto">
    <div class="modal-dialog">
        <div class="modal-content">
            <h1>Producto/s</h1>
            <div class="modal-body col-md-12">
                <div class="table table-responsive">
                        <table id="example2" class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Nº</th>
                                    <th>Cód.</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th> </th>
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
                                    echo '<td>'.$producto['precio'].'</td>';
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

<div class="container pt-4">
    <h1>Listado de Ventas</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Ventas realizadas</b></h3>

                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Nro de Venta</th>
                                <th>Producto/s</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Total Pagado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contadorVent = 0;
                            foreach($ventas as $venta){
                                $contadorVent = $contadorVent + 1;
                                $id_venta = $venta['id_venta'];
                                echo '<tr>';
                                echo '<td>'.$contadorVent.'</td>';
                                echo '<td>'.$id_venta.'</td>';

                                echo '<td>';?> 
                                <button type="button" class="btn ml-4" data-toggle="modal" data-target="#modal-ver-producto<?= $id_venta ?>"><i class="fas fa-search"></i>  Productos</button> 
                                <!--Modal productos-->
                                <div class="modal fade" id="modal-ver-producto<?= $id_venta ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <h2 class="p-2">Producto/s</h2>
                                            <div class="modal-body col-md-12">
                                                <div class="table table-responsive">
                                                        <table id="example2" class="table table-striped table-bordered table-sm">
                                                            <thead>
                                                                <tr style="background-color: #8064A2; color: white; text-align: center;">
                                                                    <th>Nº</th>
                                                                    <th>Cód.</th>
                                                                    <th>Nombre</th>
                                                                    <th>Descripción</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Precio</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $contadorVentas = $id_venta;
                                                            include("../../app/controllers/ventas/listar_carrito.php");
                                                                $contador = 0;
                                                                foreach($carritos as $carrito){
                                                                    $contador = $contador + 1;
                                                                    $id_producto = $carrito['id_producto'];
                                                                    include("../../app/controllers/productos/ver_datos_prod.php");
                                                                    echo '<tr>';
                                                                    echo '<td>'.$contador.'</td>';
                                                                    echo '<td>'.$codigo.'</td>';
                                                                    echo '<td>'.$nombre.'</td>';
                                                                    echo '<td>'.$descripcion.'</td>';
                                                                    echo '<td>'.$carrito['cantidad'].'</td>';
                                                                    echo '<td>'.$precio.'</td>';
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
                                echo '</td>';

                                echo '<td>'.$venta['fecha'].'</td>';

                                $id_usuario = $venta['id_cliente'];
                                include("../../app/controllers/Usuarios/ver_datos.php");
                                echo '<td>'.$nombres.' '.$apellido.'</td>';

                                echo '<td>'.$venta['total'].'</td>';
                                ?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="show.php?id_venta=<?php echo $id_venta?>" class="btn btn-info" title="Ver"><i class="bi bi-eye"></i></a>
                                        <a href="delete.php?id_venta=<?php echo $id_venta?>" class="btn btn-danger" title="Borrar"><i class="bi bi-trash"></i></a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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
