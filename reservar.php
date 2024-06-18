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
                        if(dia < 10){dia = "0"+dia;}
                        var hoy = anio + "-" + mes + "-" + dia;

                        if(hoy <= a){
                            $('#modalReservas').modal("show");
                            $('#nombreDia').html(dias[numeroDia] + " " + a);
                            $('#nombreDia2').html(dias[numeroDia] + " " + a);
                            $('#nombreDia3').html(dias[numeroDia] + " " + a);

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
                        <div class="col-md-8" id='calendar'></><br>

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
                        <?php
                            $btn = 0;
                            for($h = 8; $h <= 12; $h = $h + 1){
                                $btn = $btn + 1;?>
                                <button class="btn btn-primary" id="btn_h<?php echo $btn;?>" type="button" data-bs-dismiss="modal"><?php echo $h.'.00';?></button>
                                <button class="btn btn-primary" id="btn_h<?php $btn = $btn + 1; echo $btn;?>" type="button" data-bs-dismiss="modal"><?php echo $h.'.30';?></button>
                            <?php
                            }
                        ?>  
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5 class="text-center">Tarde</h5>
                    <div class="d-grid gap-2">
                        <?php
                            $btn = 10;
                            for($h = 13; $h <= 19; $h = $h + 1){
                                $btn = $btn + 1;?>
                                <button class="btn btn-primary" id="btn_h<?php echo $btn;?>" type="button" data-bs-dismiss="modal"><?php echo $h.'.00';?></button>
                                <button class="btn btn-primary" id="btn_h<?php $btn = $btn + 1; echo $btn;?>" type="button" data-bs-dismiss="modal"><?php echo $h.'.30';?></button>
                            <?php
                            }
                        ?>                    
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

<!-- Modal Formulario Cliente-->
<div class="modal fade" id="modalFormulario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno para el <span id="nombreDia2"></span></h1>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="<?php echo $URL;?>app/controllers/reservas/controller_reservas.php?cargo=<?php echo $cargoUsuarioSesion; ?>" method="post">
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
                        <a href="" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        
        </div>
    </div>
</div>

<!-- Modal Formulario administrador-->
<div class="modal fade" id="modalFormulario2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php 
    //recupero id de usuario y lo busco
    $id_usuario = $_GET['id_usuario'];
    include("app/controllers/Usuarios/ver_datos.php");
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar turno para el <span id="nombreDia3"></span></h1>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="<?php echo $URL;?>app/controllers/reservas/controller_reservas.php?cargo=<?php echo $cargoUsuarioSesion; ?>" method="post">
                <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="">Nombre del usuario</label>
                            <input type="text" class="form-control" value="<?php echo $nombres." ".$apellido?>" disabled>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" value="<?php echo $email?>" disabled>
                            <input type="text" name="idUsuario" value="<?php echo $id_usuario?>" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="">Fecha de Reserva</label>
                            <input type="text" class="form-control" id="fechaReserva3" disabled>
                            <input type="text" name="fechaReserva"  class="form-control" id="fechaReserva4" hidden>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="">Hora</label>
                            <input type="text" class="form-control" id="horaReserva3" disabled>
                            <input type="text" name="horaReserva"  class="form-control" id="horaReserva4" hidden>
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
                        <a href="" class="btn btn-secondary">Cancelar</a>
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
    // A continuación una función para manejar el evento click de los botones
    function handleButtonClick(hora) {
        //según sea administrador o cliente llama al formulario adecuado
        var cargo = '<?php echo $cargoUsuarioSesion;?>';
        if (cargo == "cliente"){
            $('#modalFormulario').modal("show");
            $('#fechaReserva').val(a);
            $('#fechaReserva2').val(a);
            $('#horaReserva').val(hora);
            $('#horaReserva2').val(hora);
        }
        else{
            $('#modalFormulario2').modal("show");
            $('#fechaReserva3').val(a);
            $('#fechaReserva4').val(a);
            $('#horaReserva3').val(hora);
            $('#horaReserva4').val(hora);
        }
    }

    // Asignar el evento click a todos los botones usando un selector de clase común
    $('[id^=btn_h]').click(function() {
        // Obtener el valor de la hora del id del botón
        var i = $(this).attr('id').replace('btn_h', '');
        // se crea un array con los formatos de horas
        var h = 8;
        var horario = [];
        for(var x = 0; x < 24; x++){
            var hour = h.toString()
            horario[x] = hour.concat(".00");
            x++;
            horario[x] = hour.concat(".30");
            h++;
        }
        // Llamar a la función de manejo del botón con la hora adecuada
        handleButtonClick(horario[i-1]);
    });
</script>