<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

if (isset($_POST['option'] )) {
  $itemType = $_POST['option'];
  $query = "SELECT itemID FROM ItemInfo WHERE itemType = '$itemType' and itemAvailable = 'Available'";
  $resultquery = mysqli_query($dbc,$query);
  $output = array();
  while($result = mysqli_fetch_assoc($resultquery)){
    $row_array = array("itemID" => $result["itemID"]);
  array_push($output, $row_array);
  }
}
else{
  $output = "noItemTypeSelect";
}
echo json_encode($output);

?>
