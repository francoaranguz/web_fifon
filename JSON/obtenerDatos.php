<?php
$ubi = $_GET["producto"];
$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico") or die ("Sin Conexion");
$sql = "select  concat(Ubicacion, '  ', cast(FechaVencimiento as DATE)) as Ubicacion from Entradas where CodigoProducto = '$ubi' order by FechaVencimiento asc limit 2";
$datos = Array();
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_object($result)){
    
   $datos[] = $row; 
}
echo json_encode($datos);
mysqli_close($con);

?>