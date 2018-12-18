<?php error_reporting( E_ALL );
$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico") or die ("Sin Conexion");


$sql = "select idEntrada, Ubicacion, Estado, CodigoProducto, DescripcionProducto, Almacen, CodigoAlmacen, FechaVencimiento from Entradas";

$resul = mysqli_query($con, $sql);


while($row = mysqli_fetch_object($resul)){
    $idEntrada=$row['idEntrada'];
    $Ubicacion=$row['Ubicacion'];
    $Estado=$row['Estado'];
    $CodigoProducto=$row['CodigoProducto'];
    $DescripcionProducto=$row['DescripcionProducto'];
    $Almacen=$row['Almacen'];
    $CodigoAlmacen=$row['CodigoAlmacen'];
    $FechaVencimiento=$row['FechaVencimiento'];
    

};

echo json_decode($Ubicacion);
mysqli_close($con);
?>