<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/productos/listar_productos.php");
include("../../app/controllers/Usuarios/listar_clientes.php");

//calculo el número de venta
$sql ="SELECT COALESCE(MAX(id_venta), 0) AS total FROM ventas";
$query = $pdo->prepare($sql);
$query->execute();
$venta = $query->fetch();

$contadorVentas =$venta['total'] + 1;

?>
<!--Modal productos-->
<div class="modal fade" id="modal-buscar-producto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #8064A2; color: white;">
                <h4 class="modal-title">Seleccione un Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-md-12">
                <div class="table table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-sm">
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
                                    echo '<td>'.$producto['precio'].'</td>';?>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-success" title="Seleccionar" id="btn_seleccionar<?= $id_producto ?>"><i class="bi bi-check"></i></button>
                                        </div>
                                        <script>
                                        $('#btn_seleccionar<?= $id_producto ?>').click(function(){
                                            var nombre = "<?= $producto['nombre']?>";
                                            $('#nombreProducto').val(nombre);
                                            var descripcion = "<?= $producto['descripcion']?>";
                                            $('#descripcionProducto').val(descripcion);
                                            var precio = "<?= $producto['precio']?>";
                                            $('#precioProducto').val(precio);
                                            var stock = "<?= $producto['stock']?>";
                                            $('#cantidadProducto').attr('max', stock);
                                            var id = "<?= $producto['id_producto']?>";
                                            $('#idProducto').val(id);
                                            $('#cantidadProducto').focus();

                                        });
                                        </script>
                                    </td><?php
                                        echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row pt-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Producto</label>
                                        <input type="text" class="form-control" name="nombre" id="nombreProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcionProducto" disabled>
                                        <!--input oculto para guardar el id_producto-->
                                        <input type="text" class="form-control" name="id_producto" id="idProducto" hidden>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad" id="cantidadProducto" min="0" max="5">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="text" class="form-control" name="precio" id="precioProducto" disabled>
                                    </div>
                                </div>
                        </div>
                        <div class="pb-3">
                            <button class="btn btn-primary" style="float:right" id="guardar-carrito">Registrar</button>
                            <div id="respuesta_carrito"></div>
                            <script>
                                $('#guardar-carrito').click(function(){
                                    var id_venta = "<?= $contadorVentas?>";
                                    var id_producto = $('#idProducto').val();
                                    var cantidad = $('#cantidadProducto').val();

                                    if(id_producto == ""){
                                        alert ("Debe seleccionar un producto");
                                    }else if(cantidad == ""){
                                        alert ("Debe completar la cantidad");
                                    }else{
                                        var url = "../../app/controllers/ventas/registrar_carrito.php";
                                        $.get(url, {id_venta:id_venta, id_producto:id_producto, cantidad:cantidad}, function(datos){
                                            $('#respuesta_carrito').html(datos);
                                        });
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
<!-- Modal cliente -->
<div class="modal fade" id="modal-buscar-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #8064A2; color: white;">
                <h4 class="modal-title">Seleccione un Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-md-12">
                <div class="table table-responsive">
                    <table id="example2" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $contador = 0;
                            foreach($usuarios as $usuario){
                                $contador = $contador + 1;
                                $id_usuario = $usuario['id_usuario'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$usuario['nombres'].'</td>';
                                echo '<td>'.$usuario['apellido'].'</td>';
                                ?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-success" title="Seleccionar" id="btn_seleccCliente<?= $id_usuario ?>"><i class="bi bi-check"></i></button>
                                    </div>
                                    <script>
                                    $('#btn_seleccCliente<?= $id_usuario ?>').click(function(){
                                        var nombreUsu= "<?= $usuario['nombres']?>";
                                        $('#nombreCliente').val(nombreUsu);
                                        var apellidoUsu = "<?= $usuario['apellido']?>";
                                        $('#apellidoCliente').val(apellidoUsu);
                                        var emailUsu = "<?= $usuario['email']?>";
                                        $('#emailCliente').val(emailUsu);
                                        var idUsu = "<?= $usuario['id_usuario']?>";
                                        $('#idCliente').val(idUsu);

                                        $('#modal-buscar-cliente').modal('toggle');
                                    });
                                    </script>
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


<div class="container-fluid pt-4">
    <h1>Nueva Venta</h1>
    <form action="<?php echo $URL;?>app/controllers/ventas/crear_venta.php?cargo=<?php echo $cargoUsuarioSesion; ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                    <div class="card-header">
                        <h3 class="card-title"><b>Complete todos los datos</b></h3>
                    </div>    
                    <div class="card-body">
                            <!-- Datos de compra -->
                            <div class="row pt-2 pb-3">
                                <div class="col-md-2">

                                    <label for="">Nro. de Venta</label>
                                    <input type="text" class="form-control" value="<?= $contadorVentas ?>" disabled>
                                    <input type="text" class="form-control" name="numVenta" value="<?= $contadorVentas ?>" hidden>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Fecha de Venta</label>
                                    <input type="date" class="form-control" name="fechaVenta" value="<?= $fechaHoy ?>" disabled>
                                    <input type="date" class="form-control" name="fechaVenta" value="<?= $fechaHoy ?>" id="fechaVenta" hidden>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div style="display: flex">
                                    <h3>Carrito de compras <i class="nav-icon fas fa-cart-plus"></i></h3>
                                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#modal-buscar-producto"><i class="fas fa-search"></i> Buscar Producto</button>
                                </div>
                            <!-- Formulario productos --> 
                            <div class="row pt-3  col-md-12" style="font-size: 16px">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm table-hover table-striped">
                                        <thead style="background: #8064A2; color: white">
                                            <tr>
                                                <th>Nro</th>
                                                <th>Producto</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Subtotal</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include("../../app/controllers/ventas/listar_carrito.php");
                                            $contadorCarrito = 0;
                                            $total = 0;
                                            foreach($carritos as $carrito){
                                                $contadorCarrito = $contadorCarrito + 1; 
                                                $id_producto = $carrito['id_producto'];
                                                include("../../app/controllers/productos/ver_datos_prod.php");

                                                echo '<tr>';
                                                echo '<td>'.$contadorCarrito.'</td>';
                                                echo '<td>'.$producto['nombre'].'</td>';
                                                echo '<td>'.$producto['descripcion'].'</td>';
                                                echo '<td>'.$carrito['cantidad'].'</td>';
                                                echo '<td>'.$producto['precio'].'</td>';
                                                $subto = $carrito['cantidad'] * $producto['precio'];
                                                echo '<td>'.$subto.'</td>';?>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="../../app/controllers/ventas/borrar_carrito.php?id_carrito=<?php echo $carrito['id_carrito']?>" class="btn btn-danger" title="Borrar usuario"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                                <?php
                                                echo '</tr>';
                                                $total = $total + $subto;
                                            }
                                            ?>

                                            <tr style="background: #8064A2; color: white;">
                                                <th colspan="5" style="text-align: right">TOTAL</th>
                                                <th><?= $total ?></th>
                                                <input type="text" name="total" value="<?= $total ?>" hidden>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr>

                        <div class="row col-md-12">
                                <div class="px-3" style="display: flex">
                                    <h3>Datos del Cliente </h3>
                                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#modal-buscar-cliente"><i class="fas fa-search"></i> Buscar Cliente</button>

                                </div>
                                <!-- Formulario Cliente -->
                                    <div class="card-body col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombreCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="apellido">Apellido</label>
                                                        <input type="text" class="form-control" name="apellido" id="apellidoCliente" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="email">Correo</label>
                                                        <input type="text" class="form-control" name="email" id="emailCliente" disabled>
                                                    </div>
                                                </div>
        
                                                <!--input oculto para guardar el id_cliente-->
                                                <input type="text" class="form-control" name="id_cliente" id="idCliente" hidden>
                                            </div>
                                    </div>
                                </div>
                                <!-- Botones -->
                                <div class="row">
                                    <div class="col-md-12 px-4 pb-3">
                                        <a href="../../app/controllers/ventas/cancelar_venta.php?id_venta=<?php echo $contadorVentas?>&cargo=<?php echo $cargoUsuarioSesion?>" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
            
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });

    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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
            
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });

</script>