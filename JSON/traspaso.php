<?php
$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico")  or die ("Sin Conexion");
$con2 = mysqli_connect("104.198.141.6","root","Avarti2018","fifon_analisis") or die ("Sin Conexion");

$sql3 = "delete from analisisEntradas";
$result3 = mysqli_query($con2,$sql3);


$sql = "select idEntrada, Ubicacion, Estado, CodigoProducto, DescripcionProducto, Almacen, CodigoAlmacen, FechaVencimiento, Pais, Usuario from Entradas";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
  $idEntrada = $row[0];
  $Ubicacion = $row[1];
  $Estado = $row[2];
  $CodigoProducto = $row[3];
  $DescripcionProducto = $row[4];
  $Almacen = $row[5];
  $CodigoAlmacen = $row[6];
  $FechaVencimiento = $row[7];
  $Pais = $row[8];
  $Usuario = $row[9];
  
  
    $sql2 = "insert into analisisEntradas values('$idEntrada','$Ubicacion','$Estado','$CodigoProducto','$DescripcionProducto','$Almacen','$CodigoAlmacen','$FechaVencimiento','$Pais','$Usuario')";
    $result2 = mysqli_query($con2,$sql2);
  
  
    }
  // Free result set
  mysqli_free_result($result);
}


mysqli_close($con);
mysqli_close($con2);
?>