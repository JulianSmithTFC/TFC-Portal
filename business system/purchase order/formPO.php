<?php


$ticketID = intval($_GET['id']);


if ($ticketID != ''){

    include '../config.php';

    $result = $conn->query("SELECT * FROM ticket WHERE ticketID = $ticketID");
    $ticket = $result->fetch_assoc();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Purchase Order From</title>

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
                </div>
            </div>
            <form action="newPOEntry.php" method="POST">
                <div class="form-group col-md-6" align="left">
                    <label for="supplierName">Supplier Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="supplierName"
                        placeholder="Supplier Name"
                        name="supplierName"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="buyerName">Buyer Name</label>
                    <select id="buyerName" class="form-control" name="buyerName">
                        <option selected></option>
                        <option value="Diego Espinoza">Diego Espinoza</option>
                        <option value="Dillan Dorjahn">Dillan Dorjahn</option>
                        <option value="Julian Smith">Julian Smith</option>
                        <option value="Karly Reyes">Karly Reyes</option>
                    </select>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="ticketNumber">Ticket Number</label>
                    <input
                        type="text"
                        class="form-control"
                        id="ticketNumber"
                        placeholder="Ticket Number"
                        name="ticketNumber"
                        value="<?= $ticket['ticketID'] ?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label>PO Creation Date: The system will create this for you</label>

                    <!-- <input
                      type="date"
                      id="start"
                      name="trip-start"
                      value=""
                      min="2019-01-01"
                      max="2030-12-31"
                      name="creationDate"
                    /> -->
                </div>

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label>Quantity</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item1Quantity"
                            name="item1Quantity"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item1des"
                            placeholder="Description"
                            name="item1Des"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item1UnitPrice"
                            placeholder="Unit Price"
                            name="item1Price"
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
                            readonly

                        />

                    </div>
                    <div class="form-row col-md-12">
                        <input
                            type="text"
                            class="form-control"
                            id="purchase1Link"
                            placeholder="Purchase Link"
                            name="purchase1Link"
                        />
                    </div>
                </div>
                <br/>
                <!-- end item1 -->

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label>Quantity</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item2Quantity"
                            name="item2Quantity"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item2des"
                            placeholder="Description"
                            name="item2Des"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item2UnitPrice"
                            placeholder="Unit Price"
                            name="item2Price"
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
                            readonly

                        />

                    </div>
                    <div class="form-row col-md-12">
                        <input
                            type="text"
                            class="form-control"
                            id="purchase2Link"
                            placeholder="Purchase Link"
                            name="purchase2Link"
                        />
                    </div>
                </div>
                <br/>
                <!-- end item2  -->

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label>Quantity</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item3Quantity"
                            name="item3Quantity"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item3des"
                            placeholder="Description"
                            name="item3Des"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item3UnitPrice"
                            placeholder="Unit Price"
                            name="item3Price"
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
                            readonly

                        />

                    </div>
                    <div class="form-row col-md-12">
                        <input
                            type="text"
                            class="form-control"
                            id="purchase3Link"
                            placeholder="Purchase Link"
                            name="purchase3Link"
                        />
                    </div>
                </div>
                <br/>
                <!-- end item 3 -->

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label>Quantity</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item4Quantity"
                            name="item4Quantity"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item4des"
                            placeholder="Description"
                            name="item4Des"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item4UnitPrice"
                            placeholder="Unit Price"
                            name="item4Price"
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
                            readonly

                        />

                    </div>
                    <div class="form-row col-md-12">
                        <input
                            type="text"
                            class="form-control"
                            id="purchase4Link"
                            placeholder="Purchase Link"
                            name="purchase4Link"
                        />
                    </div>
                </div>
                <br/>
                <!-- end item 4 -->

                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-2">
                        <label>Quantity</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item5Quantity"
                            name="item5Quantity"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item5des"
                            placeholder="Description"
                            name="item5Des"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unit Price</label>
                        <input
                            type="text"
                            class="form-control"
                            id="item5UnitPrice"
                            placeholder="Unit Price"
                            name="item5Price"
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
                            readonly

                        />

                    </div>
                    <div class="form-row col-md-12">
                        <input
                            type="text"
                            class="form-control"
                            id="purchase5Link"
                            placeholder="Purchase Link"
                            name="purchase5Link"
                        />
                    </div>
                </div>
                <br/>
                <!-- end item 5 -->


                <div class="form-row col-md-6" align="right">
                    <div class="form-group col-md-10"></div>
                    <div class="form-group col-md-2">
                        <input
                            readonly
                            type="text"
                            class="form-control"
                            id="poTotal"
                            placeholder="Total"
                            name="poTotal"
                        />
                        <br>
                        <button onclick="calTotals()" class="btn btn-primary">Calculate Totals</button>
                    </div>
                </div>

                <script>

                    function calTotals(){
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
                    <label>Payment Type:</label>
                    <select class="custom-select" name="paymentType">
                        <option selected></option>
                        <option value="Credit Account">Credit Account</option>
                        <option value="Cash">Cash</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="purchaserName">Purchaser's Name</label>
                        <select
                            id="purchaserName"
                            class="form-control"
                            name="purchaserName"
                        >
                            <option selected></option>
                            <option value="Diego Espinoza">Diego Espinoza</option>
                            <option value="Julian Smith">Julian Smith</option>
                            <option value="Karly Reyes">Karly Reyes</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datePurchased">Date Purchased</label>
                        <br/>
                        <input
                            type="date"
                            id="datePurchased"
                            name="datePurchased"
                            value=""
                            min="2019-01-01"
                            max="2030-12-31"
                        />
                    </div>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="shippingCarrier">Shipping Carrier</label>
                        <select
                            id="shippingCarrier"
                            class="form-control"
                            name="shippingCarrier"
                        >
                            <option selected></option>
                            <option value="UPS - United Parcel Service">UPS - United Parcel Service</option>
                            <option value="FedEx">FedEx</option>
                            <option value="USPS - United Stated Postal Service"
                            >USPS - United Stated Postal Service</option
                            >
                            <option value="DHL">DHL</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCompanyName1">Tracking Number</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputCompanyName1"
                            placeholder="Tracking #"
                            name="trackingNumber"
                        />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="inputTicketStatus">PO Status</label>
                    <select id="inputTicketStatus" class="form-control" name="poStatus">
                        <option value="New" selected>New</option>
                        <option value="Purchased">Purchased</option>
                        <option value="Recorded"><span class="badge badge-pill badge-warning">Recorded</span></option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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