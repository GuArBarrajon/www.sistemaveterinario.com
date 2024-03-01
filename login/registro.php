<?php
include("../app/config.php");
include("../app/controllers/productos/listar_productos.php");
include("../layout/parte1.php");
?>

<div class="container my-4">
    <h1 class="text-center">Registrarse</h1>
    <div class="row">
        <div class="card col-4 mx-auto">
            <div class="card-header">
                Complete todos los datos
            </div>
            <div class="card-body">
                <form action="">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" required>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Repita la Contraseña</label>
                            <input type="password" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="" type="button">Registrar</button>
                    </div>
                    </div>                                        
                </form>
            </div>
        </div>
    </div>

</div>


<?php
include("../layout/parte2.php");
?>