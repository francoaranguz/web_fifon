<?php

$ubi = $_GET["ubicacion"];
$coment = $_GET["comentario"];
$usr = $_GET["usuario"];

$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico")  or die ("Sin Conexion");

$sql = "Call insertSalida('$ubi', '$coment', '$usr')";

$resul = mysqli_query($con, $sql);

echo $result; 

mysqli_close($con);
?>