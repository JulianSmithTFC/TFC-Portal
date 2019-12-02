<!-- stores info in db  -->
<?php
if ( isset( $_POST['submit'] ) ){

    include '../config.php';


    $uid = $conn->real_escape_string($_POST['uid']);

    $creationDate = $conn->real_escape_string($_POST['creationDate']);
    $salesRep = $conn->real_escape_string($_POST['salesRep']);
    $expirationDate = $conn->real_escape_string($_POST['expirationDate']);

    $upFrontPer = $conn->real_escape_string($_POST['upFrontPer']);
    $applyUpFrontPer = $conn->real_escape_string($_POST['applyUpFrontPer']);

    //Product Line 1
    $item1Quantity = $conn->real_escape_string($_POST['item1Quantity']);
    $item1UnitPrice = $conn->real_escape_string($_POST['item1UnitPrice']);
    $upcharge1Per = $conn->real_escape_string($_POST['upcharge1Per']);
    $salesTax1 = $conn->real_escape_string($_POST['salesTax1']);
    $item1TotalUp = $conn->real_escape_string($_POST['item1TotalUp']);
    $item1TotalTax = $conn->real_escape_string($_POST['item1TotalTax']);
    $item1Total = $conn->real_escape_string($_POST['item1Total']);
    $item1Des = $conn->real_escape_string($_POST['item1Des']);
    $purchase1Link = $conn->real_escape_string($_POST['purchase1Link']);

    //Product Line 2
    $item2Quantity = $conn->real_escape_string($_POST['item2Quantity']);
    $item2UnitPrice = $conn->real_escape_string($_POST['item2UnitPrice']);
    $upcharge2Per = $conn->real_escape_string($_POST['upcharge2Per']);
    $salesTax2 = $conn->real_escape_string($_POST['salesTax2']);
    $item2TotalUp = $conn->real_escape_string($_POST['item2TotalUp']);
    $item2TotalTax = $conn->real_escape_string($_POST['item2TotalTax']);
    $item2Total = $conn->real_escape_string($_POST['item2Total']);
    $item2Des = $conn->real_escape_string($_POST['item2Des']);
    $purchase2Link = $conn->real_escape_string($_POST['purchase2Link']);

    //Product Line 3
    $item3Quantity = $conn->real_escape_string($_POST['item3Quantity']);
    $item3UnitPrice = $conn->real_escape_string($_POST['item3UnitPrice']);
    $upcharge3Per = $conn->real_escape_string($_POST['upcharge3Per']);
    $salesTax3 = $conn->real_escape_string($_POST['salesTax3']);
    $item3TotalUp = $conn->real_escape_string($_POST['item3TotalUp']);
    $item3TotalTax = $conn->real_escape_string($_POST['item3TotalTax']);
    $item3Total = $conn->real_escape_string($_POST['item3Total']);
    $item3Des = $conn->real_escape_string($_POST['item3Des']);
    $purchase3Link = $conn->real_escape_string($_POST['purchase3Link']);

    //Product Line 4
    $item4Quantity = $conn->real_escape_string($_POST['item4Quantity']);
    $item4UnitPrice = $conn->real_escape_string($_POST['item4UnitPrice']);
    $upcharge4Per = $conn->real_escape_string($_POST['upcharge4Per']);
    $salesTax4 = $conn->real_escape_string($_POST['salesTax4']);
    $item4TotalUp = $conn->real_escape_string($_POST['item4TotalUp']);
    $item4TotalTax = $conn->real_escape_string($_POST['item4TotalTax']);
    $item4Total = $conn->real_escape_string($_POST['item4Total']);
    $item4Des = $conn->real_escape_string($_POST['item4Des']);
    $purchase4Link = $conn->real_escape_string($_POST['purchase4Link']);

    //Product Line 5
    $item5Quantity = $conn->real_escape_string($_POST['item5Quantity']);
    $item5UnitPrice = $conn->real_escape_string($_POST['item5UnitPrice']);
    $upcharge5Per = $conn->real_escape_string($_POST['upcharge5Per']);
    $salesTax5 = $conn->real_escape_string($_POST['salesTax5']);
    $item5TotalUp = $conn->real_escape_string($_POST['item5TotalUp']);
    $item5TotalTax = $conn->real_escape_string($_POST['item5TotalTax']);
    $item5Total = $conn->real_escape_string($_POST['item5Total']);
    $item5Des = $conn->real_escape_string($_POST['item5Des']);
    $purchase5Link = $conn->real_escape_string($_POST['purchase5Link']);

    //Product Line 6
    $item6Quantity = $conn->real_escape_string($_POST['item6Quantity']);
    $item6UnitPrice = $conn->real_escape_string($_POST['item6UnitPrice']);
    $upcharge6Per = $conn->real_escape_string($_POST['upcharge6Per']);
    $salesTax6 = $conn->real_escape_string($_POST['salesTax6']);
    $item6TotalUp = $conn->real_escape_string($_POST['item6TotalUp']);
    $item6TotalTax = $conn->real_escape_string($_POST['item6TotalTax']);
    $item6Total = $conn->real_escape_string($_POST['item6Total']);
    $item6Des = $conn->real_escape_string($_POST['item6Des']);
    $purchase6Link = $conn->real_escape_string($_POST['purchase6Link']);

    //Product Line 7
    $item7Quantity = $conn->real_escape_string($_POST['item7Quantity']);
    $item7UnitPrice = $conn->real_escape_string($_POST['item7UnitPrice']);
    $upcharge7Per = $conn->real_escape_string($_POST['upcharge7Per']);
    $salesTax7 = $conn->real_escape_string($_POST['salesTax7']);
    $item7TotalUp = $conn->real_escape_string($_POST['item7TotalUp']);
    $item7TotalTax = $conn->real_escape_string($_POST['item7TotalTax']);
    $item7Total = $conn->real_escape_string($_POST['item7Total']);
    $item7Des = $conn->real_escape_string($_POST['item7Des']);
    $purchase7Link = $conn->real_escape_string($_POST['purchase7Link']);

    //Product Line 8
    $item8Quantity = $conn->real_escape_string($_POST['item8Quantity']);
    $item8UnitPrice = $conn->real_escape_string($_POST['item8UnitPrice']);
    $upcharge8Per = $conn->real_escape_string($_POST['upcharge8Per']);
    $salesTax8 = $conn->real_escape_string($_POST['salesTax8']);
    $item8TotalUp = $conn->real_escape_string($_POST['item8TotalUp']);
    $item8TotalTax = $conn->real_escape_string($_POST['item8TotalTax']);
    $item8Total = $conn->real_escape_string($_POST['item8Total']);
    $item8Des = $conn->real_escape_string($_POST['item8Des']);
    $purchase8Link = $conn->real_escape_string($_POST['purchase8Link']);

    //Product Line 9
    $item9Quantity = $conn->real_escape_string($_POST['item9Quantity']);
    $item9UnitPrice = $conn->real_escape_string($_POST['item9UnitPrice']);
    $upcharge9Per = $conn->real_escape_string($_POST['upcharge9Per']);
    $salesTax9 = $conn->real_escape_string($_POST['salesTax9']);
    $item9TotalUp = $conn->real_escape_string($_POST['item9TotalUp']);
    $item9TotalTax = $conn->real_escape_string($_POST['item9TotalTax']);
    $item9Total = $conn->real_escape_string($_POST['item9Total']);
    $item9Des = $conn->real_escape_string($_POST['item9Des']);
    $purchase9Link = $conn->real_escape_string($_POST['purchase9Link']);

    //Product Line 10
    $item10Quantity = $conn->real_escape_string($_POST['item10Quantity']);
    $item10UnitPrice = $conn->real_escape_string($_POST['item10UnitPrice']);
    $upcharge10Per = $conn->real_escape_string($_POST['upcharge10Per']);
    $salesTax10 = $conn->real_escape_string($_POST['salesTax10']);
    $item10TotalUp = $conn->real_escape_string($_POST['item10TotalUp']);
    $item10TotalTax = $conn->real_escape_string($_POST['item10TotalTax']);
    $item10Total = $conn->real_escape_string($_POST['item10Total']);
    $item10Des = $conn->real_escape_string($_POST['item10Des']);
    $purchase10Link = $conn->real_escape_string($_POST['purchase10Link']);

    //Product Line 11
    $item11Quantity = $conn->real_escape_string($_POST['item11Quantity']);
    $item11UnitPrice = $conn->real_escape_string($_POST['item11UnitPrice']);
    $upcharge11Per = $conn->real_escape_string($_POST['upcharge11Per']);
    $salesTax11 = $conn->real_escape_string($_POST['salesTax11']);
    $item11TotalUp = $conn->real_escape_string($_POST['item11TotalUp']);
    $item11TotalTax = $conn->real_escape_string($_POST['item11TotalTax']);
    $item11Total = $conn->real_escape_string($_POST['item11Total']);
    $item11Des = $conn->real_escape_string($_POST['item11Des']);
    $purchase11Link = $conn->real_escape_string($_POST['purchase11Link']);

    //Product Line 12
    $item12Quantity = $conn->real_escape_string($_POST['item12Quantity']);
    $item12UnitPrice = $conn->real_escape_string($_POST['item12UnitPrice']);
    $upcharge12Per = $conn->real_escape_string($_POST['upcharge12Per']);
    $salesTax12 = $conn->real_escape_string($_POST['salesTax12']);
    $item12TotalUp = $conn->real_escape_string($_POST['item12TotalUp']);
    $item12TotalTax = $conn->real_escape_string($_POST['item12TotalTax']);
    $item12Total = $conn->real_escape_string($_POST['item12Total']);
    $item12Des = $conn->real_escape_string($_POST['item12Des']);
    $purchase12Link = $conn->real_escape_string($_POST['purchase12Link']);

    //Product Line 13
    $item13Quantity = $conn->real_escape_string($_POST['item13Quantity']);
    $item13UnitPrice = $conn->real_escape_string($_POST['item13UnitPrice']);
    $upcharge13Per = $conn->real_escape_string($_POST['upcharge13Per']);
    $salesTax13 = $conn->real_escape_string($_POST['salesTax13']);
    $item13TotalUp = $conn->real_escape_string($_POST['item13TotalUp']);
    $item13TotalTax = $conn->real_escape_string($_POST['item13TotalTax']);
    $item13Total = $conn->real_escape_string($_POST['item13Total']);
    $item13Des = $conn->real_escape_string($_POST['item13Des']);
    $purchase13Link = $conn->real_escape_string($_POST['purchase13Link']);

    //Product Line 14
    $item14Quantity = $conn->real_escape_string($_POST['item14Quantity']);
    $item14UnitPrice = $conn->real_escape_string($_POST['item14UnitPrice']);
    $upcharge14Per = $conn->real_escape_string($_POST['upcharge14Per']);
    $salesTax14 = $conn->real_escape_string($_POST['salesTax14']);
    $item14TotalUp = $conn->real_escape_string($_POST['item14TotalUp']);
    $item14TotalTax = $conn->real_escape_string($_POST['item14TotalTax']);
    $item14Total = $conn->real_escape_string($_POST['item14Total']);
    $item14Des = $conn->real_escape_string($_POST['item14Des']);
    $purchase14Link = $conn->real_escape_string($_POST['purchase14Link']);

    //Product Line 15
    $item15Quantity = $conn->real_escape_string($_POST['item15Quantity']);
    $item15UnitPrice = $conn->real_escape_string($_POST['item15UnitPrice']);
    $upcharge15Per = $conn->real_escape_string($_POST['upcharge15Per']);
    $salesTax15 = $conn->real_escape_string($_POST['salesTax15']);
    $item15TotalUp = $conn->real_escape_string($_POST['item15TotalUp']);
    $item15TotalTax = $conn->real_escape_string($_POST['item15TotalTax']);
    $item15Total = $conn->real_escape_string($_POST['item15Total']);
    $item15Des = $conn->real_escape_string($_POST['item15Des']);
    $purchase15Link = $conn->real_escape_string($_POST['purchase15Link']);

    //Product Line 16
    $item16Quantity = $conn->real_escape_string($_POST['item16Quantity']);
    $item16UnitPrice = $conn->real_escape_string($_POST['item16UnitPrice']);
    $upcharge16Per = $conn->real_escape_string($_POST['upcharge16Per']);
    $salesTax16 = $conn->real_escape_string($_POST['salesTax16']);
    $item16TotalUp = $conn->real_escape_string($_POST['item16TotalUp']);
    $item16TotalTax = $conn->real_escape_string($_POST['item16TotalTax']);
    $item16Total = $conn->real_escape_string($_POST['item16Total']);
    $item16Des = $conn->real_escape_string($_POST['item16Des']);
    $purchase16Link = $conn->real_escape_string($_POST['purchase16Link']);

    //Product Line 17
    $item17Quantity = $conn->real_escape_string($_POST['item17Quantity']);
    $item17UnitPrice = $conn->real_escape_string($_POST['item17UnitPrice']);
    $upcharge17Per = $conn->real_escape_string($_POST['upcharge17Per']);
    $salesTax17 = $conn->real_escape_string($_POST['salesTax17']);
    $item17TotalUp = $conn->real_escape_string($_POST['item17TotalUp']);
    $item17TotalTax = $conn->real_escape_string($_POST['item17TotalTax']);
    $item17Total = $conn->real_escape_string($_POST['item17Total']);
    $item17Des = $conn->real_escape_string($_POST['item17Des']);
    $purchase17Link = $conn->real_escape_string($_POST['purchase17Link']);

    //Product Line 18
    $item18Quantity = $conn->real_escape_string($_POST['item18Quantity']);
    $item18UnitPrice = $conn->real_escape_string($_POST['item18UnitPrice']);
    $upcharge18Per = $conn->real_escape_string($_POST['upcharge18Per']);
    $salesTax18 = $conn->real_escape_string($_POST['salesTax18']);
    $item18TotalUp = $conn->real_escape_string($_POST['item18TotalUp']);
    $item18TotalTax = $conn->real_escape_string($_POST['item18TotalTax']);
    $item18Total = $conn->real_escape_string($_POST['item18Total']);
    $item18Des = $conn->real_escape_string($_POST['item18Des']);
    $purchase18Link = $conn->real_escape_string($_POST['purchase18Link']);

    //Product Line 19
    $item19Quantity = $conn->real_escape_string($_POST['item19Quantity']);
    $item19UnitPrice = $conn->real_escape_string($_POST['item19UnitPrice']);
    $upcharge19Per = $conn->real_escape_string($_POST['upcharge19Per']);
    $salesTax19 = $conn->real_escape_string($_POST['salesTax19']);
    $item19TotalUp = $conn->real_escape_string($_POST['item19TotalUp']);
    $item19TotalTax = $conn->real_escape_string($_POST['item19TotalTax']);
    $item19Total = $conn->real_escape_string($_POST['item19Total']);
    $item19Des = $conn->real_escape_string($_POST['item19Des']);
    $purchase19Link = $conn->real_escape_string($_POST['purchase19Link']);

    //Product Line 20
    $item20Quantity = $conn->real_escape_string($_POST['item20Quantity']);
    $item20UnitPrice = $conn->real_escape_string($_POST['item20UnitPrice']);
    $upcharge20Per = $conn->real_escape_string($_POST['upcharge20Per']);
    $salesTax20 = $conn->real_escape_string($_POST['salesTax20']);
    $item20TotalUp = $conn->real_escape_string($_POST['item20TotalUp']);
    $item20TotalTax = $conn->real_escape_string($_POST['item20TotalTax']);
    $item20Total = $conn->real_escape_string($_POST['item20Total']);
    $item20Des = $conn->real_escape_string($_POST['item20Des']);
    $purchase20Link = $conn->real_escape_string($_POST['purchase20Link']);


    $productLineItemTotal = $conn->real_escape_string($_POST['productLineItemTotal']);


    //Service Line 1
    $service1Quantity = $conn->real_escape_string($_POST['service1Quantity']);
    $service1Des = $conn->real_escape_string($_POST['service1Des']);
    $service1UnitPrice = $conn->real_escape_string($_POST['service1UnitPrice']);
    $service1Total = $conn->real_escape_string($_POST['service1Total']);

    //Service Line 2
    $service2Quantity = $conn->real_escape_string($_POST['service2Quantity']);
    $service2Des = $conn->real_escape_string($_POST['service2Des']);
    $service2UnitPrice = $conn->real_escape_string($_POST['service2UnitPrice']);
    $service2Total = $conn->real_escape_string($_POST['service2Total']);

    //Service Line 3
    $service3Quantity = $conn->real_escape_string($_POST['service3Quantity']);
    $service3Des = $conn->real_escape_string($_POST['service3Des']);
    $service3UnitPrice = $conn->real_escape_string($_POST['service3UnitPrice']);



    $quoteProductSubtotal = $conn->real_escape_string($_POST['quoteProductSubtotal']);
    $quoteServiceSubtotal = $conn->real_escape_string($_POST['quoteServiceSubtotal']);
    $quoteTaxTotal = $conn->real_escape_string($_POST['quoteTaxTotal']);
    $quoteUpchargeTotal = $conn->real_escape_string($_POST['quoteUpchargeTotal']);
    $quoteTotal = $conn->real_escape_string($_POST['quoteTotal']);
    $upFrontTotal = $conn->real_escape_string($_POST['upFrontTotal']);
    $quoteProfitTotal = $conn->real_escape_string($_POST['quoteProfitTotal']);



    $quoteStatus = $conn->real_escape_string($_POST['quoteStatus']);




    $sql = "INSERT INTO quotes(uid, creationDate, salesRep, expirationDate, upFrontPer, applyUpFrontPer, item1Quantity, item1UnitPrice, upcharge1Per, salesTax1, item1TotalUp, item1TotalTax, item1Total, item1Des, purchase1Link, item2Quantity, item2UnitPrice, upcharge2Per, salesTax2, item2TotalUp, item2TotalTax, item2Total, item2Des, purchase2Link, item3Quantity, item3UnitPrice, upcharge3Per, salesTax3, item3TotalUp, item3TotalTax, item3Total, item3Des, purchase3Link, item4Quantity, item4UnitPrice, upcharge4Per, salesTax4, item4TotalUp, item4TotalTax, item4Total, item4Des, purchase4Link, item5Quantity, item5UnitPrice, upcharge5Per, salesTax5, item5TotalUp, item5TotalTax, item5Total, item5Des, purchase5Link, item6Quantity, item6UnitPrice, upcharge6Per, salesTax6, item6TotalUp, item6TotalTax, item6Total, item6Des, purchase6Link, item7Quantity, item7UnitPrice, upcharge7Per, salesTax7, item7TotalUp, item7TotalTax, item7Total, item7Des, purchase7Link, item8Quantity, item8UnitPrice, upcharge8Per, salesTax8, item8TotalUp, item8TotalTax, item8Total, item8Des, purchase8Link, item9Quantity, item9UnitPrice, upcharge9Per, salesTax9, item9TotalUp, item9TotalTax, item9Total, item9Des, purchase9Link, item10Quantity, item10UnitPrice, upcharge10Per, salesTax10, item10TotalUp, item10TotalTax, item10Total, item10Des, purchase10Link, item11Quantity, item11UnitPrice, upcharge11Per, salesTax11, item11TotalUp, item11TotalTax, item11Total, item11Des, purchase11Link, item12Quantity, item12UnitPrice, upcharge12Per, salesTax12, item12TotalUp, item12TotalTax, item12Total, item12Des, purchase12Link, item13Quantity, item13UnitPrice, upcharge13Per, salesTax13, item13TotalUp, item13TotalTax, item13Total, item13Des, purchase13Link, item14Quantity, item14UnitPrice, upcharge14Per, salesTax14, item14TotalUp, item14TotalTax, item14Total, item14Des, purchase14Link, item15Quantity, item15UnitPrice, upcharge15Per, salesTax15, item15TotalUp, item15TotalTax, item15Total, item15Des, purchase15Link, item16Quantity, item16UnitPrice, upcharge16Per, salesTax16, item16TotalUp, item16TotalTax, item16Total, item16Des, purchase16Link, item17Quantity, item17UnitPrice, upcharge17Per, salesTax17, item17TotalUp, item17TotalTax, item17Total, item17Des, purchase17Link, item18Quantity, item18UnitPrice, upcharge18Per, salesTax18, item18TotalUp, item18TotalTax, item18Total, item18Des, purchase18Link, item19Quantity, item19UnitPrice, upcharge19Per, salesTax19, item19TotalUp, item19TotalTax, item19Total, item19Des, purchase19Link, item20Quantity, item20UnitPrice, upcharge20Per, salesTax20, item20TotalUp, item20TotalTax, item20Total, item20Des, purchase20Link, productLineItemTotal, service1Quantity, service1Des, service1UnitPrice, service1Total, service2Quantity, service2Des, service2UnitPrice, service2Total, service3Quantity, service3Des, service3UnitPrice, service3Total, quoteProductSubtotal, quoteServiceSubtotal, quoteTaxTotal, quoteUpchargeTotal, quoteTotal, upFrontTotal, quoteProfitTotal, quoteStatus)
VALUES('$uid', '$creationDate', '$salesRep', '$expirationDate', '$upFrontPer', '$applyUpFrontPer', '$item1Quantity', '$item1UnitPrice', '$upcharge1Per', '$salesTax1', '$item1TotalUp', '$item1TotalTax', '$item1Total', '$item1Des', '$purchase1Link', '$item2Quantity', '$item2UnitPrice', '$upcharge2Per', '$salesTax2', '$item2TotalUp', '$item2TotalTax', '$item2Total', '$item2Des', '$purchase2Link', '$item3Quantity', '$item3UnitPrice', '$upcharge3Per', '$salesTax3', '$item3TotalUp', '$item3TotalTax', '$item3Total', '$item3Des', '$purchase3Link', '$item4Quantity', '$item4UnitPrice', '$upcharge4Per', '$salesTax4', '$item4TotalUp', '$item4TotalTax', '$item4Total', '$item4Des', '$purchase4Link', '$item5Quantity', '$item5UnitPrice', '$upcharge5Per', '$salesTax5', '$item5TotalUp', '$item5TotalTax', '$item5Total', '$item5Des', '$purchase5Link', '$item6Quantity', '$item6UnitPrice', '$upcharge6Per', '$salesTax6', '$item6TotalUp', '$item6TotalTax', '$item6Total', '$item6Des', '$purchase6Link', '$item7Quantity', '$item7UnitPrice', '$upcharge7Per', '$salesTax7', '$item7TotalUp', '$item7TotalTax', '$item7Total', '$item7Des', '$purchase7Link', '$item8Quantity', '$item8UnitPrice', '$upcharge8Per', '$salesTax8', '$item8TotalUp', '$item8TotalTax', '$item8Total', '$item8Des', '$purchase8Link', '$item9Quantity', '$item9UnitPrice', '$upcharge9Per', '$salesTax9', '$item9TotalUp', '$item9TotalTax', '$item9Total', '$item9Des', '$purchase9Link', '$item10Quantity', '$item10UnitPrice', '$upcharge10Per', '$salesTax10', '$item10TotalUp', '$item10TotalTax', '$item10Total', '$item10Des', '$purchase10Link', '$item11Quantity', '$item11UnitPrice', '$upcharge11Per', '$salesTax11', '$item11TotalUp', '$item11TotalTax', '$item11Total', '$item11Des', '$purchase11Link', '$item12Quantity', '$item12UnitPrice', '$upcharge12Per', '$salesTax12', '$item12TotalUp', '$item12TotalTax', '$item12Total', '$item12Des', '$purchase12Link', '$item13Quantity', '$item13UnitPrice', '$upcharge13Per', '$salesTax13', '$item13TotalUp', '$item13TotalTax', '$item13Total', '$item13Des', '$purchase13Link', '$item14Quantity', '$item14UnitPrice', '$upcharge14Per', '$salesTax14', '$item14TotalUp', '$item14TotalTax', '$item14Total', '$item14Des', '$purchase14Link', '$item15Quantity', '$item15UnitPrice', '$upcharge15Per', '$salesTax15', '$item15TotalUp', '$item15TotalTax', '$item15Total', '$item15Des', '$purchase15Link', '$item16Quantity', '$item16UnitPrice', '$upcharge16Per', '$salesTax16', '$item16TotalUp', '$item16TotalTax', '$item16Total', '$item16Des', '$purchase16Link', '$item17Quantity', '$item17UnitPrice', '$upcharge17Per', '$salesTax17', '$item17TotalUp', '$item17TotalTax', '$item17Total', '$item17Des', '$purchase17Link', '$item18Quantity', '$item18UnitPrice', '$upcharge18Per', '$salesTax18', '$item18TotalUp', '$item18TotalTax', '$item18Total', '$item18Des', '$purchase18Link', '$item19Quantity', '$item19UnitPrice', '$upcharge19Per', '$salesTax19', '$item19TotalUp', '$item19TotalTax', '$item19Total', '$item19Des', '$purchase19Link', '$item20Quantity', '$item20UnitPrice', '$upcharge20Per', '$salesTax20', '$item20TotalUp', '$item20TotalTax', '$item20Total', '$item20Des', '$purchase20Link', '$productLineItemTotal', '$service1Quantity', '$service1Des', '$service1UnitPrice', '$service1Total', '$service2Quantity', '$service2Des', '$service2UnitPrice', '$service2Total', '$service3Quantity', '$service3Des', '$service3UnitPrice', '$service3Total', '$quoteProductSubtotal', '$quoteServiceSubtotal', '$quoteTaxTotal', '$quoteUpchargeTotal', '$quoteTotal', '$upFrontTotal', '$quoteProfitTotal', '$quoteStatus');";


    if ($conn->query($sql)) {
        header("Location: newQuoteCreated.php");

    } else {
        echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();

