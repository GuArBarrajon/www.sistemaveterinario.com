<?php
include("../app/config.php");
include("layout/parte1.php");
include("../app/controllers/Usuarios/listar_usuarios.php");
include("../app/controllers/productos/listar_productos.php");
include("../app/controllers/reservas/listar_turnos.php");
include("../app/controllers/proveedores/listar_proveedores.php");
include("../app/controllers/compras/listar_compras.php");
?>

<h2 class="pt-4">Bienvenido al Sistema</h2>
<h4 class="pt-2">Usted es <?=$cargoUsuarioSesion; ?></h4>

<div class="container-fluid pt-4">
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
                        <?php 
                            if($contadorUsuarios == 1){
                                ?> <p>Usuario Registrado</p> <?php
                            }
                            else{
                                ?> <p>Usuarios Registrados</p> <?php
                            }
                        ?>
                    </div>
                        <a href="<?=$URL."admin/usuarios/create.php";?>" title="Nuevo Usuario">
                            <div class="icon">
                                    <i class="ion bi bi-file-person-fill"></i>
                            </div> 
                        </a>
                    <a href="<?=$URL."admin/usuarios";?>" class="small-box-footer" title="Listar Usuarios">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
                        <?php 
                            if($contadorProductos == 1){
                                ?> <p>Producto Registrado</p> <?php
                            }
                            else{
                                ?> <p>Productos Registrados</p> <?php
                            }
                        ?>
                    </div>
                    <a href="<?=$URL."admin/productos/create.php";?>" title="Nuevo Producto">
                        <div class="icon">
                            <i class="ion bi bi-gift"></i>
                        </div>
                    </a>
                    <a href="<?=$URL."admin/productos";?>" class="small-box-footer" title="Listar Productos">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
                        <?php 
                            if($contadorTurnos == 1){
                                ?> <p>Turno Registrado</p> <?php
                            }
                            else{
                                ?> <p>Turnos Registrados</p> <?php
                            }
                        ?>
                    </div>
                    <a href="<?=$URL."admin/clientes";?>" title="Nuevo Turno">
                        <div class="icon">
                            <i class="ion bi bi-list-check"></i>
                        </div>
                    </a>
                    <a href="<?=$URL."admin/turnos";?>" class="small-box-footer"  title="Listar Turnos">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        $contadorProv = 0;
                        foreach($proveedores as $proveedor){
                            $contadorProv = $contadorProv + 1;
                        }
                        ?>
                        <h3><?=$contadorProv; ?></h3>
                        <?php 
                            if($contadorProv == 1){
                                ?> <p>Proveedor Registrado</p> <?php
                            }
                            else{
                                ?> <p>Proveedores Registrados</p> <?php
                            }
                        ?>
                    </div>
                    <a href="<?=$URL."admin/proveedores/create.php";?>" title="Nuevo Proveedor">
                        <div class="icon">
                            <i class="ion bi bi-truck"></i>
                        </div>
                    </a>
                    <a href="<?=$URL."admin/proveedores";?>" class="small-box-footer"  title="Listar Proveedores">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        $contadorCompras = 0;
                        foreach($compras as $compra){
                            $contadorCompras = $contadorCompras + 1;
                        }
                        ?>
                        <h3><?=$contadorCompras; ?></h3>
                        <?php 
                            if($contadorCompras == 1){
                                ?> <p>Compra Registrada</p> <?php
                            }
                            else{
                                ?> <p>Compras Registradas</p> <?php
                            }
                        ?>
                    </div>
                    <a href="<?=$URL."admin/compras/create.php";?>" title="Nueva Compra">
                        <div class="icon">
                            <i class="ion bi bi-cart-plus"></i>
                        </div>
                    </a>
                    <a href="<?=$URL."admin/compras";?>" class="small-box-footer"  title="Listar Compras">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
</div>

<?php
include("layout/parte2.php");
include("layout/mensaje.php");      
?>