<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT DISTINCT(itemType) FROM ItemInfo";
$resultquery = mysqli_query($dbc,$query);
$output = array();
while($result = mysqli_fetch_assoc($resultquery)){
  $row_array = array("itemType" => $result["itemType"]);
array_push($output, $row_array);
}
echo json_encode($output);

?>
