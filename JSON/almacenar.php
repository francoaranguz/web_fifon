<?php

$pro = $_GET["producto"];
$ubi = $_GET["ubicacion"];
$fech = $_GET["fechav"];
$usr = $_GET["usuario"];

$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico") or die ("Sin Conexion");

$sql = "Call insertEntrada('$fech', '$pro', '$ubi', '$usr')";

$resul = mysqli_query($con, $sql);

echo $result; 

mysqli_close($con);
?>