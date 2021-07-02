<?php
//script de impresion
$pdf = new FPDF;
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
$pdf->Image(RUTA_URL . '/images/logo.png',10,10,40);
$pdf->SetXY(32,12);
$pdf->Cell(240,10,utf8_decode('Implementos y Maquinaria Agricola "LOYA"'),0,1,'C');
$pdf->SetXY(10,35);
#para poner color de relleno
$pdf->SetFillColor(90,90,90);
$pdf->SetTextColor(255);
$pdf->Cell(270,10,'Listado de Usuarios',1,1,'C',1); //con el ultimo 1 activamos el setfillcolor
$pdf->Ln(2);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0);
    
   $pdf->SetX(10);
   $pdf->Cell(10,10,'ID',1,0,'L');
   $pdf->Cell(20,10,'Id Usuario',1,0,'L');
   $pdf->Cell(100,10,'Nombre',1,0,'L');
   $pdf->Cell(35,10,'R.F.C',1,0,'L');
   $pdf->Cell(75,10,'Email',1,0,'L');
   $pdf->Cell(30,10,'Telefono',1,1,'L');
    
    foreach($datos['usuarios'] as $registro){
      
        $pdf->SetX(10);
        $pdf->Cell(10,10,$registro['id'],1,0,'L');
        $pdf->Cell(20,10,$registro['idUsuario'],1,0,'L');
        $pdf->Cell(100,10,utf8_decode($registro['nombreUsuario']),1,0,'L');
        $pdf->Cell(35,10,$registro['rfcUsuario'],1,0,'L');
        $pdf->Cell(75,10,$registro['emailUsuario'],1,0,'L');
        $pdf->Cell(30,10,$registro['telefonoUsuario'],1,1,'L');
     
     
   }
    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',16);
    $pdf->SetX(10);
    $pdf->SetFillColor(90,90,90);
    $pdf->SetTextColor(255);
    $pdf->Cell(270,10,'Fin del Listado de Usuarios',1,1,'C',1);
    $pdf->SetTextColor(0);
    $pdf->Output();
