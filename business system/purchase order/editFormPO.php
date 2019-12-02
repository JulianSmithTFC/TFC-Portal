<?php

include '../config.php';

// Get the customer ID.
$poID = intval($_GET['id']);

// If form was submitted, update the customer.
if (!empty($_POST['poID'])) {
    $poUpdated = true;
    $sql = "UPDATE purchaseorders
        SET
            supplierName=?,
            buyerName = ?,
            ticketNumber = ?,
            item1Des = ?,
            item1Quantity = ?,
            item1Total = ?,
            item1Price = ?,
            purchaseLink1 = ?,
            item2Des = ?,
            item2Quantity = ?,
            item2Total = ?,
            item2Price = ?,
            purchaseLink2 = ?,
            item3Des = ?,
            item3Price = ?,
            item3Quantity = ?,
            item3Total = ?,
            purchaseLink3 = ?,
            item4Des = ?,
            item4Quantity = ?,
            item4Total = ?,
            item4Price = ?,
            purchaseLink4 = ?,
            item5Des = ?,
            item5Price = ?,
            item5Total = ?,
            item5Quantity = ?,
            purchaseLink5 = ?,
            poTotal =?,
            paymentType=?,
            purchaserName=?,
            datePurchased =?,
            shippingCarrier=?,
            trackingNumber=?,
            poStatus=?
            WHERE poID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die($conn->error);
    }
    $stmt->bind_param(
        'sssssssssssssssssssssssssssssssssssi',
        $_POST['supplierName'],
        $_POST['buyerName'],
        $_POST['ticketNumber'],
        $_POST['item1Price'],
        $_POST['item1Des'],
        $_POST['item1Quantity'],
        $_POST['item1Total'],
        $_POST['purchase1Link'],
        $_POST['item2Quantity'],
        $_POST['item2Des'],
        $_POST['item2Price'],
        $_POST['item2Total'],
        $_POST['purchase2Link'],
        $_POST['item3Quantity'],
        $_POST['item3Des'],
        $_POST['item3Price'],
        $_POST['item3Total'],
        $_POST['purchase3Link'],
        $_POST['item4Quantity'],
        $_POST['item4Des'],
        $_POST['item4Price'],
        $_POST['item4Total'],
        $_POST['purchase4Link'],
        $_POST['item5Quantity'],
        $_POST['item5Des'],
        $_POST['item5Price'],
        $_POST['item5Total'],
        $_POST['purchase5Link'],
        $_POST['poTotal'],
        $_POST['paymentType'],
        $_POST['purchaserName'],
        date("Y-m-d", strtotime($_POST['datePurchased'])),
        $_POST['shippingCarrier'],
        $_POST['trackingNumber'],
        $_POST['poStatus'],
        $_POST['poID']
    );
    $stmt->execute();
    if ($stmt->error) {
        die($stmt->error);
    }
    $stmt->close();
}
// Load the customer.
$result = $conn->query("SELECT * FROM purchaseorders WHERE poID = {$poID}") or die($conn->error);
$po = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit PO</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../js/login business portal/config.js"></script>

    <script type="text/javascript" src="../../js/login business portal/enforcer.js"></script>

    <?php
    include '../../libraries/includes-header.php';
    ?>

</head>

<body class="grey lighten-3">

