<?php
include ('../../config.php');

//datos que llegan del formulario
$email = $_POST['email'];
$contraseña = $_POST['password'];

//consulta a la base de datos por email ingresado
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll();

//se recupara la contraseña de la base de datos para ese email
$contador = 0;
foreach($usuarios as $usuario){
    $contador = $contador + 1;
    $password_tabla = $usuario['password'];
}

/*Verifica si la contraseña ingresada es igual a la encriptada en la base de datos*/
if ($contador > 0 && password_verify($contraseña, $password_tabla)){
    session_start();
    $_SESSION['session email'] = $email;
    header('Location: '.$URL.'/admin');
}
else{
    echo '<script>alert("Los datos no son correctos"); window.location="../../../login";</script>';
}

?>