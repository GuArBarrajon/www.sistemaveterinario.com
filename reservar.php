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

                //Valida si es un usuario registrado o no
                if(email_session == ""){
                    $('#modalSession').modal("show");
                }
                else{
                    //Valida si no es domingo
                    if(numeroDia == 6){
                    alert("Los domingos no abrimos");
                    }
                    else{

                        //Valida si no es una fecha anterior a la actual
                        var anio = new Date().getFullYear(); 
                        var mes = new Date().getMonth() + 1; 
                        if(mes < 10){mes = "0"+mes;}
                        var dia = new Date().getDate(); 
                        var hoy = anio + "-" + mes + "-" + dia;

                        if(hoy <= a){
                            $('#modalReservas').modal("show");
                            $('#nombreDia').html(dias[numeroDia] + " " + a);
                            $('#nombreDia2').html(dias[numeroDia] + " " + a);

                            //Para verificar los horarios disponibles
                            var fecha = info.dateStr;
                            var resultado;
                            var url = "app/controllers/reservas/verificar_horario.php" ;

                            $.get(url, {fecha:fecha}, function(datos){
                                resultado = datos;
                                $('#respuesta_horario').html(resultado);
                            });
                        }else{
                            alert ("No se puede solicitar turno. Este día ya pasó");
                        }
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


<?php
include("layout/parte2.php");
include("admin/layout/mensaje.php");
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
<div class="modal fade" id="modalReservas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno para el <span id="nombreDia"></span></h1>
        </div>
        <div class="modal-body">
            <div class="row">
                <div id="respuesta_horario"></div> <!-- Se manda la respuesta de AJAX para deshabilitar horarios ya tomados -->
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
            <a href="" class="btn btn-secondary">
                Elija otro día
            </a>
        </div>
        </div>
    </div>
</div>

<!-- Modal Formulario-->
<div class="modal fade" id="modalFormulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno para el <span id="nombreDia2"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="<?php echo $URL;?>app/controllers/reservas/controller_reservas.php" method="post">
                <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="">Nombre del usuario</label>
                            <input type="text" class="form-control" value="<?php echo $nombreUsuarioSesion." ".$apellidoUsuarioSesion?>" disabled>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" value="<?php echo $emailSesion?>" disabled>
                            <input type="text" name="idUsuario" value="<?php echo $idUsuarioSesion?>" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="">Fecha de Reserva</label>
                            <input type="text" class="form-control" id="fechaReserva" disabled>
                            <input type="text" name="fechaReserva"  class="form-control" id="fechaReserva2" hidden>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="">Hora</label>
                            <input type="text" class="form-control" id="horaReserva" disabled>
                            <input type="text" name="horaReserva"  class="form-control" id="horaReserva2" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="">Nombre de la mascota</label>
                            <input type="text" class="form-control" name="nombreMascota" required>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="">Tipo de servicio</label>
                            <select name="servicio" id="" class="form-control">
                                <option value="Peluqueria">Peluquería</option>
                                <option value="Laboratorio">Laboratorio</option>
                                <option value="Estudios">Estudios</option>
                                <option value="Consulta">Consulta</option>
                                <option value="Vacunatorio">Vacunatorio</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        
        </div>
    </div>
</div>


<!-- Reserva de Horarios-->
<script>
    $('#btn_h1').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h1 = "8.00";
        $('#horaReserva').val(h1);
        $('#horaReserva2').val(h1);
    });

    $('#btn_h2').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var btn_h2 = "8.30";
        $('#horaReserva').val(h2);
        $('#horaReserva2').val(h2);
    });

    $('#btn_h3').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h3 = "9.00";
        $('#horaReserva').val(h3);
        $('#horaReserva2').val(h3);
    });

    $('#btn_h4').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h4 = "9.30";
        $('#horaReserva').val(h4);
        $('#horaReserva2').val(h4);
    });

    $('#btn_h5').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h5 = "10.00";
        $('#horaReserva').val(h5);
        $('#horaReserva2').val(h5);
    });

    $('#btn_h6').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h6 = "10.30";
        $('#horaReserva').val(h6);
        $('#horaReserva2').val(h6);
    });

    $('#btn_h7').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h7 = "11.00";
        $('#horaReserva').val(h7);
        $('#horaReserva2').val(h7);
    });

    $('#btn_h8').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h8 = "11.30";
        $('#horaReserva').val(h8);
        $('#horaReserva2').val(h8);
    });

    $('#btn_h9').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h9 = "12.00";
        $('#horaReserva').val(h9);
        $('#horaReserva2').val(h9);
    });

    $('#btn_h10').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h10 = "12.30";
        $('#horaReserva').val(h10);
        $('#horaReserva2').val(h10);
    });

    $('#btn_h11').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h11 = "13.00";
        $('#horaReserva').val(h11);
        $('#horaReserva2').val(h11);
    });

    $('#btn_h12').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h12 = "13.30";
        $('#horaReserva').val(h12);
        $('#horaReserva2').val(h12);
    });

    $('#btn_h13').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h13 = "14.00";
        $('#horaReserva').val(h13);
        $('#horaReserva2').val(h13);
    });

    $('#btn_h14').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h14 = "14.30";
        $('#horaReserva').val(h14);
        $('#horaReserva2').val(h14);
    });

    $('#btn_h15').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h15 = "15.00";
        $('#horaReserva').val(h15);
        $('#horaReserva2').val(h15);
    });

    $('#btn_h16').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h16 = "15.30";
        $('#horaReserva').val(h16);
        $('#horaReserva2').val(h16);
    });

    $('#btn_h17').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h17 = "16.00";
        $('#horaReserva').val(h17);
        $('#horaReserva2').val(h17);
    });

    $('#btn_h18').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h18 = "16.30";
        $('#horaReserva').val(h18);
        $('#horaReserva2').val(h18);
    });

    $('#btn_h19').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h19 = "17.00";
        $('#horaReserva').val(h19);
        $('#horaReserva2').val(h19);
    });

    $('#btn_h20').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h20 = "17.30";
        $('#horaReserva').val(h20);
        $('#horaReserva2').val(h20);
    });

    $('#btn_h21').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h21 = "18.00";
        $('#horaReserva').val(h21);
        $('#horaReserva2').val(h21);
    });

    $('#btn_h22').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h22 = "18.30";
        $('#horaReserva').val(h22);
        $('#horaReserva2').val(h22);
    });

    $('#btn_h23').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h23 = "19.00";
        $('#horaReserva').val(h23);
        $('#horaReserva2').val(h23);
    });

    $('#btn_h24').click(function(){
        $('#modalFormulario').modal("show");

        $('#fechaReserva').val(a);
        $('#fechaReserva2').val(a);
        var h24 = "19.30";
        $('#horaReserva').val(h24);
        $('#horaReserva2').val(h24);
    });
</script>