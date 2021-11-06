<?php
//include connection file
require_once 'connection.php';
require_once 'FPDF/fpdf.php';
$query = " select * from sales ";
$result = mysqli_query($con,$query);



if(isset($_POST['btn_pdf'])){

    $pdf = new FPDF('l','mm','a4');
    $pdf->SetFont('arial','b',8);
    $pdf->AddPage();
    $pdf->Image('logo.png',10,1,30);
    $pdf->Ln(10);
    $pdf->Cell(280,10,'SALES REPORT',6,0,'C');
    $pdf->Ln(15);
    $pdf->Cell(35,10,'Receipt No.','1','0','C');
    $pdf->Cell(35,10,'Customer Name','1','0','C');
    $pdf->Cell(35,10,'Category','1','0','C');
    $pdf->Cell(35,10,'Item Name','1','0','C');
    $pdf->Cell(35,10,'Item Quality','1','0','C');
    $pdf->Cell(35,10,'Total Amount','1','0','C');
    $pdf->Cell(35,10,'Status','1','0','C');
    $pdf->Cell(34,10,'Due date','1','0','C');
    $pdf->Ln();

    while($row=mysqli_fetch_assoc($result)){
    $pdf->Cell(35,10,$row['receipt_no'],'1','0','C');
    $pdf->Cell(35,10,$row['customer_name'],'1','0','C');
    $pdf->Cell(35,10,$row['category'],'1','0','C');
    $pdf->Cell(35,10,$row['Item_name'],'1','0','C');
    $pdf->Cell(35,10,$row['item_quantity'],'1','0','C');
    $pdf->Cell(35,10,$row['total_amount'],'1','0','C');
    $pdf->Cell(35,10,$row['status'],'1','0','C');
    $pdf->Cell(34,10,$row['due_date'],'1','0','C');
    $pdf->Ln();
    
}

    $pdf->Output();
}
 