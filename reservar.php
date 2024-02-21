<?php
include("app/config.php");
include("app/controllers/productos/listar_productos.php");
include("layout/parte1.php");
?>
    <!-- Scripts de Fullcalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: 'app/controllers/reservas/cargar_turnos.php'
        });
        calendar.render();
        });
    </script>

            <section class="servicios p-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center footer">
                            <br>
                            <h1>Solicitar Turno</h1>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-8" id='calendar'></>><br>

                        </div>

                        <div class="col-md-4"><br><br>
                            <img src="Images/dog.webp" alt="Perro herido" width="100%">
                        </div>
                    </div>
                </div><br>
            </section>


            <section class="contactos">
                <div class="container p-5">
                    <h1 style=" text-align: center;">Contáctenos:</h1>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    Escríbanos aquí
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group p-1">
                                            <label for="">Nombre</label>
                                            <input type="text" class="form-control" placeholder="Ingrese su nombre">
                                        </div>
                                        <div class="form-group p-1">
                                            <label for="">Apellido</label>
                                            <input type="text" class="form-control" placeholder="Ingrese su apellido">
                                        </div>
                                        <div class="form-group p-1">
                                            <label for="">Correo</label>
                                            <input type="email" class="form-control" placeholder="Ingrese su correo electrónico">
                                        </div>
                                        <div class="form-group p-1">
                                            <label for="">Comentario</label>
                                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary m-1" type="submit">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php
include("layout/parte2.php");
?>