<footer class="container-fluid footer">
                <div class="container">
                    <div class="row mx-auto p-5">
                        <div class="col-md-4 pt-2">
                            <img src="<?php echo $URL;?>/Images/pata.jpg" alt="Logo" width="150" height="150" class="d-inline-block align-text-top rounded-circle" >
                        </div>
                        <div class="col-md-4">
                            <h3>Centro Veterinario</h3>
                            <a href="<?php echo $URL;?>" class="btn btn-primary">Inicio</a><br>
                            <a href="<?php echo $URL;?>#productos" class="btn btn-primary">Productos</a><br>
                            <a href="<?php echo $URL;?>#galeria" class="btn btn-primary">Galería</a><br>
                            <a href="<?php echo $URL;?>#nosotros" class="btn btn-primary">Sobre nosostros</a><br>
                            <?php 
                                if ($cargoUsuarioSesion != "" and $cargoUsuarioSesion != "cliente"){?>
                                    <a class="btn btn-primary" href="<?php echo $URL;?>admin/clientes">Turnos</a>
                            <?php   
                                }
                                else{?>
                                    <a class="btn btn-primary" href="<?php echo $URL;?>reservar.php">Turnos</a>
                            <?php
                                }
                            ?>

                        </div>
                        <div class="col-md-4">
                            <h3>Contacto</h3>
                            <a href="https://wa.me/5491155551111" class="btn btn-primary" target="_blank" title="Whatsapp"><i class="bi bi-telephone"> +54-911-5555-1111</i></a>
                            <a href="mailto:veterinaria@gmail.com" class="btn btn-primary" target="_blank" title="Enviar correo"><i class="bi bi-envelope-at"></i> veterinariacudi@outlook.com</a>
                            <div class="mx-auto">
                                <a href="https://twitter.com/ubafvet?lang=es" class="btn btn-primary" target="_blank" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                                <a href="https://www.instagram.com/veterinariasuba/?hl=es" class="btn btn-primary" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.facebook.com/FvetUBA/?locale=es_LA" class="btn btn-primary" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="contariner" style="background-color: rgb(76, 15, 102);">
                <div class="row p-2">
                    <p style="text-align: center; font-weight: 800; color: white;">Centro Veterinario ©. Todos los derechos reservados. 2024</p>
                </div>
            </div>

        <script src="<?php echo $URL;?>/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>