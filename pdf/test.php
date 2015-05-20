<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
/*
function Header()
{
    // Logo
    //$this->Image('../Images/jingwen.jpeg',0,0,320);
    /*
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
    
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
*/
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf -> DefOrientation = "landscape";

$pdf->AliasNbPages();
$pdf->AddPage("landscape","a6");                                // need A6 parameters, search "letter" in fpdf.php
$pdf ->Image('../postcard-front/5552882337abd1432151354DDeT5.png',0,0,-300); // need 775 privilage
$pdf->AliasNbPages();
$pdf->AddPage("landscape","a6");
$pdf ->Image('../postcard-back/5552882337abd1432151354DDeT5.png',0,0,-300);
/*$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
*/
$pdf->Output("test.pdf","D");
//$pdf->Output("/..test.pdf","F");
?>