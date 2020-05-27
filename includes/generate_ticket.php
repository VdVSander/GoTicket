<?php
  require '../TCPDF/tcpdf.php';
  $logo = '../GoTicketlogo.png';
  $ticketID = $_POST['ticketid'];
  $example = "123456987";

  //QR-Code properties
  $style = array(
    'border'=> 0,
    'padding'=> 'auto',
    'fgcolor'=> array(0,0,0),
    'bgcolor'=> array(255,255,255)
  );


  $pdf = new TCPDF('p','mm','A4');
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);
  $pdf->AddPage();
  $pdf->Cell(100,20,"Ticket nr: " . $example,1,0,'L');
  $pdf->Cell(30,50,"",0,0,'L');
  $pdf->write2DBarcode($example, 'QRCODE,H', 140, 5, 50, 50, $style, 'N');
  $pdf->Cell(130,15,"Evenement: Tester 1 2 3",1,1,'L');
  $pdf->Cell(130,15,"Datum: 29/05/2020",1,1,'L');
  $pdf->Cell(130,15,"Uur: 22:00 - 23:00",1,1,'L');
  $pdf->Cell(130,15,"Klant: Dieter Dietermans",1,1,'L');
  $pdf->Image($logo,82,210,50);
  $pdf->Output();
?>
