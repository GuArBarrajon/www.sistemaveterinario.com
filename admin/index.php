<?php
include("../app/config.php");
include("layout/parte1.php");
include("../app/controllers/Usuarios/listar_usuarios.php");
include("../app/controllers/productos/listar_productos.php");
include("../app/controllers/reservas/listar_turnoss.php");
?>

<h2 class="pt-4">Bienvenido al Sistema</h2>
<h4 class="pt-2">Usted es <?=$cargoUsuarioSesion; ?></h4>

<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <?php
                        $contadorUsuarios = 0;
                        foreach($usuarios as $usuario){
                            $contadorUsuarios = $contadorUsuarios + 1;
                        }
                        ?>
                        <h3><?=$contadorUsuarios; ?></h3>

                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-file-person-fill"></i>
                    </div>
                    <a href="<?=$URL."admin/usuarios";?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <?php
                        $contadorProductos = 0;
                        foreach($productos as $producto){
                            $contadorProductos = $contadorProductos + 1;
                        }
                        ?>
                        <h3><?=$contadorProductos; ?></h3>

                        <p>Productos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-cart-check"></i>
                    </div>
                    <a href="<?=$URL."admin/productos";?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php
                        $contadorTurnos = 0;
                        foreach($turnos as $turno){
                            $contadorTurnos = $contadorTurnos + 1;
                        }
                        ?>
                        <h3><?=$contadorTurnos; ?></h3>

                        <p>Turnos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-list-check"></i>
                    </div>
                    <a href="<?=$URL."admin/turnos";?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
</div>

<?php
include("layout/parte2.php");      
?>