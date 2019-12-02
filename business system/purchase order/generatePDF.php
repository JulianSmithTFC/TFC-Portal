<?php

include '../config.php';

// Get the customer ID.
$poID = intval($_GET['id']);

$query = "SELECT * FROM purchaseorders  WHERE poID = ('$poID')";
$result = mysqli_query($conn, $query);

include '../../libraries/fpdf181/fpdf.php';
include '../../libraries/fpdf-easytable/exfpdf.php';
include '../../libraries/fpdf-easytable/easyTable.php';
$pdf=new exFPDF();
while ($row = mysqli_fetch_array($result))
{

    $pdf->AddPage();
    $pdf->SetFont('helvetica','',10);
    $table1=new easyTable($pdf, 2);

    $supplierName1 = 'Supplier Name: ';
    $supplierName2 = $row["supplierName"];
    $buyerName = 'Buyer Name: ' . $row["buyerName"];
    $ticketNumber = $row["ticketNumber"];


    $table1->easyCell('Purchase Order', 'font-size:30; font-style:B; font-color:#00bfff;');
    $table1->printRow();
    $table1->rowStyle('font-size:15; font-style:B;');
    $table1->easyCell($supplierName1 . $supplierName2);
    $table1->printRow();

    $table1->rowStyle('font-size:12;');
    $table1->easyCell($buyerName);
    $table1->printRow();
    $table1->endTable(5);

    $table=new easyTable($pdf, '{20, 130, 20, 20}','align:C{LCRR};border:1; border-color:#a1a1a1; ');
    $table->rowStyle('align:{CCCR};valign:M;bgcolor:#000000; font-color:#ffffff; font-family:Arial; font-style:B;');
    $table->easyCell('Quantity');
    $table->easyCell('Description');
    $table->easyCell('Unit Price');
    $table->easyCell('Total');
    $table->printRow();

    $table->rowStyle('valign:M;border:LR;paddingY:2;' . $bgcolor);
    $table->easyCell($row["item1Quantity"]);
    $table->easyCell($row["item1Des"]);
    $table->easyCell($row["item1Price"]);
    $table->easyCell($row["item1Total"]);
    $table->printRow();
    $table->rowStyle('valign:M;border:LR;paddingY:2;' . $bgcolor);
    $table->easyCell($row["item2Quantity"]);
    $table->easyCell($row["item2Des"]);
    $table->easyCell($row["item2Price"]);
    $table->easyCell($row["item2Total"]);
    $table->printRow();
    $table->rowStyle('valign:M;border:LR;paddingY:2;' . $bgcolor);
    $table->easyCell($row["item3Quantity"]);
    $table->easyCell($row["item3Des"]);
    $table->easyCell($row["item3Price"]);
    $table->easyCell($row["item3Total"]);
    $table->printRow();
    $table->rowStyle('valign:M;border:LR;paddingY:2;' . $bgcolor);
    $table->easyCell($row["item4Quantity"]);
    $table->easyCell($row["item4Des"]);
    $table->easyCell($row["item4Price"]);
    $table->easyCell($row["item4Total"]);
    $table->printRow();
    $table->rowStyle('valign:M;border:LR;paddingY:2;' . $bgcolor);
    $table->easyCell($row["item5Quantity"]);
    $table->easyCell($row["item5Des"]);
    $table->easyCell($row["item15Price"]);
    $table->easyCell($row["item5Total"]);
    $table->printRow();

    $table->rowStyle('align:{RRRR};');
    $table->easyCell(' ', 'border:T;colspan:2');
    $table->easyCell('Subtotal', 'font-style:B;');
    $table->easyCell('$ ' . $row["poTotal"], 'align:R;');
    $table->printRow();
    $table->easyCell(' ', 'border:0;colspan:2');
    $table->easyCell('Tax', 'font-style:B; align:R');
    $table->easyCell('$', 'align:R;');
    $table->printRow();
    $table->rowStyle('bgcolor:153,255,153;');
    $table->easyCell(' ', 'border:0;colspan:2; bgcolor:255,255,255;');
    $table->easyCell('Total', 'font-style:IB; align:R');
    $table->easyCell('$ ' . $row["poTotal"], 'align:R;');
    $table->printRow();
    $table->endTable();



}
$pdf->Output();

?>