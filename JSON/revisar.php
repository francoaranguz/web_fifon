<?php
$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico")  or die ("Sin Conexion");

$sql = "select idEntrada, Ubicacion, Estado, CodigoProducto, DescripcionProducto, Almacen, CodigoAlmacen, FechaVencimiento, Pais, Usuario from Entradas";

$resul = mysqli_query($con, $sql);

while($row = mysqli_fetch_object($resul)){
   $datos[] = $row; 
}
echo json_encode($datos);
mysqli_close($con);
?>