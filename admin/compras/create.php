<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/productos/listar_productos.php");
include("../../app/controllers/proveedores/listar_proveedores.php");
include("../../app/controllers/compras/listar_compras.php");

?>
<!--Modal productos-->
<div class="modal fade" id="modal-buscar-producto">3
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
                                            var codigo = "<?= $producto['codigo']?>";
                                            $('#codigoProducto').val(codigo);
                                            var nombre = "<?= $producto['nombre']?>";
                                            $('#nombreProducto').val(nombre);
                                            var descripcion = "<?= $producto['descripcion']?>";
                                            $('#descripcionProducto').val(descripcion);
                                            var stock = "<?= $producto['stock']?>";
                                            $('#stockProducto').val(stock);
                                            $('#stockProducto2').val(stock);
                                            var stockMin = "<?= $producto['stock_minimo']?>";
                                            $('#stockMinProducto').val(stockMin);
                                            var stockMax = "<?= $producto['stock_maximo']?>";
                                            $('#stockMaxProducto').val(stockMax);
                                            var costo = "<?= $producto['costo']?>";
                                            $('#costoProducto').val(costo);
                                            var precio = "<?= $producto['precio']?>";
                                            $('#precioProducto').val(precio);
                                            var fechaIngreso = "<?= $producto['fecha_ingreso']?>";
                                            $('#fechaIngresoProducto').val(fechaIngreso);
                                            var nombreUsuario = "<?= $producto['nombre_usuario'].' '.$producto['apellido_usuario']?>";
                                            $('#nombreUsuario').val(nombreUsuario);
                                            var imagen_ruta = "<?= $URL.'Images/productos/'.$producto['imagen']?>";
                                            $('#imagenProducto').attr({src: imagen_ruta});
                                            var id = "<?= $producto['id_producto']?>";
                                            $('#idProducto').val(id);

                                            $('#modal-buscar-producto').modal('toggle');

                                        });
                                        </script>
                                    </td><?php
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
                                
