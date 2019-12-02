<?php

include '../config.php';

// Get the customer ID.
$quoteID = intval($_GET['id']);

// If form was submitted, update the customer.
if (!empty($_POST['quoteID'])) {
    $quoteUpdated = true;
    $sql = "UPDATE quotes
        SET
  creationDate = ?,
  salesRep = ?,
  expirationDate = ?,
  upFrontPer = ?,
  applyUpFrontPer = ?,
  item1Quantity = ?,
  item1UnitPrice = ?,
  upcharge1Per = ?,
  salesTax1 = ?,
  item1TotalUp = ?,
  item1TotalTax = ?,
  item1Total = ?,
  item1Des = ?,
  purchase1Link = ?,
  item2Quantity = ?,
  item2UnitPrice = ?,
  upcharge2Per = ?,
  salesTax2 = ?,
  item2TotalUp = ?,
  item2TotalTax = ?,
  item2Total = ?,
  item2Des = ?,
  purchase2Link = ?,
  item3Quantity = ?,
  item3UnitPrice = ?,
  upcharge3Per = ?,
  salesTax3 = ?,
  item3TotalUp = ?,
  item3TotalTax = ?,
  item3Total = ?,
  item3Des = ?,
  purchase3Link = ?,
  item4Quantity = ?,
  item4UnitPrice = ?,
  upcharge4Per = ?,
  salesTax4 = ?,
  item4TotalUp = ?,
  item4TotalTax = ?,
  item4Total = ?,
  item4Des = ?,
  purchase4Link = ?,
  item5Quantity = ?,
  item5UnitPrice = ?,
  upcharge5Per = ?,
  salesTax5 = ?,
  item5TotalUp = ?,
  item5TotalTax = ?,
  item5Total = ?,
  item5Des = ?,
  purchase5Link = ?,
  item6Quantity = ?,
  item6UnitPrice = ?,
  upcharge6Per = ?,
  salesTax6 = ?,
  item6TotalUp = ?,
  item6TotalTax = ?,
  item6Total = ?,
  item6Des = ?,
  purchase6Link = ?,
  item7Quantity = ?,
  item7UnitPrice = ?,
  upcharge7Per = ?,
  salesTax7 = ?,
  item7TotalUp = ?,
  item7TotalTax = ?,
  item7Total = ?,
  item7Des = ?,
  purchase7Link = ?,
  item8Quantity = ?,
  item8UnitPrice = ?,
  upcharge8Per = ?,
  salesTax8 = ?,
  item8TotalUp = ?,
  item8TotalTax = ?,
  item8Total = ?,
  item8Des = ?,
  purchase8Link = ?,
  item9Quantity = ?,
  item9UnitPrice = ?,
  upcharge9Per = ?,
  salesTax9 = ?,
  item9TotalUp = ?,
  item9TotalTax = ?,
  item9Total = ?,
  item9Des = ?,
  purchase9Link = ?,
  item10Quantity = ?,
  item10UnitPrice = ?,
  upcharge10Per = ?,
  salesTax10 = ?,
  item10TotalUp = ?,
  item10TotalTax = ?,
  item10Total = ?,
  item10Des = ?,
  purchase10Link = ?,
  item11Quantity = ?,
  item11UnitPrice = ?,
  upcharge11Per = ?,
  salesTax11 = ?,
  item11TotalUp = ?,
  item11TotalTax = ?,
  item11Total = ?,
  item11Des = ?,
  purchase11Link = ?,
  item12Quantity = ?,
  item12UnitPrice = ?,
  upcharge12Per = ?,
  salesTax12 = ?,
  item12TotalUp = ?,
  item12TotalTax = ?,
  item12Total = ?,
  item12Des = ?,
  purchase12Link = ?,
  item13Quantity = ?,
  item13UnitPrice = ?,
  upcharge13Per = ?,
  salesTax13 = ?,
  item13TotalUp = ?,
  item13TotalTax = ?,
  item13Total = ?,
  item13Des = ?,
  purchase13Link = ?,
  item14Quantity = ?,
  item14UnitPrice = ?,
  upcharge14Per = ?,
  salesTax14 = ?,
  item14TotalUp = ?,
  item14TotalTax = ?,
  item14Total = ?,
  item14Des = ?,
  purchase14Link = ?,
  item15Quantity = ?,
  item15UnitPrice = ?,
  upcharge15Per = ?,
  salesTax15 = ?,
  item15TotalUp = ?,
  item15TotalTax = ?,
  item15Total = ?,
  item15Des = ?,
  purchase15Link = ?,
  item16Quantity = ?,
  item16UnitPrice = ?,
  upcharge16Per = ?,
  salesTax16 = ?,
  item16TotalUp = ?,
  item16TotalTax = ?,
  item16Total = ?,
  item16Des = ?,
  purchase16Link = ?,
  item17Quantity = ?,
  item17UnitPrice = ?,
  upcharge17Per = ?,
  salesTax17 = ?,
  item17TotalUp = ?,
  item17TotalTax = ?,
  item17Total = ?,
  item17Des = ?,
  purchase17Link = ?,
  item18Quantity = ?,
  item18UnitPrice = ?,
  upcharge18Per = ?,
  salesTax18 = ?,
  item18TotalUp = ?,
  item18TotalTax = ?,
  item18Total = ?,
  item18Des = ?,
  purchase18Link = ?,
  item19Quantity = ?,
  item19UnitPrice = ?,
  upcharge19Per = ?,
  salesTax19 = ?,
  item19TotalUp = ?,
  item19TotalTax = ?,
  item19Total = ?,
  item19Des = ?,
  purchase19Link = ?,
  item20Quantity = ?,
  item20UnitPrice = ?,
  upcharge20Per = ?,
  salesTax20 = ?,
  item20TotalUp = ?,
  item20TotalTax = ?,
  item20Total = ?,
  item20Des = ?,
  purchase20Link = ?,
  productLineItemTotal = ?,
  service1Quantity = ?,
  service1Des = ?,
  service1UnitPrice = ?,
  service1Total = ?,
  service2Quantity = ?,
  service2Des = ?,
  service2UnitPrice = ?,
  service2Total = ?,
  service3Quantity = ?,
  service3Des = ?,
  service3UnitPrice = ?,
  service3Total = ?,
  quoteProductSubtotal = ?,
  quoteServiceSubtotal = ?,
  quoteTaxTotal = ?,
  quoteUpchargeTotal = ?,
  quoteTotal = ?,
  upFrontTotal = ?,
  quoteProfitTotal = ?,
  quoteStatus = ?
            WHERE quoteID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die($conn->error);
    }
    $stmt->bind_param(
        'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssi',
        date("Y-m-d", strtotime($_POST['creationDate'])),
        $_POST['salesRep'],
        $_POST['expirationDate'],
        $_POST['upFrontPer'],
        $_POST['applyUpFrontPer'],
        $_POST['item1Quantity'],
        $_POST['item1UnitPrice'],
        $_POST['upcharge1Per'],
        $_POST['salesTax1'],
        $_POST['item1TotalUp'],
        $_POST['item1TotalTax'],
        $_POST['item1Total'],
        $_POST['item1Des'],
        $_POST['purchase1Link'],
        $_POST['item2Quantity'],
        $_POST['item2UnitPrice'],
        $_POST['upcharge2Per'],
        $_POST['salesTax2'],
        $_POST['item2TotalUp'],
        $_POST['item2TotalTax'],
        $_POST['item2Total'],
        $_POST['item2Des'],
        $_POST['purchase2Link'],
        $_POST['item3Quantity'],
        $_POST['item3UnitPrice'],
        $_POST['upcharge3Per'],
        $_POST['salesTax3'],
        $_POST['item3TotalUp'],
        $_POST['item3TotalTax'],
        $_POST['item3Total'],
        $_POST['item3Des'],
        $_POST['purchase3Link'],
        $_POST['item4Quantity'],
        $_POST['item4UnitPrice'],
        $_POST['upcharge4Per'],
        $_POST['salesTax4'],
        $_POST['item4TotalUp'],
        $_POST['item4TotalTax'],
        $_POST['item4Total'],
        $_POST['item4Des'],
        $_POST['purchase4Link'],
        $_POST['item5Quantity'],
        $_POST['item5UnitPrice'],
        $_POST['upcharge5Per'],
        $_POST['salesTax5'],
        $_POST['item5TotalUp'],
        $_POST['item5TotalTax'],
        $_POST['item5Total'],
        $_POST['item5Des'],
        $_POST['purchase5Link'],
        $_POST['item6Quantity'],
        $_POST['item6UnitPrice'],
        $_POST['upcharge6Per'],
        $_POST['salesTax6'],
        $_POST['item6TotalUp'],
        $_POST['item6TotalTax'],
        $_POST['item6Total'],
        $_POST['item6Des'],
        $_POST['purchase6Link'],
        $_POST['item7Quantity'],
        $_POST['item7UnitPrice'],
        $_POST['upcharge7Per'],
        $_POST['salesTax7'],
        $_POST['item7TotalUp'],
        $_POST['item7TotalTax'],
        $_POST['item7Total'],
        $_POST['item7Des'],
        $_POST['purchase7Link'],
        $_POST['item8Quantity'],
        $_POST['item8UnitPrice'],
        $_POST['upcharge8Per'],
        $_POST['salesTax8'],
        $_POST['item8TotalUp'],
        $_POST['item8TotalTax'],
        $_POST['item8Total'],
        $_POST['item8Des'],
        $_POST['purchase8Link'],
        $_POST['item9Quantity'],
        $_POST['item9UnitPrice'],
        $_POST['upcharge9Per'],
        $_POST['salesTax9'],
        $_POST['item9TotalUp'],
        $_POST['item9TotalTax'],
        $_POST['item9Total'],
        $_POST['item9Des'],
        $_POST['purchase9Link'],
        $_POST['item10Quantity'],
        $_POST['item10UnitPrice'],
        $_POST['upcharge10Per'],
        $_POST['salesTax10'],
        $_POST['item10TotalUp'],
        $_POST['item10TotalTax'],
        $_POST['item10Total'],
        $_POST['item10Des'],
        $_POST['purchase10Link'],
        $_POST['item11Quantity'],
        $_POST['item11UnitPrice'],
        $_POST['upcharge11Per'],
        $_POST['salesTax11'],
        $_POST['item11TotalUp'],
        $_POST['item11TotalTax'],
        $_POST['item11Total'],
        $_POST['item11Des'],
        $_POST['purchase11Link'],
        $_POST['item12Quantity'],
        $_POST['item12UnitPrice'],
        $_POST['upcharge12Per'],
        $_POST['salesTax12'],
        $_POST['item12TotalUp'],
        $_POST['item12TotalTax'],
        $_POST['item12Total'],
        $_POST['item12Des'],
        $_POST['purchase12Link'],
        $_POST['item13Quantity'],
        $_POST['item13UnitPrice'],
        $_POST['upcharge13Per'],
        $_POST['salesTax13'],
        $_POST['item13TotalUp'],
        $_POST['item13TotalTax'],
        $_POST['item13Total'],
        $_POST['item13Des'],
        $_POST['purchase13Link'],
        $_POST['item14Quantity'],
        $_POST['item14UnitPrice'],
        $_POST['upcharge14Per'],
        $_POST['salesTax14'],
        $_POST['item14TotalUp'],
        $_POST['item14TotalTax'],
        $_POST['item14Total'],
        $_POST['item14Des'],
        $_POST['purchase14Link'],
        $_POST['item15Quantity'],
        $_POST['item15UnitPrice'],
        $_POST['upcharge15Per'],
        $_POST['salesTax15'],
        $_POST['item15TotalUp'],
        $_POST['item15TotalTax'],
        $_POST['item15Total'],
        $_POST['item15Des'],
        $_POST['purchase15Link'],
        $_POST['item16Quantity'],
        $_POST['item16UnitPrice'],
        $_POST['upcharge16Per'],
        $_POST['salesTax16'],
        $_POST['item16TotalUp'],
        $_POST['item16TotalTax'],
        $_POST['item16Total'],
        $_POST['item16Des'],
        $_POST['purchase16Link'],
        $_POST['item17Quantity'],
        $_POST['item17UnitPrice'],
        $_POST['upcharge17Per'],
        $_POST['salesTax17'],
        $_POST['item17TotalUp'],
        $_POST['item17TotalTax'],
        $_POST['item17Total'],
        $_POST['item17Des'],
        $_POST['purchase17Link'],
        $_POST['item18Quantity'],
        $_POST['item18UnitPrice'],
        $_POST['upcharge18Per'],
        $_POST['salesTax18'],
        $_POST['item18TotalUp'],
        $_POST['item18TotalTax'],
        $_POST['item18Total'],
        $_POST['item18Des'],
        $_POST['purchase18Link'],
        $_POST['item19Quantity'],
        $_POST['item19UnitPrice'],
        $_POST['upcharge19Per'],
        $_POST['salesTax19'],
        $_POST['item19TotalUp'],
        $_POST['item19TotalTax'],
        $_POST['item19Total'],
        $_POST['item19Des'],
        $_POST['purchase19Link'],
        $_POST['item20Quantity'],
        $_POST['item20UnitPrice'],
        $_POST['upcharge20Per'],
        $_POST['salesTax20'],
        $_POST['item20TotalUp'],
        $_POST['item20TotalTax'],
        $_POST['item20Total'],
        $_POST['item20Des'],
        $_POST['purchase20Link'],
        $_POST['productLineItemTotal'],
        $_POST['service1Quantity'],
        $_POST['service1Des'],
        $_POST['service1UnitPrice'],
        $_POST['service1Total'],
        $_POST['service2Quantity'],
        $_POST['service2Des'],
        $_POST['service2UnitPrice'],
        $_POST['service2Total'],
        $_POST['service3Quantity'],
        $_POST['service3Des'],
        $_POST['service3UnitPrice'],
        $_POST['service3Total'],
        $_POST['quoteProductSubtotal'],
        $_POST['quoteServiceSubtotal'],
        $_POST['quoteTaxTotal'],
        $_POST['quoteUpchargeTotal'],
        $_POST['quoteTotal'],
        $_POST['upFrontTotal'],
        $_POST['quoteProfitTotal'],
        $_POST['quoteStatus'],
        $_POST['quoteID']
    );
    $stmt->execute();
    if ($stmt->error) {
        die($stmt->error);
    }
    $stmt->close();
}
// Load the customer.
$result = $conn->query("SELECT * FROM quotes WHERE quoteID = {$quoteID}") or die($conn->error);
$quote = $result->fetch_assoc();

