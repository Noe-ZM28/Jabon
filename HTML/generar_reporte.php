<?php
include_once "funciones.php";
if ($_SESSION['username'] == "") {
    header("Location: formulario_inicio_sesion.php");
}/*
$HEADDER = obtenerVariableDelEntorno("HEADDER");
include_once $HEADDER;*/


//header("Location: formulario_usuario.php");
#haqcer algo con los datos de compra
$productos = obtenerProductosEnCarrito();
$datosUsuario = obtenerDatosUsuario($_SESSION['username']);


$nickUsuario = "";
$nombreUsuario = "";
$emailUsuario = "";
$numeroUsuario = "";

foreach ($datosUsuario as $dato) {
    $nickUsuario = $dato->usuario;
    $nombreUsuario = $dato->nombre_apellidos;
    $emailUsuario = $dato->email;
    $numeroUsuario = $dato->numero;
}


$pdf = new responsive_TablePDF();
$pdf->AddPage();

//Margen decorativo iniciando en 0, 0
//$pdf->Image('..\Multimedia\Imagenes\logo_jabon.jpeg', 0,0, 210, 295, 'JPG');
 
//Imagen derecha
$pdf->Image('..\Multimedia\Imagenes\logo_jabon.jpeg', 155, 27, 25, 22, 'JPG');
 
//Texto de Título
$pdf->SetFont('Arial','B', 15);
$pdf->SetXY(60, 25);
$pdf->MultiCell(75, 5, utf8_decode('Jabones Magueli'), 0, 'J');
 
//Texto Explicativo
$pdf->SetFont('Courier','', 13);
$pdf->SetXY(75, 45);
$pdf->MultiCell(100, 4, utf8_decode('Reporte de compra'), 0, 'J');


 
//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
 
//Fecha
$today = date("F j, Y"); // March 10, 2001
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(140,60);
$pdf->Cell(15, 8, 'FECHA: '.$today, 0, 'L');
$pdf->Line(157, 65.5, 190, 65.5);
 
//Nombre //Apellidos //Email //TELEFONO
$pdf->SetXY(25, 70);
$pdf->Cell(20, 8, utf8_decode('Nombre de usuario: '.$nickUsuario), 0, 'L');
$pdf->Line(60, 75.5, 120, 75.5);
//*****
$pdf->SetXY(25,80);
$pdf->Cell(19, 8, utf8_decode('Nombre completo: '.$nombreUsuario), 0, 'L');
$pdf->Line(60, 85.5, 120, 85.5);
//*****
$pdf->SetXY(25, 90);
$pdf->Cell(19, 8, utf8_decode('E-mail: '.$emailUsuario), 0, 'L');
$pdf->Line(40, 95.5, 90, 95.5);
//*****
$pdf->SetXY(110, 90);
$pdf->Cell(17, 8, utf8_decode('TELÉFONO: '.$numeroUsuario), 0, 'L');
$pdf->Line(135, 95.5, 170, 95.5);

//Texto Explicativo
$pdf->SetFont('Courier','', 13);
$pdf->SetXY(85, 100);
$pdf->MultiCell(100, 4, utf8_decode('Productos'), 0, 'J');


$pdf->SetXY(10, 110);
$pdf->SetFont('Arial','B',12);


$width_cell=array(30, 120, 20);


$pdf->SetWidths ($width_cell);
$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell(20,10,utf8_decode('Imagen'),1,0,'J',true); // First header column 
$pdf->Cell($width_cell[0],10,utf8_decode('Nombre'),1,0,'J',true); // First header column 
$pdf->Cell($width_cell[1],10,utf8_decode('Descripción'),1,0,'J',true); // Second header column
$pdf->Cell($width_cell[2],10,'Precio',1,1,'J',true); // Third header column 
//// header is over ///////

$pdf->SetFont('Arial','',10);
// First row of data 

$total = 0;
foreach ($productos as $producto)  {
    $total += $producto->precio;
  /*$pdf->Cell($width_cell[0],10,utf8_decode($producto->nombre),1,0,'J',false); // First column of row 1 
    $pdf->Cell($width_cell[1],10,utf8_decode($producto->descripcion),1,0,'J',false); // Second column of row 1 
    $pdf->Cell($width_cell[2],10,$producto->precio,1,1,'J',false); // Third column of row 1 */
    $pdf->Cell(20,10, $pdf->Image($producto->imagen, $pdf->GetX(), $pdf->GetY(),20),0);
    $pdf->Row(array(
                    utf8_decode($producto->nombre),
                    utf8_decode($producto->descripcion),
                    "$".number_format($producto->precio, 2)));
}

$pdf->Cell(array_sum($width_cell),10,'Total',1,0,'R',false); // Third column of row 1 
$pdf->Cell($width_cell[2],10,"$".number_format($total, 2),1,1,'J',false); // Third column of row 1 

// Clean any content of the output buffer
ob_end_clean();

//$pdf->Output(); //Salida al navegador
$path_file = '../Archivos/Compra_Usuario_'.$nickUsuario.'_'.date("m.d.y").'.pdf';
$pdf->Output($path_file, 'F'); //Descarga del archivo

header("Location: terminar_compra.php?varPath=$path_file");
?>
