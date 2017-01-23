<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

if (!empty($_POST['memberid'])) {
  $memberid = $_POST['memberid'];
  $queryCustomer = mysqli_query($dbc,"SELECT credits FROM Customer WHERE customerID = '$memberid'");
  $creditINcustomer = mysqli_fetch_assoc($queryCustomer);

  if (isset($_POST['option'] )) {
    $itemID = $_POST['option'];
    $queryItemCredit = mysqli_query($dbc,"SELECT creditPerItem FROM ItemInfo WHERE itemID = '$itemID' ");
    $creditINitem = mysqli_fetch_assoc($queryItemCredit);

    if($creditINcustomer["credits"] >= $creditINitem["creditPerItem"]){
      $resultCredit = $creditINcustomer["credits"] - $creditINitem["creditPerItem"];
      if(mysqli_query($dbc,"UPDATE Customer SET credits='$resultCredit' WHERE customerID = '$memberid'")){
        $timestamp = date('Y/m/d h:i:sa');
        $creditInsert = $creditINitem["creditPerItem"];
        if(mysqli_query($dbc,"INSERT INTO ItemRenting VALUES (DEFAULT,'$timestamp', DEFAULT, '$memberid','$itemID', '$creditInsert')")){

          mysqli_query($dbc,"UPDATE ItemInfo SET itemAvailable = 'Unavailable' WHERE itemID = '$itemID' ");
          $look=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT c.fname, c.lname, c.credits, ir.rentingID, i.creditPerItem FROM ItemRenting ir, ItemInfo i, Customer c WHERE ir.itemID=i.itemID AND c.customerID=ir.customerID AND ir.customerID = '$memberid' AND ir.rentingTime='$timestamp'"));
          $output = array( "status" => "success",
            "timestamp" => $timestamp,
            "customerID" => $memberid,
            "fname" => $look["fname"],
            "lname" => $look["lname"],
            "credits" => $look["credits"],
            "creditb4topup" => $creditINcustomer['credits'],
            "itemID" => $itemID,
            "creditPerItem" => $look["creditPerItem"],
            "rentingID" => $look["rentingID"]);
        }
      }
    }
    else{
      $output = "notEnoughCredits";
    }
  }
  else{
    $output = "noItem";
  }
}

echo json_encode($output);
?>