$uid = $quote['uid'];

$resultCustomer = $conn->query("SELECT * FROM customers WHERE uid = ('$uid')") or die($conn->error);
$customer = $resultCustomer->fetch_assoc();

$resultLead = $conn->query("SELECT * FROM leads WHERE uid = ('$uid')") or die($conn->error);
$lead = $resultLead->fetch_assoc();

$resultClient = $conn->query("SELECT * FROM clients WHERE uid = ('$uid')") or die($conn->error);
$client = $resultClient->fetch_assoc();

if($customer != null){
    $uid = $customer['uid'];
    $accountHolderName = ($customer['fname'] . ' '. $customer['lname']);
    $companyName = $customer['companyName'];
    $accountEmail = $customer['email'];
    if ($customer['cellPhone'] != ''){
        $accountPhone = $customer['cellPhone'];
    }
    else if($customer['businessPhone'] != ''){
        $accountPhone = $customer['businessPhone'];
    }
    $inputAddress = $customer['addressLine'];
    $inputCity = $customer['addressCity'];
    $inputState = $customer['addressState'];
    $inputZip = $customer['addressZipCode'];
}
else if($lead != null){
    $uid = $lead['uid'];
    $accountHolderName = ($lead['fname'] . ' '. $lead['lname']);
    $companyName = $lead['companyName'];
    $accountEmail = $lead['email'];
    if ($lead['cellPhone'] != ''){
        $accountPhone = $lead['cellPhone'];
    }
    else if($lead['businessPhone'] != ''){
        $accountPhone = $lead['businessPhone'];
    }
    $inputAddress = $lead['addressLine'];
    $inputCity = $lead['addressCity'];
    $inputState = $lead['addressState'];
    $inputZip = $lead['addressZipCode'];
}
else if($client != null){
    $uid = $client['uid'];
    $accountHolderName = ($client['fname'] . ' '. $client['lname']);
    $companyName = $client['companyName'];
    $accountEmail = $client['email'];
    if ($client['cellPhone'] != ''){
        $accountPhone = $client['cellPhone'];
    }
    else if($client['businessPhone'] != ''){
        $accountPhone = $client['businessPhone'];
    }
    $inputAddress = $client['addressLine'];
    $inputCity = $client['addressCity'];
    $inputState = $client['addressState'];
    $inputZip = $client['addressZipCode'];
}

