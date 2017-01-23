<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$del = $_POST["del"];
if ($del=="del") {
  $courtlist = mysqli_query($dbc,"SELECT courtID,courtType, creditPerHour, description FROM CourtInfo");
}else{
  $courtlist = mysqli_query($dbc,"SELECT courtID,courtType, creditPerHour, description FROM CourtInfo GROUP BY courtType");
}

$output = array();

while ($row = mysqli_fetch_assoc($courtlist)) {
  $row_array = array("courtID"=>$row["courtID"],"courtType"=>$row["courtType"],
  "creditPerHour" => $row["creditPerHour"],
  "Description" => $row["description"]);
  array_push($output, $row_array);
  //echo $output;
}

echo json_encode($output);
?>
