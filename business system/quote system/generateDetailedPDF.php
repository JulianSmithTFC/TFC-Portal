<?php

include '../config.php';

// Get the customer ID.
$quoteID = intval($_GET['id']);

$query = "SELECT * FROM quotes  WHERE quoteID = $quoteID";
$result = mysqli_query($conn, $query);

include '../../libraries/fpdf181/fpdf.php';
include '../../libraries/fpdf-easytable/exfpdf.php';
include '../../libraries/fpdf-easytable/easyTable.php';
$pdf=new exFPDF();
while ($row = mysqli_fetch_array($result))
{

    $pdf->AddPage();

    $customerName = $row["customerName"];
    $quoteID = $row["quoteID"];

    $pdf->SetTitle($customerName . '_ID' . $quoteID);
    $pdf->SetFont('helvetica','',10);
    $table1=new easyTable($pdf, 2);

    $uid = $row['uid'];

    $resultCustomer = $conn->query("SELECT * FROM customers WHERE uid = ('$uid')") or die($conn->error);
    $customer = $resultCustomer->fetch_assoc();

    $resultLead = $conn->query("SELECT * FROM leads WHERE uid = ('$uid')") or die($conn->error);
    $lead = $resultLead->fetch_assoc();

    $resultClient = $conn->query("SELECT * FROM clients WHERE uid = ('$uid')") or die($conn->error);
    $client = $resultClient->fetch_assoc();

    if($customer != null){
        $accountHolderName = ($customer['fname'] . ' '. $customer['lname']);
        $companyName = $customer['companyName'];
    }
    else if($lead != null){
        $accountHolderName = ($lead['fname'] . ' '. $lead['lname']);
        $companyName = $lead['companyName'];
    }
    else if($client != null){
        $accountHolderName = ($client['fname'] . ' '. $client['lname']);
        $companyName = $client['companyName'];
    }




    $creationDate = $row["creationDate"];
    $salesRep = $row["salesRep"];
    $expirationDate = $row["expirationDate"];

    $upFrontPer = $row["upFrontPer"];
    $applyUpFrontPer = $row["applyUpFrontPer"];


    $productLineItemTotal = $row["productLineItemTotal"];



    $quoteProductSubtotal = $row["quoteProductSubtotal"];
    $quoteServiceSubtotal = $row["quoteServiceSubtotal"];

    $quoteTotal = $row["quoteTotal"];
    $upFrontTotal = $row["upFrontTotal"];



    $quoteStatus = $row["quoteStatus"];




    $table1->easyCell('Quote', 'font-size:30; font-style:B; font-color:#000000;');
    $table1->easyCell('', 'img:../img/techfusion_logo-01.png, wAuto, h30; align:R;');
    $table1->printRow();
    $table1->endTable();


    $infoTable=new easyTable($pdf, '{95, 95}','align:C{LL}; border-color:transparent; ');

    $infoTable->rowStyle('align:{LL}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('From');
    $infoTable->easyCell('To');
    $infoTable->printRow();

    $infoTable->rowStyle('align:{LL}; valign:M ; font-color:#000000; font-size:14; font-family:Arial; font-style:B;');
    $infoTable->easyCell('Tech Fusion, LLC');
        if($companyName != ''){
            $infoTable->easyCell($companyName);
        }
        else{
            $infoTable->easyCell($accountHolderName);
        }
    $infoTable->printRow();

    $pdf->Ln(3);

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('Sales Rep: ' . $salesRep);
    $infoTable->printRow();


    $infoTable->rowStyle('align:{LL}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    if ($salesRep == 'Julian Smith'){
        $infoTable->easyCell('Julian@techfusionconsulting.com');
    }
    else if($salesRep == 'Diego Espinoza'){
        $infoTable->easyCell('Diego@techfusionconsulting.com');
    }
    else if($salesRep == 'Karly Reyes'){
        $infoTable->easyCell('Karly@techfusionconsulting.com');
    }
    $infoTable->printRow();

    $pdf->Ln(2);

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('(314)-690-3564');
    $infoTable->printRow();

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('710 S Main St. Suite A');
    $infoTable->printRow();

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('Troy, IL 62294');
    $infoTable->printRow();

    $pdf->Ln(6);

    $quoteID = $row["quoteID"];

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('Quote Number: ' . $quoteID);
    $infoTable->printRow();

    date_default_timezone_set('America/Chicago');
    $quoteDate = date("M d, Y");

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('Date: ' . $quoteDate);
    $infoTable->printRow();

    $infoTable->rowStyle('align:{L}; valign:M ; font-color:#000000; font-size:10; font-family:Arial; font-style:B;');
    $infoTable->easyCell('Expiration Date: ' . $expirationDate . ' days');
    $infoTable->printRow();

    $infoTable->endTable();

    $pdf->Ln(6);


    $table=new easyTable($pdf, '{20, 130, 20, 20}','align:C{LCRR};border:1; border-color:#a1a1a1; ');
    $table->rowStyle('align:{CLCR};valign:M;bgcolor:#000000; font-color:#ffffff; font-family:Arial; font-style:B;');
    $table->easyCell('Quantity');
    $table->easyCell('Description');
    $table->easyCell('Unit Price');
    $table->easyCell('Total');
    $table->printRow();

    $item1Quantity = $row["item1Quantity"];

    if (($productLineItemTotal >= 1) && ($item1Quantity > 0 )){

        //Product Line 1
        $item1Total = $row["item1Total"];
        $item1Des = $row["item1Des"];

        $item1UnitPrice = ($item1Total/$item1Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated1UnitPrice = money_format('%.2n', $item1UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated1Total = money_format('%.2n', $item1Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item1Quantity);
        $table->easyCell($item1Des);
        $table->easyCell($formated1UnitPrice);
        $table->easyCell($formated1Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 2){
        //Product Line 2
        $item2Quantity = $row["item2Quantity"];
        $item2Total = $row["item2Total"];
        $item2Des = $row["item2Des"];

        $item2UnitPrice = ($item2Total/$item2Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated2UnitPrice = money_format('%.2n', $item2UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated2Total = money_format('%.2n', $item2Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item2Quantity);
        $table->easyCell($item2Des);
        $table->easyCell($formated2UnitPrice);
        $table->easyCell($formated2Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 3){
        //Product Line 3
        $item3Quantity = $row["item3Quantity"];
        $item3Total = $row["item3Total"];
        $item3Des = $row["item3Des"];

        $item3UnitPrice = ($item3Total/$item3Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated3UnitPrice = money_format('%.2n', $item3UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated3Total = money_format('%.2n', $item3Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item3Quantity);
        $table->easyCell($item3Des);
        $table->easyCell($formated3UnitPrice);
        $table->easyCell($formated3Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 4){
        //Product Line 4
        $item4Quantity = $row["item4Quantity"];
        $item4Total = $row["item4Total"];
        $item4Des = $row["item4Des"];

        $item4UnitPrice = ($item4Total/$item4Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated4UnitPrice = money_format('%.2n', $item4UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated4Total = money_format('%.2n', $item4Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item4Quantity);
        $table->easyCell($item4Des);
        $table->easyCell($formated4UnitPrice);
        $table->easyCell($formated4Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 5){
        //Product Line 5
        $item5Quantity = $row["item5Quantity"];
        $item5Total = $row["item5Total"];
        $item5Des = $row["item5Des"];

        $item5UnitPrice = ($item5Total/$item5Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated5UnitPrice = money_format('%.2n', $item5UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated5Total = money_format('%.2n', $item5Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item5Quantity);
        $table->easyCell($item5Des);
        $table->easyCell($formated5UnitPrice);
        $table->easyCell($formated5Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 6){
        //Product Line 6
        $item6Quantity = $row["item6Quantity"];
        $item6Total = $row["item6Total"];
        $item6Des = $row["item6Des"];

        $item6UnitPrice = ($item6Total/$item6Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated6UnitPrice = money_format('%.2n', $item6UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated6Total = money_format('%.2n', $item6Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item6Quantity);
        $table->easyCell($item6Des);
        $table->easyCell($formated6UnitPrice);
        $table->easyCell($formated6Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 7){
        //Product Line 7
        $item7Quantity = $row["item7Quantity"];
        $item7Total = $row["item7Total"];
        $item7Des = $row["item7Des"];

        $item7UnitPrice = ($item7Total/$item7Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated7UnitPrice = money_format('%.2n', $item7UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated7Total = money_format('%.2n', $item7Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item7Quantity);
        $table->easyCell($item7Des);
        $table->easyCell($formated7UnitPrice);
        $table->easyCell($formated7Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 8){
        //Product Line 8
        $item8Quantity = $row["item8Quantity"];
        $item8Total = $row["item8Total"];
        $item8Des = $row["item8Des"];

        $item8UnitPrice = ($item8Total/$item8Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated8UnitPrice = money_format('%.2n', $item8UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated8Total = money_format('%.2n', $item8Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item8Quantity);
        $table->easyCell($item8Des);
        $table->easyCell($formated8UnitPrice);
        $table->easyCell($formated8Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 9){
        //Product Line 9
        $item9Quantity = $row["item9Quantity"];
        $item9Total = $row["item9Total"];
        $item9Des = $row["item9Des"];

        $item9UnitPrice = ($item9Total/$item9Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated9UnitPrice = money_format('%.2n', $item9UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated9Total = money_format('%.2n', $item9Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item9Quantity);
        $table->easyCell($item9Des);
        $table->easyCell($formated9UnitPrice);
        $table->easyCell($formated9Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 10){
        //Product Line 10
        $item10Quantity = $row["item10Quantity"];
        $item10Total = $row["item10Total"];
        $item10Des = $row["item10Des"];

        $item10UnitPrice = ($item10Total/$item10Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated10UnitPrice = money_format('%.2n', $item10UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated10Total = money_format('%.2n', $item10Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item10Quantity);
        $table->easyCell($item10Des);
        $table->easyCell($formated10UnitPrice);
        $table->easyCell($formated10Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 11){
        //Product Line 11
        $item11Quantity = $row["item11Quantity"];
        $item11Total = $row["item11Total"];
        $item11Des = $row["item11Des"];

        $item11UnitPrice = ($item11Total/$item11Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated11UnitPrice = money_format('%.2n', $item11UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated11Total = money_format('%.2n', $item11Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item11Quantity);
        $table->easyCell($item11Des);
        $table->easyCell($formated11UnitPrice);
        $table->easyCell($formated11Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 12){
        //Product Line 12
        $item12Quantity = $row["item12Quantity"];
        $item12Total = $row["item12Total"];
        $item12Des = $row["item12Des"];

        $item12UnitPrice = ($item12Total/$item12Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated12UnitPrice = money_format('%.2n', $item12UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated12Total = money_format('%.2n', $item12Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item12Quantity);
        $table->easyCell($item12Des);
        $table->easyCell($formated12UnitPrice);
        $table->easyCell($formated12Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 13){
        //Product Line 13
        $item13Quantity = $row["item13Quantity"];
        $item13Total = $row["item13Total"];
        $item13Des = $row["item13Des"];

        $item13UnitPrice = ($item13Total/$item13Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated13UnitPrice = money_format('%.2n', $item13UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated13Total = money_format('%.2n', $item13Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item13Quantity);
        $table->easyCell($item13Des);
        $table->easyCell($formated13UnitPrice);
        $table->easyCell($formated13Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 14){
        //Product Line 14
        $item14Quantity = $row["item14Quantity"];
        $item14Total = $row["item14Total"];
        $item14Des = $row["item14Des"];

        $item14UnitPrice = ($item14Total/$item14Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated14UnitPrice = money_format('%.2n', $item14UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated14Total = money_format('%.2n', $item14Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item14Quantity);
        $table->easyCell($item14Des);
        $table->easyCell($formated14UnitPrice);
        $table->easyCell($formated14Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 15){
        //Product Line 15
        $item15Quantity = $row["item15Quantity"];
        $item15Total = $row["item15Total"];
        $item15Des = $row["item15Des"];

        $item15UnitPrice = ($item15Total/$item15Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated15UnitPrice = money_format('%.2n', $item15UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated15Total = money_format('%.2n', $item15Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item15Quantity);
        $table->easyCell($item15Des);
        $table->easyCell($formated15UnitPrice);
        $table->easyCell($formated15Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 16){
        //Product Line 16
        $item16Quantity = $row["item16Quantity"];
        $item16Total = $row["item16Total"];
        $item16Des = $row["item16Des"];

        $item16UnitPrice = ($item16Total/$item16Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated16UnitPrice = money_format('%.2n', $item16UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated16Total = money_format('%.2n', $item16Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item16Quantity);
        $table->easyCell($item16Des);
        $table->easyCell($formated16UnitPrice);
        $table->easyCell($formated16Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 17){
        //Product Line 17
        $item17Quantity = $row["item17Quantity"];
        $item17Total = $row["item17Total"];
        $item17Des = $row["item17Des"];

        $item17UnitPrice = ($item17Total/$item17Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated17UnitPrice = money_format('%.2n', $item17UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated17Total = money_format('%.2n', $item17Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item17Quantity);
        $table->easyCell($item17Des);
        $table->easyCell($formated17UnitPrice);
        $table->easyCell($formated17Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 18){
        //Product Line 18
        $item18Quantity = $row["item18Quantity"];
        $item18Total = $row["item18Total"];
        $item18Des = $row["item18Des"];

        $item18UnitPrice = ($item18Total/$item18Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated18UnitPrice = money_format('%.2n', $item18UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated18Total = money_format('%.2n', $item18Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item18Quantity);
        $table->easyCell($item18Des);
        $table->easyCell($formated18UnitPrice);
        $table->easyCell($formated18Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 19){
        //Product Line 19
        $item19Quantity = $row["item19Quantity"];
        $item19Total = $row["item19Total"];
        $item19Des = $row["item19Des"];

        $item19UnitPrice = ($item19Total/$item19Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated19UnitPrice = money_format('%.2n', $item19UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated19Total = money_format('%.2n', $item19Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item19Quantity);
        $table->easyCell($item19Des);
        $table->easyCell($formated19UnitPrice);
        $table->easyCell($formated19Total);
        $table->printRow();
    }

    if ($productLineItemTotal >= 20){
        //Product Line 20
        $item20Quantity = $row["item20Quantity"];
        $item20Total = $row["item20Total"];
        $item20Des = $row["item20Des"];

        $item20UnitPrice = ($item20Total/$item20Quantity);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated20UnitPrice = money_format('%.2n', $item20UnitPrice);

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formated20Total = money_format('%.2n', $item20Total);


        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($item20Quantity);
        $table->easyCell($item20Des);
        $table->easyCell($formated20UnitPrice);
        $table->easyCell($formated20Total);
        $table->printRow();
    }

    $service1Quantity = $row["service1Quantity"];
    $service2Quantity = $row["service2Quantity"];
    $service3Quantity = $row["service3Quantity"];

    if ($service1Quantity != ''){

        //Service Line 1
        $service1Des = $row["service1Des"];
        $service1UnitPrice = $row["service1UnitPrice"];
        $service1Total = $row["service1Total"];

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formatedService1UnitPrice = money_format('%.2n', $service1UnitPrice);
        $formatedService1Total = money_format('%.2n', $service1Total);

        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($service1Quantity);
        $table->easyCell($service1Des);
        $table->easyCell($formatedService1UnitPrice);
        $table->easyCell($formatedService1Total);
        $table->printRow();
    }

    if ($service2Quantity != ''){

        //Service Line 2
        $service2Des = $row["service2Des"];
        $service2UnitPrice = $row["service2UnitPrice"];
        $service2Total = $row["service2Total"];

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formatedService2UnitPrice = money_format('%.2n', $service2UnitPrice);
        $formatedService2Total = money_format('%.2n', $service2Total);

        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($service2Quantity);
        $table->easyCell($service2Des);
        $table->easyCell($formatedService2UnitPrice);
        $table->easyCell($formatedService2Total);
        $table->printRow();
    }

    if ($service3Quantity != ''){

        //Service Line 3
        $service3Des = $row["service3Des"];
        $service3UnitPrice = $row["service3UnitPrice"];
        $service3Total = $row["service3Total"];

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $formatedService3UnitPrice = money_format('%.2n', $service3UnitPrice);
        $formatedService3Total = money_format('%.2n', $service3Total);

        $table->rowStyle('align:{CLCR};valign:M;border:LR;paddingY:2;' . $bgcolor);
        $table->easyCell($service3Quantity);
        $table->easyCell($service3Des);
        $table->easyCell($formatedService3UnitPrice);
        $table->easyCell($formatedService3Total);
        $table->printRow();
    }

    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $formatedQuoteTotal = money_format('%.2n', $quoteTotal);

    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $formatedUpFrontTotal = money_format('%.2n', $upFrontTotal);

    $table->rowStyle('align:{RRRR};');
    $table->easyCell(' ', 'border:T;colspan:4');
    $table->printRow();

    $table->endTable();

    $endTable=new easyTable($pdf, '{100, 5, 65, 20}','align:C{LCRR}; ');
    $endTable->rowStyle('align:{RRRR};');
    $endTable->easyCell(' ', 'border:transparent;colspan:2');
    $endTable->easyCell('Total', 'font-style:B;');
    $endTable->easyCell($formatedQuoteTotal, 'align:R;');
    $endTable->printRow();

    $endTable->easyCell(' ', 'border:0;colspan:2');
    $endTable->easyCell('% Required Upfront', 'font-style:B; align:R');
    $endTable->easyCell(($upFrontPer * 100) . '%', 'align:R;');
    $endTable->printRow();

    $endTable->easyCell(' ', 'border:0;colspan:2');
    $endTable->easyCell('Total Required Upfront', 'font-style:B; align:R');
    $endTable->easyCell($formatedUpFrontTotal, 'align:R;');
    $endTable->printRow();
    $endTable->endTable();




}
$pdf->Output('I',($customerName . '_ID' . $quoteID . '.pdf'));

?>