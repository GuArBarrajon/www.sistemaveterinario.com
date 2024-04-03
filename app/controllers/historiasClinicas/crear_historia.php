<?php
include("../../config.php");
$idMasc = $_POST['id_mascota'];

    $descripcion = $_POST['descripcion'];
    $tratamiento = $_POST['tratamiento'];
    $fecha = $_POST['fecha2'];
    
    $sql = "INSERT INTO historias_clinicas (id_mascota, fecha_consulta, descripcion, tratamiento)
    VALUES (:id_mascota, :fecha, :descripcion, :tratamiento)";
    $query = $pdo->prepare($sql);
    $query->bindParam('id_mascota', $idMasc);
    $query->bindParam('fecha', $fecha);
    $query->bindParam('descripcion', $descripcion);
    $query->bindParam('tratamiento', $tratamiento);
            
    if($query->execute()){
        session_start();
        $_SESSION['mensaje'] = "Entrada registrada exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/admin/historiasClinicas/index.php?id_mascota='.$idMasc);
    }
    else{
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/admin/historiasClinicas/create.php?id_mascota='.$idMasc);
    }

?>