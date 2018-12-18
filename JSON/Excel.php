<?php
//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
require 'conexion.php';

//Consulta
$sql = "Select idEntrada, Ubicacion, Estado, CodigoProducto, DescripcionProducto, Almacen, CodigoAlmacen, FechaVencimiento, Usuario, FechaMovimiento from Entradas";
$resultado = $mysqli->query($sql);
$fila = 7; //Establecemos en que fila inciara a imprimir los datos

$gdImage = imagecreatefrompng('images/logo.png');//Logotipo

//Objeto de PHPExcel
$objPHPExcel  = new PHPExcel();

//Propiedades de Documento
$objPHPExcel->getProperties()->setCreator("Jonathan Avila")->setDescription("Reporte de Entradas");

//Establecemos la pestaña activa y nombre a la pestaña
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Entradas");

$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(100);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$estiloTituloReporte = array(
'font' => array(
'name'      => 'Arial',
'bold'      => true,
'italic'    => false,
'strike'    => false,
'size' =>13
),
'fill' => array(
'type'  => PHPExcel_Style_Fill::FILL_SOLID
),
'borders' => array(
'allborders' => array(
'style' => PHPExcel_Style_Border::BORDER_NONE
)
),
'alignment' => array(
'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
)
);

$estiloTituloColumnas = array(
'font' => array(
'name'  => 'Arial',
'bold'  => true,
'size' =>10,
'color' => array(
'rgb' => 'FFFFFF'
)
),
'fill' => array(
'type' => PHPExcel_Style_Fill::FILL_SOLID,
'color' => array('rgb' => '538DD5')
),
'borders' => array(
'allborders' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN
)
),
'alignment' =>  array(
'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
)
);

$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
'font' => array(
'name'  => 'Arial',
'color' => array(
'rgb' => '000000'
)
),
'fill' => array(
'type'  => PHPExcel_Style_Fill::FILL_SOLID
),
'borders' => array(
'allborders' => array(
'style' => PHPExcel_Style_Border::BORDER_THIN
)
),
'alignment' =>  array(
'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
)
));

$objPHPExcel->getActiveSheet()->getStyle('A1:J4')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A6:J6')->applyFromArray($estiloTituloColumnas);

$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE ENTRADAS');
$objPHPExcel->getActiveSheet()->mergeCells('B3:H3');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('A6', 'ID');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->setCellValue('B6', 'UBICACION');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'ESTADO');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'COD.PRODUCTO');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'DESC PRODUCTO');
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'ALMACEN');
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'COD.ALMACEN');
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$objPHPExcel->getActiveSheet()->setCellValue('H6', 'F.VENCIMIENTO');
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'USUARIO');
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
$objPHPExcel->getActiveSheet()->setCellValue('J6', 'F.MOVIMIENTO');


//Recorremos los resultados de la consulta y los imprimimos
while($rows = $resultado->fetch_assoc()){
	
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['idEntrada']);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Ubicacion']);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Estado']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['CodigoProducto']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['DescripcionProducto']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Almacen']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['CodigoAlmacen']);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['FechaVencimiento']);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Usuario']);
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['FechaMovimiento']);

		
	
	$fila++; //Sumamos 1 para pasar a la siguiente fila
}

$fila = $fila-1;
	
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:J".$fila);
	
$filaGrafica = $fila+2;

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Entradas.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

$objWriter->save('php://output');
?>