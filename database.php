<?php

$server = 'localhost';
$username = 'root';
$password = 'Avarti2018';
$database = 'fifon_pepsico';

try {
    $conn = mysqli_connect($server, $username, $password, $database);
} catch (Exception $e) {
    die('Conexion fallida: '.$e->getMessage());
}

?>