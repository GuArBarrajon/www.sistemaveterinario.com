<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/proveedores/listar_proveedores.php");

$id_compra = $_GET['id_compra'];
include("../../app/controllers/compras/ver_compra.php");

?>

                                
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
            <div class="modal-body col-md-11">
                <div class="card-body">
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
    <h1>Compra Nº: <?= $compra['nro_compra'] ?></h1>
    <form action="<?php echo $URL;?>app/controllers/compras/actualizar_compra.php" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success" style="background-color: rgb(225, 255, 225);">
                    <div class="card-header">
                        <h3 class="card-title"><b>Actualizar Datos de la Compra</b></h3>
                    </div>    
                    <div class="card-body">
                            <div class="row">
                                <div style="display: flex">
                                    <h3>Datos del Producto </h3>
                                </div>
                                <?php 
                                    $id_producto = $compra['id_producto'];
                                    include("../../app/controllers/productos/ver_datos_prod.php");
                                ?>
                            <!-- Formulario productos -->
                            <div class="row" style="font-size: 12px">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" name="codigo" value="<?= $codigo ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="<?= $nombre ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adescripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion" value="<?= $descripcion ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" class="form-control" name="stock" value="<?= $stock ?>" style="background: #8064A2; color: white" disabled>
                                        <input type="number" class="form-control" name="stock" value="<?= $stock ?>" hidden>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stockMin">Stock Mínimo</label>
                                        <input type="number" class="form-control" name="stockMin" value="<?= $stockMin ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stockMax">Stock Máximo</label>
                                        <input type="number" class="form-control" name="stockMax" value="<?= $stockMax ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="costo">Costo x Unidad</label>
                                        <input type="text" class="form-control" name="costo" value="<?= $costo ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="precio">Precio de Venta x Unidad</label>
                                        <input type="text" class="form-control" name="precio" value="<?= $precio ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fechaIngreso">Fecha de Ingreso</label>
                                        <input type="date" class="form-control" name="fechaIngreso" value="<?= $fechaIngreso ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php 
                                            $id_usuario = $idUsuario;
                                            include("../../app/controllers/Usuarios/ver_datos.php");
                                        ?>
                                        <label for="nomUsuario">Usuario</label>
                                        <input type="text" class="form-control" name="nomUsuario" value="<?= $usuario['nombres'].' '.$usuario['apellido'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <img src="<?php echo '../../Images/productos/'.$producto['imagen']; ?>" width="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr>
                        <!-- Datos de compra -->
                        <div class="row py-2 px-3">
                            <div class="col-md-2">
                                <label for="">Nro. Compra</label>
                                <input type="text" class="form-control" value="<?= $compra['nro_compra'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="">Fecha Compra</label>
                                <input type="date" class="form-control" name="fechaCompra" value="<?= $compra['fecha_compra']  ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="">Comprobante</label>
                                <input type="text" class="form-control" name="comprobante" value="<?= $compra['comprobante']  ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="">Precio Unitario</label>
                                <input type="text" class="form-control" name="precio" value="<?= $compra['precio_compra']  ?>">
                            </div>
                            <div class="col-md-1">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" min="0" name="cantidad" value="<?= $compra['cantidad']  ?>">
                                <input type="number" class="form-control" min="0" name="cantidadAnterior" value="<?= $compra['cantidad']  ?>" hidden>
                            </div>
                            <div class="col-md-3">
                                <?php 
                                    $id_usuario = $compra['id_usuario'];
                                    include("../../app/controllers/Usuarios/ver_datos.php");
                                ?>
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" value="<?= $nombres.' '.$apellido ?>" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                                <div class="px-3" style="display: flex">
                                    <h3>Datos del Proveedor </h3>
                                    <button type="button" class="btn btn-success ml-4" data-toggle="modal" data-target="#modal-buscar-proveedor"><i class="fas fa-search"></i> Buscar Proveedor</button>
                                </div>
                                <!-- Formulario proveedor -->
                                <?php 
                                    $id_proveedor = $compra['id_proveedor'];
                                    include("../../app/controllers/proveedores/ver_datos_proveedor.php");
                                ?>
                                    <div class="card-body col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?= $nombre ?>" id="nombreProv" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono" value="<?= $telefono?>" id="telefonoProv" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="email">Correo</label>
                                                        <input type="text" class="form-control" name="email" value="<?= $email ?>" id="emailProv" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" value="<?= $direccion ?>" id="direccionProv" disabled>
                                                    </div>
                                                </div>
                                                <!--inputs ocultos para guardar el id_proveedor , el id_producto y el id_compra-->
                                                <input type="text" class="form-control" name="id_proveedor" value="<?= $id_proveedor ?>" id="idProveedor" hidden>
                                                <input type="text" class="form-control" name="id_compra" value="<?= $id_compra ?>" hidden>
                                                <input type="text" class="form-control" name="id_producto" value="<?= $id_producto ?>" hidden>
                                            </div>
                                    </div>
                                </div>
                                <!-- Botones -->
                                <div class="row">
                                    <div class="col-md-12 p-4">
                                        <a href="<?= $URL.'admin/compras' ?>" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar</button>  
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