$conn->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit/View Quote</title>

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
                    <h1 class="display-4">Edit Quote From</h1>
                    <p class="lead">Please fill out all fields bellow.</p>
                    <?php if ($quoteUpdated) : ?>
                        <div class="alert alert-success">Quote order updated.</div>
                    <?php endif; ?>
                </div>
            </div>
            <form method="POST">
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-12" align="left">
                        <label for="uid">Client Uid</label>
                        <input
                                type="text"
                                class="form-control"
                                id="uid"
                                name="uid"
                                value="<?= $uid ?>"
                                disabled
                        />
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="customerName">Client Name</label>
                        <input
                                type="text"
                                class="form-control"
                                id="customerName"
                                name="customerName"
                                value="<?= $accountHolderName ?>"
                                disabled
                        />
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="companyName">Company Name</label>
                        <input
                                type="text"
                                class="form-control"
                                id="companyName"
                                name="companyName"
                                value="<?= $companyName ?>"
                                disabled
                        />
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="customerEmail">Client Email</label>
                        <input
                                type="text"
                                class="form-control"
                                id="customerEmail"
                                name="customerEmail"
                                value="<?= $accountEmail ?>"
                                disabled
                        />
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="customerPhone">Client Phone</label>
                        <input
                                type="text"
                                class="form-control"
                                id="customerPhone"
                                name="customerPhone"
                                value="<?= $accountPhone ?>"
                                disabled
                        />
                    </div>
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-12" align="left">
                            <label for="inputAddress">*Address <span style="color: red"></span></label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputAddress"
                                    placeholder="1234 Main St"
                                    name="address"
                                    value=" <?= $inputAddress ?>"
                                    disabled
                            />
                        </div>
                    </div>
                </div>
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-4">
                        <label for="inputCity">*City <span style="color: red"></span></label>
                        <input
                                type="text"
                                class="form-control"
                                id="inputCity"
                                placeholder="City"
                                name="cityName"
                                value="<?= $inputCity ?>"
                                disabled
                        />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">*State <span style="color: red"></span></label>
                        <select id="inputState" class="form-control" name="state" disabled>
                            <option value="<?= $inputState ?>" selected><?= $inputState ?></option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">*Zip <span style="color: red"></span></label>
                        <input
                                type="text"
                                class="form-control"
                                id="inputZip"
                                name="zip"
                                value="<?= $inputZip ?>"
                                disabled
                        />
                    </div>
                </div>
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-3">
                        <label for="creationDate">Quote Date</label>
                        <br/>
                        <input
                                type="date"
                                id="creationDate"
                                name="creationDate"
                                value="<?= $quote['creationDate'] ?>"
                                min="2019-01-01"
                                max="2030-12-31"
                        />
                    </div>
                    <div class="form-group col-md-9"></div>
                </div>
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-12" align="left">
                        <label for="salesRep">Sales Representative</label>
                        <select id="salesRep" class="form-control" name="salesRep">
                            <option value="<?= $quote['salesRep'] ?>" selected><?= $quote['salesRep'] ?></option>
                            <option value="Diego Espinoza">Diego Espinoza</option>
                            <option value="Julian Smith">Julian Smith</option>
                            <option value="Karly Reyes">Karly Reyes</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="expirationDate">How Long Untile The Quote Expires</label>
                        <select id="expirationDate" class="form-control" name="expirationDate">
                            <option value="<?= $quote['expirationDate'] ?>" selected><?= $quote['expirationDate'] ?></option>
                            <option value="15">15 days</option>
                            <option value="30">30 days</option>
                            <option value="60">60 days</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="upFrontPer">% Required Upfront</label>
                        <select id="upFrontPer" class="form-control" name="upFrontPer">
                            <option value="<?= $quote['upFrontPer'] ?>" selected><?= ($quote['upFrontPer'] * 100)
                                ?>%</option>
                            <option value="">0%</option>
                            <option value=".1">10%</option>
                            <option value=".15">15%</option>
                            <option value=".2">20%</option>
                            <option value=".25">25%</option>
                            <option value=".3">30%</option>
                            <option value=".35">35%</option>
                            <option value=".4">40%</option>
                            <option value=".45">45%</option>
                            <option value=".5">50%</option>
                            <option value="1">100%</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label for="applyUpFrontPer">Apply Upfront % To What</label>
                        <select id="applyUpFrontPer" class="form-control" name="applyUpFrontPer">
                            <option value="<?= $quote['applyUpFrontPer'] ?>" selected><?= $quote['applyUpFrontPer'] ?></option>
                            <option value="Both">Both Product & Services</option>
                            <option value="Products">Products</option>
                            <option value="Services">Services</option>
                        </select>
                    </div>
                </div>
                <div>
                    <h3>Products</h3>
                </div>

                <div id="lineItem1">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item1Quantity"
                                    name="item1Quantity"
                                    value="<?= $quote['item1Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item1UnitPrice"
                                    placeholder="Unit Price"
                                    name="item1UnitPrice"
                                    value="<?= $quote['item1UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge1Per">Upcharge %</label>
                            <select id="upcharge1Per" class="form-control" name="upcharge1Per">
                                <option value="<?= $quote['upcharge1Per'] ?>" selected><?= ($quote['upcharge1Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax1"
                                    placeholder=".065"
                                    name="salesTax1"
                                    value="<?= $quote['salesTax1'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item1TotalUp"
                                    placeholder="Total"
                                    name="item1TotalUp"
                                    value="<?= $quote['item1TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item1TotalTax"
                                    placeholder="Total"
                                    name="item1TotalTax"
                                    value="<?= $quote['item1TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item1Total"
                                    placeholder="Total"
                                    name="item1Total"
                                    value="<?= $quote['item1Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item1Des"
                                    placeholder="Description"
                                    name="item1Des"
                                    value="<?= $quote['item1Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase1Link"
                                    placeholder="Purchase Link"
                                    name="purchase1Link"
                                    value="<?= $quote['purchase1Link'] ?>"
                            />
                            <a href="<?= $quote['purchase1Link'] ?>"><?= $quote['purchase1Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item1 -->

                <!-- start item2 -->
                <div id="lineItem2" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item2Quantity"
                                    name="item2Quantity"
                                    value="<?= $quote['item2Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item2UnitPrice"
                                    placeholder="Unit Price"
                                    name="item2UnitPrice"
                                    value="<?= $quote['item2UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge2Per">Upcharge %</label>
                            <select id="upcharge2Per" class="form-control" name="upcharge2Per">
                                <option value="<?= $quote['upcharge2Per'] ?>" selected><?= ($quote['upcharge2Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax2"
                                    placeholder=".065"
                                    name="salesTax2"
                                    value="<?= $quote['salesTax2'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item2TotalUp"
                                    placeholder="Total"
                                    name="item2TotalUp"
                                    value="<?= $quote['item2TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item2TotalTax"
                                    placeholder="Total"
                                    name="item2TotalTax"
                                    value="<?= $quote['item2TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item2Total"
                                    placeholder="Total"
                                    name="item2Total"
                                    value="<?= $quote['item2Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item2Des"
                                    placeholder="Description"
                                    name="item2Des"
                                    value="<?= $quote['item2Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase2Link"
                                    placeholder="Purchase Link"
                                    name="purchase2Link"
                                    value="<?= $quote['purchase2Link'] ?>"
                            />
                            <a href="<?= $quote['purchase2Link'] ?>"><?= $quote['purchase2Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item2 -->

                <!-- start item3 -->
                <div id="lineItem3" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item3Quantity"
                                    name="item3Quantity"
                                    value="<?= $quote['item3Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item3UnitPrice"
                                    placeholder="Unit Price"
                                    name="item3UnitPrice"
                                    value="<?= $quote['item3UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge3Per">Upcharge %</label>
                            <select id="upcharge3Per" class="form-control" name="upcharge3Per">
                                <option value="<?= $quote['upcharge3Per'] ?>" selected><?= ($quote['upcharge3Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax3"
                                    placeholder=".065"
                                    name="salesTax3"
                                    value="<?= $quote['salesTax3'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item3TotalUp"
                                    placeholder="Total"
                                    name="item3TotalUp"
                                    value="<?= $quote['item3TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item3TotalTax"
                                    placeholder="Total"
                                    name="item3TotalTax"
                                    value="<?= $quote['item3TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item3Total"
                                    placeholder="Total"
                                    name="item3Total"
                                    value="<?= $quote['item3Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item3Des"
                                    placeholder="Description"
                                    name="item3Des"
                                    value="<?= $quote['item3Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase3Link"
                                    placeholder="Purchase Link"
                                    name="purchase3Link"
                                    value="<?= $quote['purchase3Link'] ?>"
                            />
                            <a href="<?= $quote['purchase3Link'] ?>"><?= $quote['purchase3Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item3 -->

                <!-- start item4 -->
                <div id="lineItem4" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item4Quantity"
                                    name="item4Quantity"
                                    value="<?= $quote['item4Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item4UnitPrice"
                                    placeholder="Unit Price"
                                    name="item4UnitPrice"
                                    value="<?= $quote['item4UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge4Per">Upcharge %</label>
                            <select id="upcharge4Per" class="form-control" name="upcharge4Per">
                                <option value="<?= $quote['upcharge4Per'] ?>" selected><?= ($quote['upcharge4Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax4"
                                    placeholder=".065"
                                    name="salesTax4"
                                    value="<?= $quote['salesTax4'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item4TotalUp"
                                    placeholder="Total"
                                    name="item4TotalUp"
                                    value="<?= $quote['item4TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item4TotalTax"
                                    placeholder="Total"
                                    name="item4TotalTax"
                                    value="<?= $quote['item4TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item4Total"
                                    placeholder="Total"
                                    name="item4Total"
                                    value="<?= $quote['item4Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item4Des"
                                    placeholder="Description"
                                    name="item4Des"
                                    value="<?= $quote['item4Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase4Link"
                                    placeholder="Purchase Link"
                                    name="purchase4Link"
                                    value="<?= $quote['purchase4Link'] ?>"
                            />
                            <a href="<?= $quote['purchase4Link'] ?>"><?= $quote['purchase4Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item4 -->

                <!-- start item5 -->
                <div id="lineItem5" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item5Quantity"
                                    name="item5Quantity"
                                    value="<?= $quote['item5Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item5UnitPrice"
                                    placeholder="Unit Price"
                                    name="item5UnitPrice"
                                    value="<?= $quote['item5UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge5Per">Upcharge %</label>
                            <select id="upcharge5Per" class="form-control" name="upcharge5Per">
                                <option value="<?= $quote['upcharge5Per'] ?>" selected><?= ($quote['upcharge5Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax5"
                                    placeholder=".065"
                                    name="salesTax5"
                                    value="<?= $quote['salesTax5'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item5TotalUp"
                                    placeholder="Total"
                                    name="item5TotalUp"
                                    value="<?= $quote['item5TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item5TotalTax"
                                    placeholder="Total"
                                    name="item5TotalTax"
                                    value="<?= $quote['item5TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item5Total"
                                    placeholder="Total"
                                    name="item5Total"
                                    value="<?= $quote['item5Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item5Des"
                                    placeholder="Description"
                                    name="item5Des"
                                    value="<?= $quote['item5Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase5Link"
                                    placeholder="Purchase Link"
                                    name="purchase5Link"
                                    value="<?= $quote['purchase5Link'] ?>"
                            />
                            <a href="<?= $quote['purchase5Link'] ?>"><?= $quote['purchase5Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item5 -->

                <!-- start item6 -->
                <div id="lineItem6" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item6Quantity"
                                    name="item6Quantity"
                                    value="<?= $quote['item6Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item6UnitPrice"
                                    placeholder="Unit Price"
                                    name="item6UnitPrice"
                                    value="<?= $quote['item6UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge6Per">Upcharge %</label>
                            <select id="upcharge6Per" class="form-control" name="upcharge6Per">
                                <option value="<?= $quote['upcharge6Per'] ?>" selected><?= ($quote['upcharge6Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax6"
                                    placeholder=".065"
                                    name="salesTax6"
                                    value="<?= $quote['salesTax6'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item6TotalUp"
                                    placeholder="Total"
                                    name="item6TotalUp"
                                    value="<?= $quote['item6TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item6TotalTax"
                                    placeholder="Total"
                                    name="item6TotalTax"
                                    value="<?= $quote['item6TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item6Total"
                                    placeholder="Total"
                                    name="item6Total"
                                    value="<?= $quote['item6Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item6Des"
                                    placeholder="Description"
                                    name="item6Des"
                                    value="<?= $quote['item6Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase6Link"
                                    placeholder="Purchase Link"
                                    name="purchase6Link"
                                    value="<?= $quote['purchase6Link'] ?>"
                            />
                            <a href="<?= $quote['purchase6Link'] ?>"><?= $quote['purchase6Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item6 -->

                <!-- start item7 -->
                <div id="lineItem7" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item7Quantity"
                                    name="item7Quantity"
                                    value="<?= $quote['item7Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item7UnitPrice"
                                    placeholder="Unit Price"
                                    name="item7UnitPrice"
                                    value="<?= $quote['item7UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge7Per">Upcharge %</label>
                            <select id="upcharge7Per" class="form-control" name="upcharge7Per">
                                <option value="<?= $quote['upcharge7Per'] ?>" selected><?= ($quote['upcharge7Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax7"
                                    placeholder=".065"
                                    name="salesTax7"
                                    value="<?= $quote['salesTax7'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item7TotalUp"
                                    placeholder="Total"
                                    name="item7TotalUp"
                                    value="<?= $quote['item7TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item7TotalTax"
                                    placeholder="Total"
                                    name="item7TotalTax"
                                    value="<?= $quote['item7TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item7Total"
                                    placeholder="Total"
                                    name="item7Total"
                                    value="<?= $quote['item7Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item7Des"
                                    placeholder="Description"
                                    name="item7Des"
                                    value="<?= $quote['item7Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase7Link"
                                    placeholder="Purchase Link"
                                    name="purchase7Link"
                                    value="<?= $quote['purchase7Link'] ?>"
                            />
                            <a href="<?= $quote['purchase7Link'] ?>"><?= $quote['purchase7Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item7 -->

                <!-- start item8 -->
                <div id="lineItem8" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item8Quantity"
                                    name="item8Quantity"
                                    value="<?= $quote['item8Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item8UnitPrice"
                                    placeholder="Unit Price"
                                    name="item8UnitPrice"
                                    value="<?= $quote['item8UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge8Per">Upcharge %</label>
                            <select id="upcharge8Per" class="form-control" name="upcharge8Per">
                                <option value="<?= $quote['upcharge8Per'] ?>" selected><?= ($quote['upcharge8Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax8"
                                    placeholder=".065"
                                    name="salesTax8"
                                    value="<?= $quote['salesTax8'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item8TotalUp"
                                    placeholder="Total"
                                    name="item8TotalUp"
                                    value="<?= $quote['item8TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item8TotalTax"
                                    placeholder="Total"
                                    name="item8TotalTax"
                                    value="<?= $quote['item8TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item8Total"
                                    placeholder="Total"
                                    name="item8Total"
                                    value="<?= $quote['item8Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item8Des"
                                    placeholder="Description"
                                    name="item8Des"
                                    value="<?= $quote['item8Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase8Link"
                                    placeholder="Purchase Link"
                                    name="purchase8Link"
                                    value="<?= $quote['purchase8Link'] ?>"
                            />
                            <a href="<?= $quote['purchase8Link'] ?>"><?= $quote['purchase8Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item8 -->

                <!-- start item9 -->
                <div id="lineItem9" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item9Quantity"
                                    name="item9Quantity"
                                    value="<?= $quote['item9Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item9UnitPrice"
                                    placeholder="Unit Price"
                                    name="item9UnitPrice"
                                    value="<?= $quote['item9UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge9Per">Upcharge %</label>
                            <select id="upcharge9Per" class="form-control" name="upcharge9Per">
                                <option value="<?= $quote['upcharge9Per'] ?>" selected><?= ($quote['upcharge9Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax9"
                                    placeholder=".065"
                                    name="salesTax9"
                                    value="<?= $quote['salesTax9'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item9TotalUp"
                                    placeholder="Total"
                                    name="item9TotalUp"
                                    value="<?= $quote['item9TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item9TotalTax"
                                    placeholder="Total"
                                    name="item9TotalTax"
                                    value="<?= $quote['item9TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item9Total"
                                    placeholder="Total"
                                    name="item9Total"
                                    value="<?= $quote['item9Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item9Des"
                                    placeholder="Description"
                                    name="item9Des"
                                    value="<?= $quote['item9Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase9Link"
                                    placeholder="Purchase Link"
                                    name="purchase9Link"
                                    value="<?= $quote['purchase9Link'] ?>"
                            />
                            <a href="<?= $quote['purchase9Link'] ?>"><?= $quote['purchase9Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item9 -->

                <!-- start item10 -->
                <div id="lineItem10" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item10Quantity"
                                    name="item10Quantity"
                                    value="<?= $quote['item10Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item10UnitPrice"
                                    placeholder="Unit Price"
                                    name="item10UnitPrice"
                                    value="<?= $quote['item10UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge10Per">Upcharge %</label>
                            <select id="upcharge10Per" class="form-control" name="upcharge10Per">
                                <option value="<?= $quote['upcharge10Per'] ?>" selected><?= ($quote['upcharge10Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax10"
                                    placeholder=".065"
                                    name="salesTax10"
                                    value="<?= $quote['salesTax10'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item10TotalUp"
                                    placeholder="Total"
                                    name="item10TotalUp"
                                    value="<?= $quote['item10TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item10TotalTax"
                                    placeholder="Total"
                                    name="item10TotalTax"
                                    value="<?= $quote['item10TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item10Total"
                                    placeholder="Total"
                                    name="item10Total"
                                    value="<?= $quote['item10Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item10Des"
                                    placeholder="Description"
                                    name="item10Des"
                                    value="<?= $quote['item10Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase10Link"
                                    placeholder="Purchase Link"
                                    name="purchase10Link"
                                    value="<?= $quote['purchase10Link'] ?>"
                            />
                            <a href="<?= $quote['purchase10Link'] ?>"><?= $quote['purchase10Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item10 -->

                <!-- start item 11 -->
                <div id="lineItem11" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item11Quantity"
                                    name="item11Quantity"
                                    value="<?= $quote['item11Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item11UnitPrice"
                                    placeholder="Unit Price"
                                    name="item11UnitPrice"
                                    value="<?= $quote['item11UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge11Per">Upcharge %</label>
                            <select id="upcharge11Per" class="form-control" name="upcharge11Per">
                                <option value="<?= $quote['upcharge11Per'] ?>" selected><?= ($quote['upcharge11Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax11"
                                    placeholder=".065"
                                    name="salesTax11"
                                    value="<?= $quote['salesTax11'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item11TotalUp"
                                    placeholder="Total"
                                    name="item11TotalUp"
                                    value="<?= $quote['item11TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item11TotalTax"
                                    placeholder="Total"
                                    name="item11TotalTax"
                                    value="<?= $quote['item11TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item11Total"
                                    placeholder="Total"
                                    name="item11Total"
                                    value="<?= $quote['item11Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item11Des"
                                    placeholder="Description"
                                    name="item11Des"
                                    value="<?= $quote['item11Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase11Link"
                                    placeholder="Purchase Link"
                                    name="purchase11Link"
                                    value="<?= $quote['purchase11Link'] ?>"
                            />
                            <a href="<?= $quote['purchase11Link'] ?>"><?= $quote['purchase11Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 11 -->

                <!-- start item 12 -->
                <div id="lineItem12" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item12Quantity"
                                    name="item12Quantity"
                                    value="<?= $quote['item12Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item12UnitPrice"
                                    placeholder="Unit Price"
                                    name="item12UnitPrice"
                                    value="<?= $quote['item12UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge12Per">Upcharge %</label>
                            <select id="upcharge12Per" class="form-control" name="upcharge12Per">
                                <option value="<?= $quote['upcharge12Per'] ?>" selected><?= ($quote['upcharge12Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax12"
                                    placeholder=".065"
                                    name="salesTax12"
                                    value="<?= $quote['salesTax12'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item12TotalUp"
                                    placeholder="Total"
                                    name="item12TotalUp"
                                    value="<?= $quote['item12TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item12TotalTax"
                                    placeholder="Total"
                                    name="item12TotalTax"
                                    value="<?= $quote['item12TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item12Total"
                                    placeholder="Total"
                                    name="item12Total"
                                    value="<?= $quote['item12Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item12Des"
                                    placeholder="Description"
                                    name="item12Des"
                                    value="<?= $quote['item12Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase12Link"
                                    placeholder="Purchase Link"
                                    name="purchase12Link"
                                    value="<?= $quote['purchase12Link'] ?>"
                            />
                            <a href="<?= $quote['purchase12Link'] ?>"><?= $quote['purchase12Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 12 -->

                <!-- start item 13 -->
                <div id="lineItem13" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item13Quantity"
                                    name="item13Quantity"
                                    value="<?= $quote['item13Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item13UnitPrice"
                                    placeholder="Unit Price"
                                    name="item13UnitPrice"
                                    value="<?= $quote['item13UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge13Per">Upcharge %</label>
                            <select id="upcharge13Per" class="form-control" name="upcharge13Per">
                                <option value="<?= $quote['upcharge13Per'] ?>" selected><?= ($quote['upcharge13Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax13"
                                    placeholder=".065"
                                    name="salesTax13"
                                    value="<?= $quote['salesTax13'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item13TotalUp"
                                    placeholder="Total"
                                    name="item13TotalUp"
                                    value="<?= $quote['item13TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item13TotalTax"
                                    placeholder="Total"
                                    name="item13TotalTax"
                                    value="<?= $quote['item13TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item13Total"
                                    placeholder="Total"
                                    name="item13Total"
                                    value="<?= $quote['item13Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item13Des"
                                    placeholder="Description"
                                    name="item13Des"
                                    value="<?= $quote['item13Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase13Link"
                                    placeholder="Purchase Link"
                                    name="purchase13Link"
                                    value="<?= $quote['purchase13Link'] ?>"
                            />
                            <a href="<?= $quote['purchase13Link'] ?>"><?= $quote['purchase13Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 13 -->

                <!-- start item 14 -->
                <div id="lineItem14" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item14Quantity"
                                    name="item14Quantity"
                                    value="<?= $quote['item14Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item14UnitPrice"
                                    placeholder="Unit Price"
                                    name="item14UnitPrice"
                                    value="<?= $quote['item14UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge14Per">Upcharge %</label>
                            <select id="upcharge14Per" class="form-control" name="upcharge14Per">
                                <option value="<?= $quote['upcharge14Per'] ?>" selected><?= ($quote['upcharge14Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax14"
                                    placeholder=".065"
                                    name="salesTax14"
                                    value="<?= $quote['salesTax14'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item14TotalUp"
                                    placeholder="Total"
                                    name="item14TotalUp"
                                    value="<?= $quote['item14TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item14TotalTax"
                                    placeholder="Total"
                                    name="item14TotalTax"
                                    value="<?= $quote['item14TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item14Total"
                                    placeholder="Total"
                                    name="item14Total"
                                    value="<?= $quote['item14Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item14Des"
                                    placeholder="Description"
                                    name="item14Des"
                                    value="<?= $quote['item14Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase14Link"
                                    placeholder="Purchase Link"
                                    name="purchase14Link"
                                    value="<?= $quote['purchase14Link'] ?>"
                            />
                            <a href="<?= $quote['purchase14Link'] ?>"><?= $quote['purchase14Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 14 -->

                <!-- start item 15 -->
                <div id="lineItem15" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item15Quantity"
                                    name="item15Quantity"
                                    value="<?= $quote['item15Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item15UnitPrice"
                                    placeholder="Unit Price"
                                    name="item15UnitPrice"
                                    value="<?= $quote['item15UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge15Per">Upcharge %</label>
                            <select id="upcharge15Per" class="form-control" name="upcharge15Per">
                                <option value="<?= $quote['upcharge15Per'] ?>" selected><?= ($quote['upcharge15Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax15"
                                    placeholder=".065"
                                    name="salesTax15"
                                    value="<?= $quote['salesTax15'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item15TotalUp"
                                    placeholder="Total"
                                    name="item15TotalUp"
                                    value="<?= $quote['item15TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item15TotalTax"
                                    placeholder="Total"
                                    name="item15TotalTax"
                                    value="<?= $quote['item15TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item15Total"
                                    placeholder="Total"
                                    name="item15Total"
                                    value="<?= $quote['item15Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item15Des"
                                    placeholder="Description"
                                    name="item15Des"
                                    value="<?= $quote['item15Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase15Link"
                                    placeholder="Purchase Link"
                                    name="purchase15Link"
                                    value="<?= $quote['purchase15Link'] ?>"
                            />
                            <a href="<?= $quote['purchase15Link'] ?>"><?= $quote['purchase15Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 15 -->

                <!-- start item 16 -->
                <div id="lineItem16" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item16Quantity"
                                    name="item16Quantity"
                                    value="<?= $quote['item16Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item16UnitPrice"
                                    placeholder="Unit Price"
                                    name="item16UnitPrice"
                                    value="<?= $quote['item16UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge16Per">Upcharge %</label>
                            <select id="upcharge16Per" class="form-control" name="upcharge16Per">
                                <option value="<?= $quote['upcharge16Per'] ?>" selected><?= ($quote['upcharge16Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax16"
                                    placeholder=".065"
                                    name="salesTax16"
                                    value="<?= $quote['salesTax16'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item16TotalUp"
                                    placeholder="Total"
                                    name="item16TotalUp"
                                    value="<?= $quote['item16TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item16TotalTax"
                                    placeholder="Total"
                                    name="item16TotalTax"
                                    value="<?= $quote['item16TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item16Total"
                                    placeholder="Total"
                                    name="item16Total"
                                    value="<?= $quote['item16Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item16Des"
                                    placeholder="Description"
                                    name="item16Des"
                                    value="<?= $quote['item16Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase16Link"
                                    placeholder="Purchase Link"
                                    name="purchase16Link"
                                    value="<?= $quote['purchase16Link'] ?>"
                            />
                            <a href="<?= $quote['purchase16Link'] ?>"><?= $quote['purchase16Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 16 -->


                <!-- start item 17 -->
                <div id="lineItem17" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item17Quantity"
                                    name="item17Quantity"
                                    value="<?= $quote['item17Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item17UnitPrice"
                                    placeholder="Unit Price"
                                    name="item17UnitPrice"
                                    value="<?= $quote['item17UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge17Per">Upcharge %</label>
                            <select id="upcharge17Per" class="form-control" name="upcharge17Per">
                                <option value="<?= $quote['upcharge17Per'] ?>" selected><?= ($quote['upcharge17Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax17"
                                    placeholder=".065"
                                    name="salesTax17"
                                    value="<?= $quote['salesTax17'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item17TotalUp"
                                    placeholder="Total"
                                    name="item17TotalUp"
                                    value="<?= $quote['item17TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item17TotalTax"
                                    placeholder="Total"
                                    name="item17TotalTax"
                                    value="<?= $quote['item17TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item17Total"
                                    placeholder="Total"
                                    name="item17Total"
                                    value="<?= $quote['item17Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item17Des"
                                    placeholder="Description"
                                    name="item17Des"
                                    value="<?= $quote['item17Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase17Link"
                                    placeholder="Purchase Link"
                                    name="purchase17Link"
                                    value="<?= $quote['purchase17Link'] ?>"
                            />
                            <a href="<?= $quote['purchase17Link'] ?>"><?= $quote['purchase17Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 17 -->

                <!-- start item 18 -->
                <div id="lineItem18" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item18Quantity"
                                    name="item18Quantity"
                                    value="<?= $quote['item18Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item18UnitPrice"
                                    placeholder="Unit Price"
                                    name="item18UnitPrice"
                                    value="<?= $quote['item18UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge18Per">Upcharge %</label>
                            <select id="upcharge18Per" class="form-control" name="upcharge18Per">
                                <option value="<?= $quote['upcharge18Per'] ?>" selected><?= ($quote['upcharge18Per'] * 100)
                                    ?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax18"
                                    placeholder=".065"
                                    name="salesTax18"
                                    value="<?= $quote['salesTax18'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item18TotalUp"
                                    placeholder="Total"
                                    name="item18TotalUp"
                                    value="<?= $quote['item18TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item18TotalTax"
                                    placeholder="Total"
                                    name="item18TotalTax"
                                    value="<?= $quote['item18TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item18Total"
                                    placeholder="Total"
                                    name="item18Total"
                                    value="<?= $quote['item18Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item18Des"
                                    placeholder="Description"
                                    name="item18Des"
                                    value="<?= $quote['item18Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase18Link"
                                    placeholder="Purchase Link"
                                    name="purchase18Link"
                                    value="<?= $quote['purchase18Link'] ?>"
                            />
                            <a href="<?= $quote['purchase18Link'] ?>"><?= $quote['purchase18Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 18 -->

                <!-- start item 19 -->
                <div id="lineItem19" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item19Quantity"
                                    name="item19Quantity"
                                    value="<?= $quote['item19Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item19UnitPrice"
                                    placeholder="Unit Price"
                                    name="item19UnitPrice"
                                    value="<?= $quote['item19UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge19Per">Upcharge %</label>
                            <select id="upcharge19Per" class="form-control" name="upcharge19Per">
                                <option value="<?= $quote['upcharge19Per'] ?>" selected><?= ($quote['upcharge19Per'] * 100)?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax19"
                                    placeholder=".065"
                                    name="salesTax19"
                                    value="<?= $quote['salesTax19'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item19TotalUp"
                                    placeholder="Total"
                                    name="item19TotalUp"
                                    value="<?= $quote['item19TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item19TotalTax"
                                    placeholder="Total"
                                    name="item19TotalTax"
                                    value="<?= $quote['item19TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item19Total"
                                    placeholder="Total"
                                    name="item19Total"
                                    value="<?= $quote['item19Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item19Des"
                                    placeholder="Description"
                                    name="item19Des"
                                    value="<?= $quote['item19Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase19Link"
                                    placeholder="Purchase Link"
                                    name="purchase19Link"
                                    value="<?= $quote['purchase19Link'] ?>"
                            />
                            <a href="<?= $quote['purchase19Link'] ?>"><?= $quote['purchase19Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 19 -->

                <!-- start item 20 -->
                <div id="lineItem20" class="collapse">
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-1">
                            <label>Quantity</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item20Quantity"
                                    name="item20Quantity"
                                    value="<?= $quote['item20Quantity'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2">
                            <label>Unit Price</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item20UnitPrice"
                                    placeholder="Unit Price"
                                    name="item20UnitPrice"
                                    value="<?= $quote['item20UnitPrice'] ?>"
                            />
                        </div>

                        <div class="form-group col-md-2" align="left">
                            <label for="upcharge20Per">Upcharge %</label>
                            <select id="upcharge20Per" class="form-control" name="upcharge20Per">
                                <option value="<?= $quote['upcharge20Per'] ?>" selected><?= ($quote['upcharge20Per'] *  100)?>%</option>
                                <option value="">0%</option>
                                <option value=".05">5%</option>
                                <option value=".1">10%</option>
                                <option value=".15">15%</option>
                                <option value=".2">20%</option>
                                <option value=".25">25%</option>
                                <option value=".3">30%</option>
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label>Tax %</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="salesTax20"
                                    placeholder=".065"
                                    name="salesTax20"
                                    value="<?= $quote['salesTax20'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Upcharge</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item20TotalUp"
                                    placeholder="Total"
                                    name="item20TotalUp"
                                    value="<?= $quote['item20TotalUp'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total Tax</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item20TotalTax"
                                    placeholder="Total"
                                    name="item20TotalTax"
                                    value="<?= $quote['item20TotalTax'] ?>"
                                    readonly

                            />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Total</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item20Total"
                                    placeholder="Total"
                                    name="item20Total"
                                    value="<?= $quote['item20Total'] ?>"
                                    readonly

                            />

                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="item20Des"
                                    placeholder="Description"
                                    name="item20Des"
                                    value="<?= $quote['item20Des'] ?>"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="purchase20Link"
                                    placeholder="Purchase Link"
                                    name="purchase20Link"
                                    value="<?= $quote['purchase20Link'] ?>"
                            />
                            <a href="<?= $quote['purchase20Link'] ?>"><?= $quote['purchase20Link'] ?></a>
                        </div>
                    </div>
                </div>
                <!-- end item 20 -->



                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <button onclick="addLineItems()" class="btn btn-primary btn-sm" style="width: 100%"><i
                                        class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-sm">
                            <div class="form-group" >
                                <input
                                        type="text"
                                        class="form-control"
                                        id="productLineItemTotal"
                                        placeholder=""
                                        name="productLineItemTotal"
                                        value="<?= $quote['productLineItemTotal'] ?>"
                                        readonly
                                        align="middle"

                                />
                            </div>
                        </div>
                        <div class="col-sm">
                            <button onclick="subtractLineItems()" class="btn btn-primary btn-sm" style="width: 100%"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>

                <div>
                    <h3>Services</h3>
                </div>

                <!-- start service 1 -->
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-1">
                        <label>Quantity</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service1Quantity"
                                name="service1Quantity"
                                value="<?= $quote['service1Quantity'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-7">
                        <label>Description</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service1Des"
                                placeholder="Description"
                                name="service1Des"
                                value="<?= $quote['service1Des'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service1UnitPrice"
                                placeholder="Unit Price"
                                name="service1UnitPrice"
                                value="<?= $quote['service1UnitPrice'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Total</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service1Total"
                                placeholder="Total"
                                name="service1Total"
                                value="<?= $quote['service1Total'] ?>"
                                readonly

                        />

                    </div>
                </div>
                <br/>
                <!-- end service 1 -->

                <!-- start service 2 -->
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-1">
                        <label>Quantity</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service2Quantity"
                                name="service2Quantity"
                                value="<?= $quote['service2Quantity'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-7">
                        <label>Description</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service2Des"
                                placeholder="Description"
                                name="service2Des"
                                value="<?= $quote['service2Des'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service2UnitPrice"
                                placeholder="Unit Price"
                                name="service2UnitPrice"
                                value="<?= $quote['service2UnitPrice'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Total</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service2Total"
                                placeholder="Total"
                                name="service2Total"
                                value="<?= $quote['service2Total'] ?>"
                                readonly

                        />

                    </div>
                </div>
                <br/>
                <!-- end service 2 -->

                <!-- start service 3 -->
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-1">
                        <label>Quantity</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service3Quantity"
                                name="service3Quantity"
                                value="<?= $quote['service3Quantity'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-7">
                        <label>Description</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service3Des"
                                placeholder="Description"
                                name="service3Des"
                                value="<?= $quote['service3Des'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service3UnitPrice"
                                placeholder="Unit Price"
                                name="service3UnitPrice"
                                value="<?= $quote['service3UnitPrice'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Total</label>
                        <input
                                type="text"
                                class="form-control"
                                id="service3Total"
                                placeholder="Total"
                                name="service3Total"
                                value="<?= $quote['service3Total'] ?>"
                                readonly

                        />

                    </div>
                </div>
                <br/>
                <!-- end service 3 -->


                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Products Subtotal</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="quoteProductSubtotal"
                                placeholder="Products"
                                name="quoteProductSubtotal"
                                value="<?= $quote['quoteProductSubtotal'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Services Subtotal</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="quoteServiceSubtotal"
                                placeholder="Services"
                                name="quoteServiceSubtotal"
                                value="<?= $quote['quoteServiceSubtotal'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Total Tax</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="quoteTaxTotal"
                                placeholder="Tax"
                                name="quoteTaxTotal"
                                value="<?= $quote['quoteTaxTotal'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Total Upcharged</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="quoteUpchargeTotal"
                                placeholder="Upcharge"
                                name="quoteUpchargeTotal"
                                value="<?= $quote['quoteUpchargeTotal'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Total</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="quoteTotal"
                                placeholder="Total"
                                name="quoteTotal"
                                value="<?= $quote['quoteTotal'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Amount Required Upfront</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="upFrontTotal"
                                placeholder="Total"
                                name="upFrontTotal"
                                value="<?= $quote['upFrontTotal'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <label>Total Profit</label>
                        <input
                                readonly
                                type="text"
                                class="form-control"
                                id="quoteProfitTotal"
                                placeholder="Profit"
                                name="quoteProfitTotal"
                                value="<?= $quote['quoteProfitTotal'] ?>"
                        />
                        <br>
                        <button onclick="calTotals()" class="btn btn-primary">Calculate Totals</button>
                    </div>
                </div>

                <!-- SCRIPTS -->
                <!-- Bootstrap tooltips -->
                <script type="text/javascript" src="../js/popper.min.js"></script>
                <!-- Bootstrap core JavaScript -->
                <script type="text/javascript" src="../js/bootstrap.min.js"></script>
                <!-- MDB core JavaScript -->
                <script type="text/javascript" src="../js/mdb.min.js"></script>
                <!-- Initializations -->
                <script type="text/javascript">
                    // Animations initialization
                    new WOW().init();

                </script>

                <script>

                    let initLineCount = document.querySelector("#productLineItemTotal").value;

                    if (initLineCount > 1){$("#lineItem2").collapse('show');}
                    if (initLineCount > 2){$("#lineItem3").collapse('show');}
                    if (initLineCount > 3){$("#lineItem4").collapse('show');}
                    if (initLineCount > 4){$("#lineItem5").collapse("show");}
                    if (initLineCount > 5){$("#lineItem6").collapse("show");}
                    if (initLineCount > 6){$("#lineItem7").collapse("show");}
                    if (initLineCount > 7){$("#lineItem8").collapse("show");}
                    if (initLineCount > 8){$("#lineItem9").collapse("show");}
                    if (initLineCount > 9){$("#lineItem10").collapse("show");}
                    if (initLineCount > 10){$("#lineItem11").collapse("show");}
                    if (initLineCount > 11){$("#lineItem12").collapse("show");}
                    if (initLineCount > 12){$("#lineItem13").collapse("show");}
                    if (initLineCount > 13){$("#lineItem14").collapse("show");}
                    if (initLineCount > 14){$("#lineItem15").collapse("show");}
                    if (initLineCount > 15){$("#lineItem16").collapse("show");}
                    if (initLineCount > 16){$("#lineItem17").collapse("show");}
                    if (initLineCount > 17){$("#lineItem18").collapse("show");}
                    if (initLineCount > 18){$("#lineItem19").collapse("show");}
                    if (initLineCount > 19){$("#lineItem20").collapse("show");}

                    let lineItemCount = initLineCount;

                    function addLineItems(){
                        event.preventDefault();
                        if (lineItemCount < 20){
                            lineItemCount++;
                            if (lineItemCount > 1){$("#lineItem2").collapse("show");}
                            if (lineItemCount > 2){$("#lineItem3").collapse("show");}
                            if (lineItemCount > 3){$("#lineItem4").collapse("show");}
                            if (lineItemCount > 4){$("#lineItem5").collapse("show");}
                            if (lineItemCount > 5){$("#lineItem6").collapse("show");}
                            if (lineItemCount > 6){$("#lineItem7").collapse("show");}
                            if (lineItemCount > 7){$("#lineItem8").collapse("show");}
                            if (lineItemCount > 8){$("#lineItem9").collapse("show");}
                            if (lineItemCount > 9){$("#lineItem10").collapse("show");}
                            if (lineItemCount > 10){$("#lineItem11").collapse("show");}
                            if (lineItemCount > 11){$("#lineItem12").collapse("show");}
                            if (lineItemCount > 12){$("#lineItem13").collapse("show");}
                            if (lineItemCount > 13){$("#lineItem14").collapse("show");}
                            if (lineItemCount > 14){$("#lineItem15").collapse("show");}
                            if (lineItemCount > 15){$("#lineItem16").collapse("show");}
                            if (lineItemCount > 16){$("#lineItem17").collapse("show");}
                            if (lineItemCount > 17){$("#lineItem18").collapse("show");}
                            if (lineItemCount > 18){$("#lineItem19").collapse("show");}
                            if (lineItemCount > 19){$("#lineItem20").collapse("show");}

                        }
                        document.querySelector("#productLineItemTotal").value = lineItemCount;
                    }

                    function subtractLineItems(){
                        event.preventDefault();
                        if (lineItemCount > 1){
                            lineItemCount--;
                            if (lineItemCount == 1){$("#lineItem2").collapse("hide");}
                            if (lineItemCount <= 2){$("#lineItem3").collapse("hide");}
                            if (lineItemCount <= 3){$("#lineItem4").collapse("hide");}
                            if (lineItemCount <= 4){$("#lineItem5").collapse("hide");}
                            if (lineItemCount <= 5){$("#lineItem6").collapse("hide");}
                            if (lineItemCount <= 6){$("#lineItem7").collapse("hide");}
                            if (lineItemCount <= 7){$("#lineItem8").collapse("hide");}
                            if (lineItemCount <= 8){$("#lineItem9").collapse("hide");}
                            if (lineItemCount <= 9){$("#lineItem10").collapse("hide");}
                            if (lineItemCount <= 10){$("#lineItem11").collapse("hide");}
                            if (lineItemCount <= 11){$("#lineItem12").collapse("hide");}
                            if (lineItemCount <= 12){$("#lineItem13").collapse("hide");}
                            if (lineItemCount <= 13){$("#lineItem14").collapse("hide");}
                            if (lineItemCount <= 14){$("#lineItem15").collapse("hide");}
                            if (lineItemCount <= 15){$("#lineItem16").collapse("hide");}
                            if (lineItemCount <= 16){$("#lineItem17").collapse("hide");}
                            if (lineItemCount <= 17){$("#lineItem18").collapse("hide");}
                            if (lineItemCount <= 18){$("#lineItem19").collapse("hide");}
                            if (lineItemCount <= 19){$("#lineItem20").collapse("hide");}
                        }
                        document.querySelector("#productLineItemTotal").value = lineItemCount;
                    }

                    function calTotals(){
                        event.preventDefault();
                        // Line Item 1
                        let item1q = document.querySelector("#item1Quantity").value;
                        let item1p = document.querySelector("#item1UnitPrice").value;
                        let item1up = document.querySelector("#upcharge1Per").value;
                        let salesTax1 = document.querySelector("#salesTax1").value;
                        let item1subTotal = item1q * item1p;
                        let item1TotalUp = item1subTotal * item1up;
                        let item1TotalTax = item1TotalUp * salesTax1;
                        let item1TotalProfit = item1TotalUp - item1TotalTax;
                        let item1Total = item1subTotal + item1TotalUp + item1TotalTax;
                        document.querySelector("#item1TotalUp").value = item1TotalUp;
                        document.querySelector("#item1TotalTax").value = item1TotalTax;
                        document.querySelector("#item1Total").value = item1Total;

                        // Line Item 2
                        let item2q = document.querySelector("#item2Quantity").value;
                        let item2p = document.querySelector("#item2UnitPrice").value;
                        let item2up = document.querySelector("#upcharge2Per").value;
                        let salesTax2 = document.querySelector("#salesTax2").value;
                        let item2subTotal = item2q * item2p;
                        let item2TotalUp = item2subTotal * item2up;
                        let item2TotalTax = item2TotalUp * salesTax2;
                        let item2TotalProfit = item2TotalUp - item2TotalTax;
                        let item2Total = item2subTotal + item2TotalUp + item2TotalTax;
                        document.querySelector("#item2TotalUp").value = item2TotalUp;
                        document.querySelector("#item2TotalTax").value = item2TotalTax;
                        document.querySelector("#item2Total").value = item2Total;

                        // Line Item 3
                        let item3q = document.querySelector("#item3Quantity").value;
                        let item3p = document.querySelector("#item3UnitPrice").value;
                        let item3up = document.querySelector("#upcharge3Per").value;
                        let salesTax3 = document.querySelector("#salesTax3").value;
                        let item3subTotal = item3q * item3p;
                        let item3TotalUp = item3subTotal * item3up;
                        let item3TotalTax = item3TotalUp * salesTax3;
                        let item3TotalProfit = item3TotalUp - item3TotalTax;
                        let item3Total = item3subTotal + item3TotalUp + item3TotalTax;
                        document.querySelector("#item3TotalUp").value = item3TotalUp;
                        document.querySelector("#item3TotalTax").value = item3TotalTax;
                        document.querySelector("#item3Total").value = item3Total;

                        // Line Item 4
                        let item4q = document.querySelector("#item4Quantity").value;
                        let item4p = document.querySelector("#item4UnitPrice").value;
                        let item4up = document.querySelector("#upcharge4Per").value;
                        let salesTax4 = document.querySelector("#salesTax4").value;
                        let item4subTotal = item4q * item4p;
                        let item4TotalUp = item4subTotal * item4up;
                        let item4TotalTax = item4TotalUp * salesTax4;
                        let item4TotalProfit = item4TotalUp - item4TotalTax;
                        let item4Total = item4subTotal + item4TotalUp + item4TotalTax;
                        document.querySelector("#item4TotalUp").value = item4TotalUp;
                        document.querySelector("#item4TotalTax").value = item4TotalTax;
                        document.querySelector("#item4Total").value = item4Total;

                        // Line Item 5
                        let item5q = document.querySelector("#item5Quantity").value;
                        let item5p = document.querySelector("#item5UnitPrice").value;
                        let item5up = document.querySelector("#upcharge5Per").value;
                        let salesTax5 = document.querySelector("#salesTax5").value;
                        let item5subTotal = item5q * item5p;
                        let item5TotalUp = item5subTotal * item5up;
                        let item5TotalTax = item5TotalUp * salesTax5;
                        let item5TotalProfit = item5TotalUp - item5TotalTax;
                        let item5Total = item5subTotal + item5TotalUp + item5TotalTax;
                        document.querySelector("#item5TotalUp").value = item5TotalUp;
                        document.querySelector("#item5TotalTax").value = item5TotalTax;
                        document.querySelector("#item5Total").value = item5Total;

                        // Line Item 6
                        let item6q = document.querySelector("#item6Quantity").value;
                        let item6p = document.querySelector("#item6UnitPrice").value;
                        let item6up = document.querySelector("#upcharge6Per").value;
                        let salesTax6 = document.querySelector("#salesTax6").value;
                        let item6subTotal = item6q * item6p;
                        let item6TotalUp = item6subTotal * item6up;
                        let item6TotalTax = item6TotalUp * salesTax6;
                        let item6TotalProfit = item6TotalUp - item6TotalTax;
                        let item6Total = item6subTotal + item6TotalUp + item6TotalTax;
                        document.querySelector("#item6TotalUp").value = item6TotalUp;
                        document.querySelector("#item6TotalTax").value = item6TotalTax;
                        document.querySelector("#item6Total").value = item6Total;

                        // Line Item 7
                        let item7q = document.querySelector("#item7Quantity").value;
                        let item7p = document.querySelector("#item7UnitPrice").value;
                        let item7up = document.querySelector("#upcharge7Per").value;
                        let salesTax7 = document.querySelector("#salesTax7").value;
                        let item7subTotal = item7q * item7p;
                        let item7TotalUp = item7subTotal * item7up;
                        let item7TotalTax = item7TotalUp * salesTax7;
                        let item7TotalProfit = item7TotalUp - item7TotalTax;
                        let item7Total = item7subTotal + item7TotalUp + item7TotalTax;
                        document.querySelector("#item7TotalUp").value = item7TotalUp;
                        document.querySelector("#item7TotalTax").value = item7TotalTax;
                        document.querySelector("#item7Total").value = item7Total;

                        // Line Item 8
                        let item8q = document.querySelector("#item8Quantity").value;
                        let item8p = document.querySelector("#item8UnitPrice").value;
                        let item8up = document.querySelector("#upcharge8Per").value;
                        let salesTax8 = document.querySelector("#salesTax8").value;
                        let item8subTotal = item8q * item8p;
                        let item8TotalUp = item8subTotal * item8up;
                        let item8TotalTax = item8TotalUp * salesTax8;
                        let item8TotalProfit = item8TotalUp - item8TotalTax;
                        let item8Total = item8subTotal + item8TotalUp + item8TotalTax;
                        document.querySelector("#item8TotalUp").value = item8TotalUp;
                        document.querySelector("#item8TotalTax").value = item8TotalTax;
                        document.querySelector("#item8Total").value = item8Total;

                        // Line Item 9
                        let item9q = document.querySelector("#item9Quantity").value;
                        let item9p = document.querySelector("#item9UnitPrice").value;
                        let item9up = document.querySelector("#upcharge9Per").value;
                        let salesTax9 = document.querySelector("#salesTax9").value;
                        let item9subTotal = item9q * item9p;
                        let item9TotalUp = item9subTotal * item9up;
                        let item9TotalTax = item9TotalUp * salesTax9;
                        let item9TotalProfit = item9TotalUp - item9TotalTax;
                        let item9Total = item9subTotal + item9TotalUp + item9TotalTax;
                        document.querySelector("#item9TotalUp").value = item9TotalUp;
                        document.querySelector("#item9TotalTax").value = item9TotalTax;
                        document.querySelector("#item9Total").value = item9Total;

                        // Line Item 10
                        let item10q = document.querySelector("#item10Quantity").value;
                        let item10p = document.querySelector("#item10UnitPrice").value;
                        let item10up = document.querySelector("#upcharge10Per").value;
                        let salesTax10 = document.querySelector("#salesTax10").value;
                        let item10subTotal = item10q * item10p;
                        let item10TotalUp = item10subTotal * item10up;
                        let item10TotalTax = item10TotalUp * salesTax10;
                        let item10TotalProfit = item10TotalUp - item10TotalTax;
                        let item10Total = item10subTotal + item10TotalUp + item10TotalTax;
                        document.querySelector("#item10TotalUp").value = item10TotalUp;
                        document.querySelector("#item10TotalTax").value = item10TotalTax;
                        document.querySelector("#item10Total").value = item10Total;

                        // Line Item 11
                        let item11q = document.querySelector("#item11Quantity").value;
                        let item11p = document.querySelector("#item11UnitPrice").value;
                        let item11up = document.querySelector("#upcharge11Per").value;
                        let salesTax11 = document.querySelector("#salesTax11").value;
                        let item11subTotal = item11q * item11p;
                        let item11TotalUp = item11subTotal * item11up;
                        let item11TotalTax = item11TotalUp * salesTax11;
                        let item11TotalProfit = item11TotalUp - item11TotalTax;
                        let item11Total = item11subTotal + item11TotalUp + item11TotalTax;
                        document.querySelector("#item11TotalUp").value = item11TotalUp;
                        document.querySelector("#item11TotalTax").value = item11TotalTax;
                        document.querySelector("#item11Total").value = item11Total;

                        // Line Item 12
                        let item12q = document.querySelector("#item12Quantity").value;
                        let item12p = document.querySelector("#item12UnitPrice").value;
                        let item12up = document.querySelector("#upcharge12Per").value;
                        let salesTax12 = document.querySelector("#salesTax12").value;
                        let item12subTotal = item12q * item12p;
                        let item12TotalUp = item12subTotal * item12up;
                        let item12TotalTax = item12TotalUp * salesTax12;
                        let item12TotalProfit = item12TotalUp - item12TotalTax;
                        let item12Total = item12subTotal + item12TotalUp + item12TotalTax;
                        document.querySelector("#item12TotalUp").value = item12TotalUp;
                        document.querySelector("#item12TotalTax").value = item12TotalTax;
                        document.querySelector("#item12Total").value = item12Total;

                        // Line Item 13
                        let item13q = document.querySelector("#item13Quantity").value;
                        let item13p = document.querySelector("#item13UnitPrice").value;
                        let item13up = document.querySelector("#upcharge13Per").value;
                        let salesTax13 = document.querySelector("#salesTax13").value;
                        let item13subTotal = item13q * item13p;
                        let item13TotalUp = item13subTotal * item13up;
                        let item13TotalTax = item13TotalUp * salesTax13;
                        let item13TotalProfit = item13TotalUp - item13TotalTax;
                        let item13Total = item13subTotal + item13TotalUp + item13TotalTax;
                        document.querySelector("#item13TotalUp").value = item13TotalUp;
                        document.querySelector("#item13TotalTax").value = item13TotalTax;
                        document.querySelector("#item13Total").value = item13Total;

                        // Line Item 14
                        let item14q = document.querySelector("#item14Quantity").value;
                        let item14p = document.querySelector("#item14UnitPrice").value;
                        let item14up = document.querySelector("#upcharge14Per").value;
                        let salesTax14 = document.querySelector("#salesTax14").value;
                        let item14subTotal = item14q * item14p;
                        let item14TotalUp = item14subTotal * item14up;
                        let item14TotalTax = item14TotalUp * salesTax14;
                        let item14TotalProfit = item14TotalUp - item14TotalTax;
                        let item14Total = item14subTotal + item14TotalUp + item14TotalTax;
                        document.querySelector("#item14TotalUp").value = item14TotalUp;
                        document.querySelector("#item14TotalTax").value = item14TotalTax;
                        document.querySelector("#item14Total").value = item14Total;

                        // Line Item 15
                        let item15q = document.querySelector("#item15Quantity").value;
                        let item15p = document.querySelector("#item15UnitPrice").value;
                        let item15up = document.querySelector("#upcharge15Per").value;
                        let salesTax15 = document.querySelector("#salesTax15").value;
                        let item15subTotal = item15q * item15p;
                        let item15TotalUp = item15subTotal * item15up;
                        let item15TotalTax = item15TotalUp * salesTax15;
                        let item15TotalProfit = item15TotalUp - item15TotalTax;
                        let item15Total = item15subTotal + item15TotalUp + item15TotalTax;
                        document.querySelector("#item15TotalUp").value = item15TotalUp;
                        document.querySelector("#item15TotalTax").value = item15TotalTax;
                        document.querySelector("#item15Total").value = item15Total;

                        // Line Item 16
                        let item16q = document.querySelector("#item16Quantity").value;
                        let item16p = document.querySelector("#item16UnitPrice").value;
                        let item16up = document.querySelector("#upcharge16Per").value;
                        let salesTax16 = document.querySelector("#salesTax16").value;
                        let item16subTotal = item16q * item16p;
                        let item16TotalUp = item16subTotal * item16up;
                        let item16TotalTax = item16TotalUp * salesTax16;
                        let item16TotalProfit = item16TotalUp - item16TotalTax;
                        let item16Total = item16subTotal + item16TotalUp + item16TotalTax;
                        document.querySelector("#item16TotalUp").value = item16TotalUp;
                        document.querySelector("#item16TotalTax").value = item16TotalTax;
                        document.querySelector("#item16Total").value = item16Total;

                        // Line Item 17
                        let item17q = document.querySelector("#item17Quantity").value;
                        let item17p = document.querySelector("#item17UnitPrice").value;
                        let item17up = document.querySelector("#upcharge17Per").value;
                        let salesTax17 = document.querySelector("#salesTax17").value;
                        let item17subTotal = item17q * item17p;
                        let item17TotalUp = item17subTotal * item17up;
                        let item17TotalTax = item17TotalUp * salesTax17;
                        let item17TotalProfit = item17TotalUp - item17TotalTax;
                        let item17Total = item17subTotal + item17TotalUp + item17TotalTax;
                        document.querySelector("#item17TotalUp").value = item17TotalUp;
                        document.querySelector("#item17TotalTax").value = item17TotalTax;
                        document.querySelector("#item17Total").value = item17Total;

                        // Line Item 18
                        let item18q = document.querySelector("#item18Quantity").value;
                        let item18p = document.querySelector("#item18UnitPrice").value;
                        let item18up = document.querySelector("#upcharge18Per").value;
                        let salesTax18 = document.querySelector("#salesTax18").value;
                        let item18subTotal = item18q * item18p;
                        let item18TotalUp = item18subTotal * item18up;
                        let item18TotalTax = item18TotalUp * salesTax18;
                        let item18TotalProfit = item18TotalUp - item18TotalTax;
                        let item18Total = item18subTotal + item18TotalUp + item18TotalTax;
                        document.querySelector("#item18TotalUp").value = item18TotalUp;
                        document.querySelector("#item18TotalTax").value = item18TotalTax;
                        document.querySelector("#item18Total").value = item18Total;

                        // Line Item 19
                        let item19q = document.querySelector("#item19Quantity").value;
                        let item19p = document.querySelector("#item19UnitPrice").value;
                        let item19up = document.querySelector("#upcharge19Per").value;
                        let salesTax19 = document.querySelector("#salesTax19").value;
                        let item19subTotal = item19q * item19p;
                        let item19TotalUp = item19subTotal * item19up;
                        let item19TotalTax = item19TotalUp * salesTax19;
                        let item19TotalProfit = item19TotalUp - item19TotalTax;
                        let item19Total = item19subTotal + item19TotalUp + item19TotalTax;
                        document.querySelector("#item19TotalUp").value = item19TotalUp;
                        document.querySelector("#item19TotalTax").value = item19TotalTax;
                        document.querySelector("#item19Total").value = item19Total;

                        // Line Item 20
                        let item20q = document.querySelector("#item20Quantity").value;
                        let item20p = document.querySelector("#item20UnitPrice").value;
                        let item20up = document.querySelector("#upcharge20Per").value;
                        let salesTax20 = document.querySelector("#salesTax20").value;
                        let item20subTotal = item20q * item20p;
                        let item20TotalUp = item20subTotal * item20up;
                        let item20TotalTax = item20TotalUp * salesTax20;
                        let item20TotalProfit = item20TotalUp - item20TotalTax;
                        let item20Total = item20subTotal + item20TotalUp + item20TotalTax;
                        document.querySelector("#item20TotalUp").value = item20TotalUp;
                        document.querySelector("#item20TotalTax").value = item20TotalTax;
                        document.querySelector("#item20Total").value = item20Total;

                        //Service Line 1
                        let service1q = document.querySelector("#service1Quantity").value;
                        let service1p = document.querySelector("#service1UnitPrice").value;
                        let service1subTotal = service1q * service1p;
                        let service1Total = service1q * service1p;
                        document.querySelector("#service1Total").value = service1Total;

                        //Service Line 2
                        let service2q = document.querySelector("#service2Quantity").value;
                        let service2p = document.querySelector("#service2UnitPrice").value;
                        let service2subTotal = service2q * service2p;
                        let service2Total = service2q * service2p;
                        document.querySelector("#service2Total").value = service2Total;

                        //Service Line 3
                        let service3q = document.querySelector("#service3Quantity").value;
                        let service3p = document.querySelector("#service3UnitPrice").value;
                        let service3subTotal = service3q * service3p;
                        let service3Total = service3q * service3p;
                        document.querySelector("#service3Total").value = service3Total;


                        //product subtotal
                        let subproductTotal = item1subTotal + item2subTotal + item3subTotal + item4subTotal + item5subTotal +
                            item6subTotal + item7subTotal + item8subTotal + item9subTotal + item10subTotal + item11subTotal + item12subTotal + item13subTotal + item14subTotal + item15subTotal +
                            item16subTotal + item17subTotal + item18subTotal + item19subTotal + item20subTotal;

                        //service subtotal
                        let subserviceTotal = service1Total + service2Total + service3Total;

                        //total tax
                        let totalTax = item1TotalTax + item2TotalTax + item3TotalTax + item4TotalTax + item5TotalTax +
                            item6TotalTax + item7TotalTax + item8TotalTax + item9TotalTax + item10TotalTax + item11TotalTax + item12TotalTax + item13TotalTax + item14TotalTax + item15TotalTax +
                            item16TotalTax + item17TotalTax + item18TotalTax + item19TotalTax + item20TotalTax;

                        //total upcharge
                        let totalupcharge = item1TotalUp + item2TotalUp + item3TotalUp + item4TotalUp + item5TotalUp +
                            item6TotalUp + item7TotalUp + item8TotalUp + item9TotalUp + item10TotalUp + item11TotalUp + item12TotalUp + item13TotalUp + item14TotalUp + item15TotalUp +
                            item16TotalUp + item17TotalUp + item18TotalUp + item19TotalUp + item20TotalUp;

                        //final total
                        let finaltotal = subproductTotal + subserviceTotal;

                        //upfront total required
                        let upFrontPer = document.querySelector("#upFrontPer").value;
                        let applyUpFrontPer = document.querySelector("#applyUpFrontPer").value;
                        let upFrontTotal = 0;
                        if (applyUpFrontPer == 'Both'){
                            upFrontTotal = finaltotal * upFrontPer;
                        }
                        else if(applyUpFrontPer == 'Products'){
                            upFrontTotal = subproductTotal * upFrontPer;
                        }
                        else if(applyUpFrontPer == 'Services'){
                            upFrontTotal = subserviceTotal * upFrontPer;
                        }
                        else{

                        }

                        //profit total
                        let quoteProfitTotal = subserviceTotal + item1TotalProfit + item2TotalProfit + item3TotalProfit +
                            item4TotalProfit + item5TotalProfit + item6TotalProfit + item7TotalProfit + item8TotalProfit +
                            item9TotalProfit + item10TotalProfit + item11TotalProfit + item12TotalProfit + item13TotalProfit +
                            item14TotalProfit + item15TotalProfit + item16TotalProfit + item17TotalProfit + item18TotalProfit +
                            item19TotalProfit + item20TotalProfit;

                        document.querySelector("#quoteProductSubtotal").value = subproductTotal;
                        document.querySelector("#quoteServiceSubtotal").value = subserviceTotal;
                        document.querySelector("#quoteTaxTotal").value = totalTax;
                        document.querySelector("#quoteUpchargeTotal").value = totalupcharge;
                        document.querySelector("#quoteTotal").value = finaltotal;
                        document.querySelector("#upFrontTotal").value = upFrontTotal;
                        document.querySelector("#quoteProfitTotal").value = quoteProfitTotal;


                    }


                </script>

                <div class="form-group col-md-10" align="left">
                    <label for="quoteStatus">Quote Status</label>
                    <select id="quoteStatus" class="form-control" name="quoteStatus">
                        <option value="<?= $quote['quoteStatus'] ?>" selected><?= $quote['quoteStatus'] ?></option>
                        <option value="New" >New</option>
                        <option value="Purchased">Purchased</option>
                        <option value="Old"><span class="badge badge-pill badge-warning">Old</span></option>
                    </select>
                </div>

                <div class="form-group col-md-10" align="left">
                    <br>
                    <input type="hidden" name="quoteID" value="<?= $quoteID ?>">
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

