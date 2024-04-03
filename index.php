<?php
include("app/config.php");
include("app/controllers/productos/listar_productos.php");
include("layout/parte1.php");
?>

<section>
                <!--Corousel de fotos-->
                <div id="carouselExampleCaptions" class="carousel slide p-5">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $URL;?>/Images/cachorro.jpg" class="d-block w-100 mx-auto" alt="cachorro">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="#productos" class="btn btn-primary">Ver Productos</a>
                                <h5 class="pt-2">First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $URL;?>/Images/gato.jpg" class="d-block w-100 mx-auto" alt="gato">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="#productos" class="btn btn-primary">Ver Productos</a>
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $URL;?>/Images/perro.jpg"  class="d-block w-100 mx-auto" alt="perro">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="#productos" class="btn btn-primary">Ver Productos</a>
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
            <section class="info" id="nosotros">
                <div class="container-fluid p-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <br>
                            <img src="<?php echo $URL;?>/Images/vet1.jpg" alt="veterinario" width="100%" class="imagen">
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <br><br>
                            <h3>Acerca de nuestro <span style="color: rgb(117, 74, 158);">Centro Veterinario</span></h3>
                            <p style="text-align: justify;"> En nuestro centro veterinario, nos dedicamos apasionadamente al cuidado integral de sus mascotas. 
                                Nuestro equipo altamente calificado de veterinarios y personal de apoyo trabaja incansablemente para 
                                proporcionar servicios médicos de alta calidad, desde exámenes de rutina hasta tratamientos 
                                especializados. Nos enorgullece ofrecer un ambiente acogedor y compasivo donde tanto usted como su 
                                mascota se sientan cómodos y bien atendidos. En cada visita, nos esforzamos por promover la salud y el 
                                bienestar de sus amigos peludos, creando una relación de confianza que perdura a lo largo del tiempo.</p>
                            <a href="#servicios" class="btn btn-primary" >Más sobre nosotros</a>
                            
                            </div>
                    </div>
                </div>
            </section>

            <section class="servicios p-2" id="servicios">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <h1>Nuestros Servicios</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><br>
                            <div class="card foto" style="text-align: center;">
                                <img src="<?php echo $URL;?>/Images/inyeccion.jpg" class="card-img-top" alt="vacunas">
                                <div class="card-body">
                                    <h5 class="card-title">Vacunación</h5>
                                    <p class="card-text">Contamos con vacunas de última generación y un equipo especializado que adapta el plan de vacunación a 
                                        las necesidades individuales de cada animal. Priorizamos la prevención para asegurar la vitalidad y felicidad de sus 
                                        queridos compañeros.</p>
                                    <a href="#fin" class="btn btn-primary" >Contactanos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="card foto" style= "text-align: center;">
                                <img src="<?php echo $URL;?>/Images/operacion.jpg" class="card-img-top" alt="operción">
                                <div class="card-body">
                                    <h5 class="card-title">Quirófano</h5>
                                    <p class="card-text"> Nuestro equipamiento moderno garantiza procedimientos quirúrgicos seguros
                                        y efectivos. Desde cirugías de rutina hasta intervenciones más especializadas, proporcionamos cuidado 
                                        quirúrgico de alta calidad.</p>
                                    <a href="#fin" class="btn btn-primary" >Contactanos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="card foto" style= "text-align: center;">
                                <img src="<?php echo $URL;?>/Images/laboratorio.jpg" class="card-img-top" alt="análisis">
                                <div class="card-body">
                                    <h5 class="card-title">Laboratorio propio</h5>
                                    <p class="card-text">Equipado con tecnología de vanguardia, nuestro laboratorio realiza una amplia gama de pruebas, desde análisis 
                                        de sangre hasta exámenes de muestras, con resultados confiables en el menor tiempo posible. </p><br>
                                    <a href="#fin" class="btn btn-primary" >Contactanos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"><br><br>
                            <img src="<?php echo $URL;?>/Images/dog.webp" alt="Perro herido" width="100%">
                        </div>
                    </div>
                </div>
            </section>

            <section class="clientes p-2">
                <div class="container">
                    <h1 style="margin: 15px;"><br>Testimonios de Clientes</h1>
                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente1.jpg" class="card-img-top" alt="mujer y gato">
                                                <div class="card-body">
                                                    <h5 class="card-title">María S.</h5>
                                                    <p class="card-text">"Increíble equipo en el centro veterinario. La atención y cuidado que brindaron a 
                                                        mi gato durante su cirugía fue excepcional. Siempre agradecida por su profesionalismo y compasión".</p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente2.jpg" class="card-img-top" alt="hombre y perro">
                                                <div class="card-body">
                                                    <h5 class="card-title">Juan R.</h5>
                                                    <p class="card-text">"El servicio de vacunatorio es impecable. Me explicaron detalladamente las opciones para mi perro y 
                                                        se aseguraron de que estuviera al día con todas las vacunas necesarias. ¡Gracias por velar por la salud de mi mejor amigo!" </p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente3.jpg" class="card-img-top" alt="conejo">
                                                <div class="card-body">
                                                    <h5 class="card-title">Laura M.</h5>
                                                    <p class="card-text"> "Mi conejillo de indias necesitaba análisis urgentes y el laboratorio del centro veterinario fue rápido y preciso.
                                                        El personal mostró un gran cuidado hacia las mascotas y un servicio eficiente". </p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente4.jpg" class="card-img-top" alt="perro">
                                                <div class="card-body">
                                                    <h5 class="card-title">Roberto G.</h5>
                                                    <p class="card-text">"Excelente experiencia en el quirófano. La cirugía de mi perro fue un éxito, y el equipo se tomó el 
                                                        tiempo de explicarme todo el proceso. Profesionales comprometidos y amables". </p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente5.jpg" class="card-img-top" alt="mujer y cachorro">
                                                <div class="card-body">
                                                    <h5 class="card-title">Patricia L.</h5>
                                                    <p class="card-text">"Mi cachorro tenía problemas digestivos y el equipo veterinario diagnosticó y trató el problema rápidamente. 
                                                        Siempre confiaré en ellos para la salud de mis mascotas".</p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente6.jpg" class="card-img-top" alt="perro">
                                                <div class="card-body">
                                                    <h5 class="card-title">Carlos P.</h5>
                                                    <p class="card-text">"El centro veterinario ha sido nuestra elección desde hace años. El servicio de emergencias nos 
                                                        salvó en más de una ocasión, mostrando una respuesta rápida y efectiva".</p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente7.jpg" class="card-img-top" alt="gata">
                                                <div class="card-body">
                                                    <h5 class="card-title">Carolina R.</h5>
                                                    <p class="card-text">"El laboratorio del centro veterinario nos brindó resultados precisos para el 
                                                        tratamiento de mi gata. La eficiencia y calidad del servicio son inigualables".</p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente8.jpg" class="card-img-top" alt="perro en bolso">
                                                <div class="card-body">
                                                    <h5 class="card-title">Francisco H.</h5>
                                                    <p class="card-text">"Increíble atención en el servicio de urgencias. Estaban listos 
                                                        para recibir a mi perro en medio de la noche y brindaron cuidados excepcionales. Los recomendaré siempre".</p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card foto" style= "text-align: center;">
                                                <img src="<?php echo $URL;?>/Images/cliente9.jpg" class="card-img-top" alt="gatos">
                                                <div class="card-body">
                                                    <h5 class="card-title">Andrea S.</h5>
                                                    <p class="card-text">"Mi experiencia en el centro veterinario ha sido siempre positiva. Desde las vacunas 
                                                        hasta las consultas, el personal demuestra un amor genuino por los animales. Mis gatos están en buenas manos".</p><br>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="productos ip-5" id="productos">
                <div class="container footer">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <h1>Nuestros Productos</h1>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        foreach($productos as $producto){
                            ?>
                            <div class="col-md-3"><br>
                                <div class="card foto" style="text-align: center;">
                                    <img src="<?=$URL."Images/productos/".$producto['imagen'];?>" class="card-img-top" alt="<?=$producto['imagen'];?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$producto['nombre'];?></h5>
                                        <p class="card-text"><?=$producto['descripcion'];?></p>
                                        <p class="card-text">$ <?=$producto['precio'];?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div><br>
            </section>

            <section class="galeria container" id="galeria">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h1>Galería</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 foto">
                        <img src="<?php echo $URL;?>/Images/michi.jpg" alt="gato" width="100%">
                    </div>
                    <div class="col-md-4 foto">
                        <img src="<?php echo $URL;?>/Images/perros.jpg" alt="perros" width="100%">
                    </div>
                    <div class="col-md-4 foto">
                        <img src="<?php echo $URL;?>/Images/perroP.jpg" alt="perro" width="100%">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4 foto">
                        <img src="<?php echo $URL;?>/Images/caballo.jpg" alt="caballo" width="100%">
                    </div>
                    <div class="col-md-4 foto">
                        <img src="<?php echo $URL;?>/Images/perros-lago.jpg" alt="perros" width="100%">
                    </div>
                    <div class="col-md-4 foto">
                        <img src="<?php echo $URL;?>/Images/perros-duermen.jpg" alt="perros" width="100%">
                    </div>
                </div><br>
            </section>
            

            <section class="direccion" style="margin: 25px;">
                <div class="container-fluid" style="text-align: center;">
                    <h1>Encuéntrenos:</h1>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d3277.2198778550596!2d-58.6410195!3d-34.7752396!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x95bcc4816dac031b%3A0xe0e67daa393c7731!2sHospital%20Veterinario%20Gonzalez%20Cat%C3%A1n!3m2!1d-34.775815066665935!2d-58.642232716083534!5e0!3m2!1ses!2sar!4v1702786908230!5m2!1ses!2sar" width="100%" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
            <div id="fin"></div>

<?php
include("layout/parte2.php");
include("admin/layout/mensaje.php");
?>