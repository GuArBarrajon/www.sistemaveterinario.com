<?php
include("app/config.php");
include("app/controllers/productos/listar_productos.php");
include("layout/parte1.php");
?>
    <!-- Scripts de Fullcalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>

        var a;
        var email_session = '<?php echo $emailSesion;?>';

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,

            events: 'app/controllers/reservas/cargar_turnos.php',

            dateClick: function(info) {
                a = info.dateStr;
                const fechaComoCadena = a;
                var numeroDia =new Date(fechaComoCadena).getDay();
                var dias = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];

                if(email_session == ""){
                    $('#modalSession').modal("show");
                }
                else{
                    if(numeroDia == 6){
                    alert("Los domingos no abrimos");
                    }
                    else{
                        $('#modalReservas').modal("show");
                        $('#nombreDia').html(dias[numeroDia] + " " + a);
                    }
                }
            },
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

<!-- Modal de Session-->
<div class="modal fade" id="modalSession" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Para reservar un turno debe iniciar sesión o registrarse</p>
            <div class="d-grid gap-2">
                    <a class="btn btn-primary"  type="button" href="login/index.php">Iniciar sesión</a>
                    <a class="btn btn-primary" type="button" href="login/registro.php">Registrarse</a>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Horarios-->
<div class="modal fade" id="modalReservas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno para el <span id="nombreDia"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-center">Mañana</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="btn_h1" type="button" data-bs-dismiss="modal">8.00</button>
                        <button class="btn btn-primary" id="btn_h2" type="button" data-bs-dismiss="modal">8.30</button>
                        <button class="btn btn-primary" id="btn_h3" type="button" data-bs-dismiss="modal">9.00</button>
                        <button class="btn btn-primary" id="btn_h4" type="button" data-bs-dismiss="modal">9.30</button>
                        <button class="btn btn-primary" id="btn_h5" type="button" data-bs-dismiss="modal">10.00</button>
                        <button class="btn btn-primary" id="btn_h6" type="button" data-bs-dismiss="modal">10.30</button>
                        <button class="btn btn-primary" id="btn_h7" type="button" data-bs-dismiss="modal">11.00</button>
                        <button class="btn btn-primary" id="btn_h8" type="button" data-bs-dismiss="modal">11.30</button>
                        <button class="btn btn-primary" id="btn_h9" type="button" data-bs-dismiss="modal">12.00</button>
                        <button class="btn btn-primary" id="btn_h10" type="button" data-bs-dismiss="modal">12.30</button>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5 class="text-center">Tarde</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="btn_h11" type="button" data-bs-dismiss="modal">13.00</button>
                        <button class="btn btn-primary" id="btn_h12" type="button" data-bs-dismiss="modal">13.30</button>
                        <button class="btn btn-primary" id="btn_h13" type="button" data-bs-dismiss="modal">14.00</button>
                        <button class="btn btn-primary" id="btn_h14" type="button" data-bs-dismiss="modal">14.30</button>
                        <button class="btn btn-primary" id="btn_h15" type="button" data-bs-dismiss="modal">15.00</button>
                        <button class="btn btn-primary" id="btn_h16" type="button" data-bs-dismiss="modal">15.30</button>
                        <button class="btn btn-primary" id="btn_h17" type="button" data-bs-dismiss="modal">16.00</button>
                        <button class="btn btn-primary" id="btn_h18" type="button" data-bs-dismiss="modal">16.30</button>
                        <button class="btn btn-primary" id="btn_h19" type="button" data-bs-dismiss="modal">17.00</button>
                        <button class="btn btn-primary" id="btn_h20" type="button" data-bs-dismiss="modal">17.30</button> 
                        <button class="btn btn-primary" id="btn_h21" type="button" data-bs-dismiss="modal">18.00</button>
                        <button class="btn btn-primary" id="btn_h22" type="button" data-bs-dismiss="modal">18.30</button>
                        <button class="btn btn-primary" id="btn_h23" type="button" data-bs-dismiss="modal">19.00</button>
                        <button class="btn btn-primary" id="btn_h24" type="button" data-bs-dismiss="modal">19.30</button>                     
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Formulario-->
<div class="modal fade" id="modalFormulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno para el <span id="nombreDia"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre de la mascota</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tipo de servicio</label>
                            <select name="" id="" class="form-control">
                                <option value="peluqueria">Peluquería</option>
                                <option value="laboratorio">Laboratorio</option>
                                <option value="estudios">Estudios</option>
                                <option value="consulta">Consulta</option>
                                <option value="vacunatorio">Vacunatorio</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Fecha de Reserva</label>
                            <input type="text" class="form-control" id="fechaReserva" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Hora</label>
                            <input type="text" class="form-control" id="horaReserva" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </div>
</div>


<!-- Reserva de Horarios-->
<script>
    $('#btn_h1').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        var h1 = "8.00";
        $('#horaReserva').val(h1);
    });
</script>