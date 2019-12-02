<!-- stores info in db  -->
<?php
if ( isset( $_POST['submit'] ) ){

    include '../config.php';

   $supplierName = $conn->real_escape_string($_POST['supplierName']);
   $buyerName = $conn->real_escape_string($_POST['buyerName']);
   $ticketNumber = $conn->real_escape_string($_POST['ticketNumber']);

   $item1Price = $conn->real_escape_string($_POST['item1Price']);
   $item1Des = $conn->real_escape_string($_POST['item1Des']);
   $item1Quantity = $conn->real_escape_string($_POST['item1Quantity']);
   $item1Total = $conn->real_escape_string($_POST['item1Total']);
   $purchase1Link = $conn->real_escape_string($_POST['purchase1Link']);
   $item2Quantity = $conn->real_escape_string($_POST['item2Quantity']);
   $item2Des = $conn->real_escape_string($_POST['item2Des']);
   $item2Price = $conn->real_escape_string($_POST['item2Price']);
   $item2Total = $conn->real_escape_string($_POST['item2Total']);
   $purchase2Link = $conn->real_escape_string($_POST['purchase2Link']);
   $item3Quantity = $conn->real_escape_string($_POST['item3Quantity']);
   $item3Des = $conn->real_escape_string($_POST['item3Des']);
   $item3Price = $conn->real_escape_string($_POST['item3Price']);
   $item3Total = $conn->real_escape_string($_POST['item3Total']);
   $purchase3Link = $conn->real_escape_string($_POST['purchase3Link']);
   $item4Quantity = $conn->real_escape_string($_POST['item4Quantity']);
   $item4Des = $conn->real_escape_string($_POST['item4Des']);
   $item4Price = $conn->real_escape_string($_POST['item4Price']);
   $item4Total = $conn->real_escape_string($_POST['item4Total']);
   $purchase4Link = $conn->real_escape_string($_POST['purchase4Link']);
   $item5Quantity = $conn->real_escape_string($_POST['item5Quantity']);
   $item5Des = $conn->real_escape_string($_POST['item5Des']);
   $item5Price = $conn->real_escape_string($_POST['item5Price']);
   $item5Total = $conn->real_escape_string($_POST['item5Total']);
   $purchase5Link = $conn->real_escape_string($_POST['purchase5Link']);
   $poTotal = $conn->real_escape_string($_POST['poTotal']);
   $paymentType = $conn->real_escape_string($_POST['paymentType']);
   $purchaserName = $conn->real_escape_string($_POST['purchaserName']);
   $datePurchased = $conn->real_escape_string($_POST['datePurchased']);
   $shippingCarrier = $conn->real_escape_string($_POST['shippingCarrier']);
   $trackingNumber = $conn->real_escape_string($_POST['trackingNumber']);
   $poStatus = $conn->real_escape_string($_POST['poStatus']);








    $sql = "INSERT INTO purchaseorders(supplierName, buyerName, ticketNumber, item1Des, item1Price, item1Quantity, item1Total, purchaseLink1, item2Des, item2Price, item2Quantity, item2Total, purchaseLink2, item3Des, item3Price, item3Quantity, item3Total, purchaseLink3, item4Des, item4Price, item4Quantity, item4Total, purchaseLink4, item5Des, item5Price, item5Quantity, item5Total, purchaseLink5, poTotal, paymentType, purchaserName, datePurchased, shippingCarrier, trackingNumber, poStatus)
VALUES('$supplierName', '$buyerName', '$ticketNumber', '$item1Des', '$item1Price', '$item1Quantity', '$item1Total', '$purchase1Link', '$item2Des', '$item2Price', '$item2Quantity', '$item2Total', '$purchase2Link', '$item3Des', '$item3Price', '$item3Quantity', '$item3Total', '$purchase3Link', '$item4Des' , '$item4Price', '$item4Quantity','$item4Total', '$purchase4Link', '$item5Des', '$item5Price', '$item5Quantity',$item5Total, '$purchase5Link', '$poTotal', '$paymentType', '$purchaserName', '$datePurchased',' $shippingCarrier',' $trackingNumber', '$poStatus');";


    
if ($conn->query($sql)) {
    header("Location: newPOCreated.php");
	
} else {
    echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
}
}


$conn->close();

