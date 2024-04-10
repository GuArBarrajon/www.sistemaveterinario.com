<?php
include("../app/config.php");
include("../layout/parte1.php");
?>

<div class="container my-4">
    <h2 class="text-center">Formulario de Ingreso</h2>
    <div class="row">
        <div class="card col-md-4 mx-auto">
            <div class="card-header">
                <img src="<?php echo $URL;?>/Images/pata.jpg" alt="Logo" width="100" height="100" class="rounded-circle mx-auto d-block">
                <p class="login-box-msg text-center" style="font-weight: 800;">Ingrese sus datos</p>
            </div>
            <div class="card-body">
                <form action="<?php echo $URL;?>/app/controllers/login/controller_login.php" method="post">
                    <div class="col-md-12 my-2">
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div> 
                    <hr>
                    <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" id="" type="submit">Ingresar</button>
                        <a href="<?php echo $URL;?>" class="btn btn-secondary btn-block my-3">Cancelar</a>
                    </div>
                        <div class="text-center">
                            <a href="<?php echo $URL.'login/recuperar.php';?>" class="btn">Olvidó su contraseña?</a>
                        </div>
                    </div>                                        
                </form>
            </div>
        </div>
    </div>
</div>

<?php
//mensajes de error token inválido o vencido

if(!empty($_GET['message'])){
    switch($_GET['message']){
        case 'not_found':
            $_SESSION['mensaje'] = "No se encontró el token. Vuelva a intentar recuperar la contraseña";
            $_SESSION['icono'] = "error";
            break;
        case 'expired':
            $_SESSION['mensaje'] = "Pasó el tiempo permitido. Vuelva a intentar recuperar la contraseña";
            $_SESSION['icono'] = "error";
            break;
    }
}

?>


<?php
include("../layout/parte2.php");
include("../admin/layout/mensaje.php");
?>