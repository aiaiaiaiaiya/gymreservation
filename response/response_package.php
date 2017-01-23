<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT * FROM PackageCredit ORDER BY price ASC";
$resultquery = mysqli_query($dbc,$query);
$output = array();
while($result = mysqli_fetch_assoc($resultquery)){
  $row_array = array("packageName" => $result["packageName"],
  "price" => $result["price"],
  "creditPoint" => $result["creditPoint"]);
array_push($output, $row_array);
}
echo json_encode($output);

?>
