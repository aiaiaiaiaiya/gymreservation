<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

if (!empty($_POST['memberid'])) {
  $memberid = $_POST['memberid'];
  $queryCustomer = mysqli_query($dbc,"SELECT credits FROM Customer WHERE customerID = '$memberid'");
  $creditINcustomer = mysqli_fetch_assoc($queryCustomer);

  if (isset($_POST['option'] )) {
    $packageName = $_POST['option'];
    $queryPackageCredit = mysqli_query($dbc,"SELECT creditPoint FROM PackageCredit WHERE packageName = '$packageName'");
    $creditINpackage = mysqli_fetch_assoc($queryPackageCredit);
    $resultCredit = $creditINcustomer["credits"] + $creditINpackage["creditPoint"];
    if(mysqli_query($dbc,"UPDATE Customer SET credits='$resultCredit' WHERE customerID = '$memberid'")){
      $timestamp = date('Y/m/d h:i:sa');
      if(mysqli_query($dbc,"INSERT INTO PurchaseCredit VALUES (DEFAULT,'$timestamp','$memberid','$packageName')")){
        $look=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT c.fname, c.lname, c.credits, p.invoiceNo, pk.price FROM PackageCredit pk, PurchaseCredit p, Customer c WHERE pk.packageName=p.packageName AND c.customerID=p.customerID AND p.customerID = '$memberid' AND p.timestamp='$timestamp'"));
        $output = array( "status" => "success",
        "timestamp" => $timestamp,
        "customerID" => $memberid,
        "fname" => $look["fname"],
        "lname" => $look["lname"],
        "credits" => $look["credits"],
        "creditb4topup" => $creditINcustomer['credits'],
        "packagename" => $packageName,
        "price" => $look["price"],
        "invoiceNo" => $look["invoiceNo"]);
      }
    }

    //$warn = "<div class='alert alert-success'><strong>Success!</strong> Member ID: ".$memberid." have purchase <b>".$packageName."</b> package. <br>Remaining credits is ".$resultCredit.".</div>";
  }
  else{
    $output = "nopackage";
  }
}
/*else {
  $warn = "<div class='alert alert-danger'><strong>Warning!</strong> No member ID inserted.</div>";
}*/
 echo json_encode($output);

 ?>
