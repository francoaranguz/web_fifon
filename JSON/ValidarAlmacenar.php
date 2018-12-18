<?php
$ubi = $_GET["ubicacion"];
$usr = $_GET["usuario"];
$prod = $_GET["producto"];
$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico")  or die ("Sin Conexion");
$sql = "select (select Ubicacion from Entradas where Ubicacion = REPLACE('$ubi', ' ','') and Usuario = '$usr') as Ubicacion, (select produ_codigo from Productos where produ_codigo='$prod') as Producto limit 1 ";
$datos = Array();
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_object($result)){
    
   $datos[] = $row; 
}

echo json_encode($datos);
mysqli_close($con);

?>