<?php include '../../templet parts/bp-mainNavigation.php'; ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div align="center">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Purchase Order From</h1>
                    <p class="lead">Please fill out all fields bellow.</p>
                    <?php if ($poUpdated) : ?>
                        <div class="alert alert-success">Purchase order updated.</div>
                    <?php endif; ?>
                </div>
            </div>
            <form method="POST">
                <div class="form-group col-md-6" align="left">
                    <label for="inputCompanyName1">Supplier Name</label>
                    <input type="text" class="form-control" id="inputCompanyName1" placeholder="Supplier Name" name="supplierName"
                           value="<?= $po['supplierName'] ?>" />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="inputHowDidYouHear">Buyer Name</label>
                    <select id="inputHowDidYouHear" class="form-control" name="buyerName">
                        <option selected value="<?= $po['buyerName'] ?>"><?= $po['buyerName'] ?></option>
                        <option value="Diego Espinoza">Diego Espinoza</option>
                        <option value="Dillan Dorjahn">Dillan Dorjahn</option>
                        <option value="Julian Smith">Julian Smith</option>
                        <option value="Karly Reyes">Karly Reyes</option>
                    </select>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="inputCompanyName1">Ticket Number <span style="color: red; "></span></label>
                    <input type="text" class="form-control" id="inputCompanyName1" placeholder="Ticket Number" name="ticketNumber"
                           value="<?= $po['ticketNumber'] ?>"/>
                </div>

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label for="start">Quantity</label>
                        <input type="text" class="form-control" id="item1Quantity" name="item1Quantity"
                               value="<?= $po['item1Quantity'] ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">Description</label>
                        <input type="text" class="form-control" id="item1des" placeholder="Description" name="item1Des"
                               value="<?= $po['item1Des'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Unit Price</label>
                        <input type="text" class="form-control" id="item1UnitPrice" placeholder="Unit Price" name="item1Price"
                               value="<?= $po['item1Price'] ?>"  />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Total</label>
                        <input type="text" class="form-control" id="item1Total" placeholder="Total" name="item1Total"
                               value="<?= $po['item1Total'] ?>" />

                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="purchase1Link" placeholder="Purchase Link"
                               name="purchase1Link" value="<?= $po['purchaseLink1'] ?>"  />
                        <a href="<?= $po['purchaseLink1'] ?>" target="_blank"><?= $po['purchaseLink1'] ?></a>
                    </div>
                </div>

                <br/>

                <!-- end item1 -->
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label for="start">Quantity</label>
                        <input type="text" class="form-control" id="item2Quantity" name="item2Quantity"
                               value="<?= $po['item2Quantity'] ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">Description</label>
                        <input type="text" class="form-control" id="item2des" placeholder="Description" name="item2Des"
                               value="<?= $po['item2Des'] ?>"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Unit Price</label>
                        <input type="text" class="form-control" id="item2UnitPrice" placeholder="Unit Price" name="item2Price"
                               value="<?= $po['item2Price'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Total</label>
                        <input type="text" class="form-control" id="item2Total" placeholder="Total" name="item2Total"
                               value="<?= $po['item2Total'] ?>" />

                    </div>
                    <div class="form-row col-md-12">
                        <input type="text" class="form-control" id="purchase2Link" placeholder="Purchase Link"
                               name="purchase2Link" value="<?= $po['purchaseLink2'] ?>"  />
                        <a href="<?= $po['purchaseLink2'] ?>" target="_blank"><?= $po['purchaseLink2'] ?></a>
                    </div>
                </div>

                <br/>
                <!-- end item2  -->

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label for="start">Quantity</label>
                        <input type="text" class="form-control" id="item3Quantity" name="item3Quantity"
                               value="<?= $po['item3Quantity'] ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">Description</label>
                        <input type="text" class="form-control" id="item3des" placeholder="Description" name="item3Des"
                               value="<?= $po['item3Des'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Unit Price</label>
                        <input type="text" class="form-control" id="item3UnitPrice" placeholder="Unit Price" name="item3Price"
                               value="<?= $po['item3Price'] ?>"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Total</label>
                        <input type="text" class="form-control" id="item3Total" placeholder="Total" name="item3Total"
                               value="<?= $po['item3Total'] ?>"/>

                    </div>
                    <div class="form-row col-md-12">
                        <input type="text" class="form-control" id="purchase3Link" placeholder="Purchase Link"
                               name="purchase3Link" value="<?= $po['purchaseLink3'] ?>"  />
                        <a href="<?= $po['purchaseLink3'] ?>" target="_blank"><?= $po['purchaseLink3'] ?></a>
                    </div>
                </div>

                <br/>
                <!-- end item 3 -->
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label for="start">Quantity</label>
                        <input type="text" class="form-control" id="item4Quantity" name="item4Quantity"
                               value="<?= $po['item4Quantity'] ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">Description</label>
                        <input type="text" class="form-control" id="item4des" placeholder="Description" name="item4Des"
                               value="<?= $po['item4Des'] ?>"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Unit Price</label>
                        <input type="text" class="form-control" id="item4UnitPrice" placeholder="Unit Price" name="item4Price"
                               value="<?= $po['item4Price'] ?>"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Total</label>
                        <input type="text" class="form-control" id="item4Total" placeholder="Total" name="item4Total"
                               value="<?= $po['item4Total'] ?>" />

                    </div>
                    <div class="form-row col-md-12">
                        <input type="text" class="form-control" id="purchase4Link" placeholder="Purchase Link"
                               name="purchase4Link" value="<?= $po['purchaseLink4'] ?>"  />
                        <a href="<?= $po['purchaseLink4'] ?>" target="_blank"><?= $po['purchaseLink4'] ?></a>
                    </div>
                </div>

                <br/>
                <!-- end item 4 -->

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label for="start">Quantity</label>
                        <input type="text" class="form-control" id="item5Quantity" name="item5Quantity"
                               value="<?= $po['item5Quantity'] ?>"  />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start">Description</label>
                        <input type="text" class="form-control" id="item5des" placeholder="Description" name="item5Des"
                               value="<?= $po['item5Des'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Unit Price</label>
                        <input type="text" class="form-control" id="item5UnitPrice" placeholder="Unit Price" name="item5Price"
                               value="<?= $po['item5Price'] ?>"  />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="start">Total</label>
                        <input type="text" class="form-control" id="item5Total" placeholder="Total" name="item5Total"
                               value="<?= $po['item5Total'] ?>"  />

                    </div>
                    <div class="form-row col-md-12">
                        <input type="text" class="form-control" id="purchase5Link" placeholder="Purchase Link"
                               name="purchase5Link" value="<?= $po['purchaseLink5'] ?>"  />
                        <a href="<?= $po['purchaseLink5'] ?>" target="_blank"><?= $po['purchaseLink5'] ?></a>
                    </div>
                </div>

                <br/>
                <!-- end item 5 -->

                <br/>
                <div class="form-row col-md-6" align="right">
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <input  type="text" class="form-control" id="poTotal" placeholder="Total" name="poTotal"
                                value="<?= $po['poTotal'] ?>"/>
                        <br>
                        <button onclick="calTotals()">cal totals</button>
                    </div>
                </div>

                <script>
                    function calTotals() {
                        event.preventDefault();
                        // item 1
                        let item1q = document.querySelector("#item1UnitPrice").value;
                        let item1p = document.querySelector("#item1Quantity").value;
                        let item1Total = item1p * item1q;
                        document.querySelector("#item1Total").value = item1Total;
                        //item 2
                        let item2q = document.querySelector("#item2UnitPrice").value;
                        let item2p = document.querySelector("#item2Quantity").value;
                        let item2Total = item2p * item2q;
                        document.querySelector("#item2Total").value = item2Total;
                        //item 3
                        let item3q = document.querySelector("#item3UnitPrice").value;
                        let item3p = document.querySelector("#item3Quantity").value;
                        let item3Total = item3p * item3q;
                        document.querySelector("#item3Total").value = item3Total;
                        //item 4
                        let item4q = document.querySelector("#item4UnitPrice").value;
                        let item4p = document.querySelector("#item4Quantity").value;
                        let item4Total = item4p * item4q;
                        document.querySelector("#item4Total").value = item4Total;
                        //item 5
                        let item5q = document.querySelector("#item5UnitPrice").value;
                        let item5p = document.querySelector("#item5Quantity").value;
                        let item5Total = item5p * item5q;
                        document.querySelector("#item5Total").value = item5Total;
                        //total
                        let poTotal = item1Total + item2Total + item3Total + item4Total + item5Total;
                        document.querySelector("#poTotal").value = poTotal;
                    }
                </script>

                <div class="form-group col-md-6" style="text-align: left">
                    <label for="start">Payment Type:</label>
                    <select class="custom-select" name="paymentType">
                        <option selected  value="<?= $po['paymentType'] ?>"> <?= $po['paymentType'] ?></option>
                        <option value="Credit Account">Credit Account</option>
                        <option value="Cash">Cash</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="inputHowDidYouHear">Purchaser's Name</label>
                        <select id="inputHowDidYouHear" class="form-control" name="purchaserName">
                            <option selected  value="<?= $po['purchaserName'] ?>"> <?= $po['purchaserName'] ?></option>
                            <option value="Diego Espinoza">Diego Espinoza</option>
                            <option value="Julian Smith">Julian Smith</option>
                            <option value="Karly Reyes">Karly Reyes</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datePurchased">Date Purchased</label>
                        <input type="text" class="form-control" id="datePurchased" name="datePurchased" value ="<?= $po['datePurchased']?>"/>
                    </div>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="inputHowDidYouHear">Shipping Carrier</label>
                        <select id="inputHowDidYouHear" class="form-control" name="shippingCarrier">
                            <option selected  value="<?= $po['shippingCarrier'] ?>"> <?= $po['shippingCarrier'] ?></option>
                            <option value="UPS - United Parcel Service">UPS - United Parcel Service</option>
                            <option value="FedEx">FedEx</option>
                            <option value="USPS - United Stated Postal Service">USPS - United Stated Postal Service</option>
                            <option value="DHL">DHL</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCompanyName1">Tracking Number</label>
                        <input type="text" class="form-control" id="inputCompanyName1" placeholder="Tracking #" name="trackingNumber"
                               value="<?= $po['trackingNumber'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="inputTicketStatus">PO Status</label>
                    <select id="inputTicketStatus" class="form-control" name="poStatus">
                        <option selected  value="<?= $po['poStatus'] ?>"> <?= $po['poStatus'] ?></option>
                        <option>New</option>
                        <option value="Purchased">Purchased</option>
                        <option value="Recorded"><span class="badge badge-pill badge-warning">Recorded</span></option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <br>
                    <input type="hidden" name="poID" value="<?= $poID ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>

                </div>
            </form>
        </div>

    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">

    </div>
    <!--/.Call to action-->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://techfusionconsulting.com/" target="_blank"> Tech Fusion LLC </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<?php
require '../../libraries/includes-footer.php';
?>


</body>

</html>