<?php
include("../../config.php");

$cargo = $_GET['cargo'];

$servicio = $_POST['servicio'];
switch ($servicio){
    case "Peluqueria": $color = '#5DADE2'; break;
    case "Laboratorio": $color = '#EDBB99'; break;
    case "Estudios": $color = '#76D7C4'; break;
    case "Consulta": $color = '#D68910'; break;
    case "Vacunatorio": $color = '#9B59B6 '; break;
}

$sql = "INSERT INTO reservas (id_usuario, nombre_mascota, tipo_servicio, fecha, hora, title, start, end, color, fyh_creacion, fyh_actualizacion) 
VALUES (:id_usuario, :nombre_mascota, :tipo_servicio, :fecha, :hora, :title, :start, :end, :color, :fyh_creacion, :fyh_actualizacion)";
$query = $pdo->prepare($sql);
$query->bindParam('id_usuario', $_POST['idUsuario']);
$query->bindParam('nombre_mascota', $_POST['nombreMascota']);
$query->bindParam('tipo_servicio', $servicio);
$query->bindParam('fecha', $_POST['fechaReserva']);
$query->bindParam('hora', $_POST['horaReserva']);
$query->bindParam('title', $_POST['servicio']);
$query->bindParam('start', $_POST['fechaReserva']);
$query->bindParam('end', $_POST['fechaReserva']);
$query->bindParam('color', $color);
$query->bindParam('fyh_creacion', $fechaHora);
$query->bindParam('fyh_actualizacion', $fechaHora);
            
if($query->execute()){
        //Primero busco el mail del usuario
        $id_usuario = $_POST['idUsuario'];
        include("../Usuarios/ver_datos.php");
    
        //se manda un email con el turno
        $fecha = date ('d/m/Y', strtotime($_POST['fechaReserva']));
        $horario = $_POST['horaReserva'];
        $mascota = $_POST['nombreMascota'];
    
        $para      = $email;
        $asunto    = 'Turno solicitado en el centro veterinario';
        $body   = <<<HTML
                <h1>Reserva de turno en el centro veterinario</h1>
                <p>Hola, este es un correo generado para recordarle que usted tiene un turno reservado con nosotros el día 
                    $fecha a las $horario hs para $mascota.</p> 
                <p>En caso de no poder asistir le rogamos se comunique con nosotros.</p>
                HTML;
        $cabeceras = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf8'. "\r\n" .
        'From: veterinariacudi@outlook.com' . "\r\n" .
        'Reply-To: veterinariacudi@outlook.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        mail($para, $asunto, $body, $cabeceras);

    session_start();
    $_SESSION['mensaje'] = "Se ha registrado exitosamente";
    $_SESSION['icono'] = "success";
    if($cargo == 'administrador'){
        header('Location: '.$URL.'/admin/turnos');
    }
    else{
        header('Location: '.$URL.'reservar.php');
    }
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    if($cargo == 'administrador'){
        header('Location: '.$URL.'/admin/turnos');
    }
    else{
        header('Location: '.$URL.'reservar.php');
    }
}

?>