<!-- Modal proveedor -->
<div class="modal fade" id="modal-buscar-proveedor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #8064A2; color: white;">
                <h4 class="modal-title">Seleccione un Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-md-12">
                <div class="table table-responsive">
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $contador = 0;
                            foreach($proveedores as $prov){
                                $contador = $contador + 1;
                                $id_proveedor = $prov['id_proveedor'];
                                echo '<tr>';
                                echo '<td>'.$contador.'</td>';
                                echo '<td>'.$prov['nombre'].'</td>';
                                echo '<td>';
                                echo '<a href="https://wa.me/549'.$prov['telefono'].'" class="btn" target="_blank" title="Whatsapp"><i class="fas fa-phone"></i>'.' '.$prov['telefono'].'</a>';
                                echo '</td>';
                                ?>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-success" title="Seleccionar" id="btn_seleccProv<?= $id_proveedor ?>"><i class="bi bi-check"></i></button>
                                    </div>
                                    <script>
                                    $('#btn_seleccProv<?= $id_proveedor ?>').click(function(){
                                        var nombreProv = "<?= $prov['nombre']?>";
                                        $('#nombreProv').val(nombreProv);
                                        var telefonoProv = "<?= $prov['telefono']?>";
                                        $('#telefonoProv').val(telefonoProv);
                                        var emailProv = "<?= $prov['email']?>";
                                        $('#emailProv').val(emailProv);
                                        var direccionProv = "<?= $prov['direccion']?>";
                                        $('#direccionProv').val(direccionProv);
                                        var idProv = "<?= $prov['id_proveedor']?>";
                                        $('#idProveedor').val(idProv);

                                        $('#modal-buscar-proveedor').modal('toggle');
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
    <h1>Registro de Nueva Compra</h1>
    <form action="<?php echo $URL;?>app/controllers/compras/crear_compra.php" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                    <div class="card-header">
                        <h3 class="card-title"><b>Complete todos los datos</b></h3>
                    </div>    
                    <div class="card-body">
                            <div class="row">
                                <div style="display: flex">
                                    <h3>Datos del Producto </h3>
                                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#modal-buscar-producto"><i class="fas fa-search"></i> Buscar Producto</button>

                                </div>
                            <!-- Formulario productos -->
                            <div class="row" style="font-size: 12px">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" name="codigo" id="codigoProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombreProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adescripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcionProducto" disabled>
                                        <!--input oculto para guardar el id_producto-->
                                        <input type="text" class="form-control" name="id_producto" id="idProducto" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" name="stock" id="stockProducto" style="background: #8064A2; color: white" disabled>
                                        <input type="text" class="form-control" name="stock" id="stockProducto2" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stockMin">Stock Mínimo</label>
                                        <input type="number" class="form-control" name="stockMin" id="stockMinProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stockMax">Stock Máximo</label>
                                        <input type="number" class="form-control" name="stockMax" id="stockMaxProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="costo">Costo x Unidad</label>
                                        <input type="text" class="form-control" name="costo" id="costoProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="precio">Precio de Venta x Unidad</label>
                                        <input type="text" class="form-control" name="precio" id="precioProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fechaIngreso">Fecha de Ingreso</label>
                                        <input type="date" class="form-control" name="fechaIngreso" id="fechaIngresoProducto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nomUsuario">Usuario</label>
                                        <input type="text" class="form-control" name="nomUsuario" id="nombreUsuario" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <img  width="100px" id="imagenProducto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr>
                        <!-- Datos de compra -->
                        <div class="row py-2 px-3">
                            <div class="col-md-2">
                                <?php //calculo el número de compra
                                    $sql ="SELECT COALESCE(MAX(id_compra), 0) AS total FROM compras";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();
                                    $comp = $query->fetch();
                                    
                                    $contadorCompras = $comp['total'] + 1;
                                    
                                ?>
                                <label for="">Nro. Compra</label>
                                <input type="text" class="form-control" value="<?= $contadorCompras ?>" disabled>
                                <input type="text" class="form-control" name="numCompra" value="<?= $contadorCompras ?>" hidden>
                            </div>
                            <div class="col-md-2">
                                <label for="">Fecha Compra</label>
                                <input type="date" class="form-control" name="fechaCompra" value="<?= $fechaHoy ?>" id="fechaCompra">
                            </div>
                            <div class="col-md-2">
                                <label for="">Comprobante</label>
                                <input type="text" class="form-control" name="comprobante" id="comprobanteCompra" required>
                            </div>
                            <div class="col-md-2">
                                <label for="">Precio Unitario</label>
                                <input type="text" class="form-control" name="precio" id="precioCompra" required>
                            </div>
                            <div class="col-md-1">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" min="0" name="cantidad" id="cantidadCompra" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" value="<?= $nombreUsuarioSesion?>" disabled>
                                <input type="text" class="form-control" name="id_usuario" value="<?= $idUsuarioSesion?>" hidden>
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                                <div class="px-3" style="display: flex">
                                    <h3>Datos del Proveedor </h3>
                                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#modal-buscar-proveedor"><i class="fas fa-search"></i> Buscar Proveedor</button>

                                </div>
                                <!-- Formulario proveedor -->
                                    <div class="card-body col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombreProv" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono" id="telefonoProv" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="email">Correo</label>
                                                        <input type="text" class="form-control" name="email" id="emailProv" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" id="direccionProv" disabled>
                                                    </div>
                                                </div>
                                                <!--input oculto para guardar el id_proveedor-->
                                                <input type="text" class="form-control" name="id_proveedor" id="idProveedor" hidden>
                                            </div>
                                    </div>
                                </div>
                                <!-- Botones -->
                                <div class="row">
                                    <div class="col-md-12 p-4">
                                        <a href="" class="btn btn-secondary">Cancelar</a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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