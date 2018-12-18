<?php

$ubi_nueva = $_GET["ubi_nueva"];
$ubi_ant = $_GET["ubi_antigua"];
$usr = $_GET["usuario"];

$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico")  or die ("Sin Conexion");

$sql = "Call updateEntrada('$ubi_ant', '$ubi_nueva', '$usr')";

$resul = mysqli_query($con, $sql);

echo $result; 

mysqli_close($con);
?>