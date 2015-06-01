<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 20th May 2015
     *  Generate a record
     */
    
    $postcard_uid = $_POST['postcard_uid'];
    $head_url = $_POST['photo_head_url'];
    $back_url = $_POST['photo_back_url'];
    $making_time = $_POST['postcard_making_time'];
    
    require('fpdf.php');
    
    class PDF extends FPDF
    {
    }
    
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf -> DefOrientation = "landscape";
    
    $pdf->AliasNbPages();
    $pdf->AddPage("landscape","a6");                                // need A6 parameters, search "letter" in fpdf.php
    $pdf ->Image($head_url,0,0,-300); // need 775 privilage
    $pdf->AliasNbPages();
    $pdf->AddPage("landscape","a6");
    $pdf ->Image($back_url,0,0,-300);
    /*$pdf->SetFont('Times','',12);
    for($i=1;$i<=40;$i++)
        $pdf->Cell(0,10,'Printing line number '.$i,0,1);
    */
    /*
    $pdf->SetTextColor(170,170,170);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(82, 176, '', 0);
    $pdf->Cell(20, 176, 'SN: '.$postcard_uid, 0);
    $pdf->SetTextColor(200,200,200);
    */
    $pdf->Output($making_time.".pdf","D");
    
?>