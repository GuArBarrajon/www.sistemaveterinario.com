<?php
include("../../app/config.php");
include("../layout/parte1.php");
include("../../app/controllers/productos/listar_productos.php");

//para autocompletar el código de producto 
$contador = 1;
foreach($productos as $producto){
    $contador = $contador + 1;
}

function ceros($numero) {
        $len = 0;
        $cantidad_ceros = 5;
        $aux = $numero;
        $pos = strlen($numero);
        $len = $cantidad_ceros - $pos;
        for ($i = 0; $i < $len; $i++) {
            $aux = "0" . $aux;
        }
        return $aux;
}

?>

<div class="container-fluid pt-4">
    <h1>Registro de Nuevo Producto</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary" style="background-color: rgb(225, 225, 255);">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del Producto</b></h3>
                </div>    
                <div class="card-body">
                    <form action="<?php echo $URL;?>/app/controllers/productos/crear_producto.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input type="text" class="form-control" value="p<?= ceros($contador); ?>" disabled>
                                    <input type="text" class="form-control" name="codigo" value="p<?= ceros($contador); ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre*</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adescripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="file">Imagen</label>
                                    <input type="file" class="form-control" name="file" id="file">
                                    <!--salida donde muestra la imagen-->
                                    <output id="list"></output>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="stock">Stock*</label>
                                    <input type="number" class="form-control" name="stock" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="stockMin">Stock Mínimo*</label>
                                    <input type="number" class="form-control" name="stockMin" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="stockMax">Stock Máximo*</label>
                                    <input type="number" class="form-control" name="stockMax" min="0"  required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="costo">Costo*</label>
                                    <input type="text" class="form-control" name="costo" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precio">Precio de Venta*</label>
                                    <input type="text" class="form-control" name="precio" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fechaIngreso">Fecha de Ingreso*</label>
                                    <input type="date" class="form-control" name="fechaIngreso" required>
                                </div>
                            </div>
                            <input type="text" value="<?= $idUsuarioSesion;?>" name="idUsuario" hidden>

                            
                            <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="<?php echo $URL;?>/admin/productos" class="btn btn-secondary m-1">Cancelar</a>
                                <input type="submit" class="btn btn-primary m-1" value="Guardar">
                            </div>
                            </div>
                        </div>
                    </form>
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
    //función para mostrar la imagen que se selecciona
    function archivo(evt){
        var files = evt.target.files; //FileList object
        //obtenemos la imagen del campo "file"
        for(var i=0, f; f=files[i]; i++){
            //verificamos que sea imagen
            if(!f.type.match('image.*')){
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile){
                return function (e){
                    //insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                };
            }) (f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>