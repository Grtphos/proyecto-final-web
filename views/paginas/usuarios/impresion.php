<?php
//script de impresion

class PDF extends FPDF {
// Cabecera de página
    function Header()
    {
        // Logo
        $this->Image(RUTA_URL . '/images/logo.png',10,10,40);
        // Arial bold 15
        $this->SetFont('Arial','B',16);
        // Movernos a la derecha
        $this->SetXY(32,12);
        // Título
        $this->Cell(240,10,utf8_decode('Implementos y Maquinaria Agricola "LOYA"'),0,1,'C');
        // Salto de línea
        $this->SetXY(10,35);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new FPDF;
$pdf->AliasNbPages();
$pdf->AddPage('L');

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
