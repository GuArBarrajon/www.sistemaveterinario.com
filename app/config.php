<?php
define('APP_NAME', 'Centro Veterinario');
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'veterinaria');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor, username: USUARIO, password: PASSWORD);
    $pdo->exec("set names utf8");
}catch (PDOException $e){
    echo "Error en la conexión con la base de datos";
}


$URL= "http://localhost/www.sistemaveterinario.com/";
?>