<?php
$ubi = $_GET["ubicacion"];
$usr = $_GET["usuario"];
$con = mysqli_connect("localhost","root","Avarti2018","fifon_pepsico")  or die ("Sin Conexion");
$sql = "select distinct (case when (select Ubicacion from Entradas where Ubicacion = REPLACE('$ubi',' ','') and CodigoAlmacen = Usuarios.idAlmacen)  is NULL  then '' else '1' end) as Ubicacion from Entradas inner join Usuarios on Usuarios.idAlmacen = Entradas.CodigoAlmacen where Usuarios.user_name = '$usr'";
$datos = Array();
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_object($result)){
    
   $datos[] = $row; 
}
echo json_encode($datos);
mysqli_close($con);

?>