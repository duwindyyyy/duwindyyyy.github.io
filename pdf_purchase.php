<?php
//include connection file
require_once 'connection.php';
require_once 'FPDF/fpdf.php';
$query = " select * from purchase ";
$result = mysqli_query($con,$query);



if(isset($_POST['btn_pdf'])){

    $pdf = new FPDF('l','mm','a4');
    $pdf->SetFont('arial','b',8);
    $pdf->AddPage();
    $pdf->Image('logo.png',10,1,30);
    $pdf->Ln(10);
    $pdf->Cell(280,10,'PURCHASE REPORT',6,0,'C');
    $pdf->Ln(15);
    $pdf->Cell(35,10,'Order No.','1','0','C');
    $pdf->Cell(35,10,'Purchase date','1','0','C');
    $pdf->Cell(35,10,'Supplier Name','1','0','C');
    $pdf->Cell(35,10,'Product Name','1','0','C');
    $pdf->Cell(35,10,'Quantity','1','0','C');
    $pdf->Cell(35,10,'Unit price','1','0','C');
    $pdf->Cell(35,10,'Total Price','1','0','C');
    $pdf->Cell(34,10,'Terms of Payment','1','0','C');
    $pdf->Ln();

    while($row=mysqli_fetch_assoc($result)){
    $pdf->Cell(35,10,$row['order_no'],'1','0','C');
    $pdf->Cell(35,10,$row['purchase_date'],'1','0','C');
    $pdf->Cell(35,10,$row['supplier_name'],'1','0','C');
    $pdf->Cell(35,10,$row['product_name'],'1','0','C');
    $pdf->Cell(35,10,$row['quantity'],'1','0','C');
    $pdf->Cell(35,10,$row['unit_price'],'1','0','C');
    $pdf->Cell(35,10,$row['total_price'],'1','0','C');
    $pdf->Cell(34,10,$row['payment_term'],'1','0','C');
    $pdf->Ln();
    
}

$pdf->Output("OfficeForm.pdf", "I");
}
 