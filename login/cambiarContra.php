<?php
include("../app/config.php");
include("../layout/parte1.php");

?>

<div class="container my-4">
    <h2 class="text-center">Cambiar contraseña</h2>
    <div class="row">
        <div class="card col-md-4 mx-auto">
            <div class="card-header">
                <img src="<?php echo $URL;?>/Images/pata.jpg" alt="Logo" width="100" height="100" class="rounded-circle mx-auto d-block">
                <p class="login-box-msg text-center" style="font-weight: 800;">Ingrese su nueva contraseña</p>
            </div>
            <div class="card-body">
                <form action="<?php echo $URL;?>/app/controllers/login/change_password2.php" method="post">

                    <div class="col-md-12 my-2">
                        <div class="form-group">
                            <label for="">Nueva Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div> 
                    <div class="col-md-12 my-2">
                        <div class="form-group">
                            <label for="">Repita la Contraseña</label>
                            <input type="password" class="form-control" name="password2" required>
                        </div>
                    </div>
                    <input type="text" name="id_usuario" value="<?php echo $usuario['id_usuario'];?>" hidden>
                    <hr>
                    <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" id="" type="submit">Registrar</button>
                        <a href="<?php echo $URL;?>" class="btn btn-secondary btn-block my-3">Cancelar</a>
                    </div>
                    </div>                                        
                </form>
            </div>
        </div>
    </div>

</div>


<?php
include("../layout/parte2.php");
include("../admin/layout/mensaje.php");
?>