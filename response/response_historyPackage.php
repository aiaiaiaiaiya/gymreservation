<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$memberid=$_SESSION["customerID"];
if ($memberid!=null) {
  $query = "SELECT pur.invoiceNo, pur.timestamp, pur.packageName, pac.price, pac.creditPoint FROM PackageCredit pac ,PurchaseCredit pur  WHERE pur.customerID = '$memberid' AND pur.packageName=pac.packageName ORDER BY pur.invoiceNo DESC";
  $resultquery = mysqli_query($dbc,$query);
  $output = array();
  if (mysqli_num_rows($resultquery)==0) {
    $output = array("status" => "noHistory");
  }
  else {
    while($result = mysqli_fetch_assoc($resultquery)){
      $row_array = array(
      "invoiceNo" => $result["invoiceNo"],
      "timestamp" => $result["timestamp"],
      "packageName" => $result["packageName"],
      "price" => $result["price"],
      "creditPoint" => $result["creditPoint"]);
      array_push($output, $row_array);
    }
  }
}
else {
  $output = array("status" => "error");
}
echo json_encode($output);
?>
