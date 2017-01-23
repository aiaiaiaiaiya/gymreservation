<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

$query = "SELECT itemType, SUM( totalcreditPaid ) AS totalIncome FROM ItemInfo JOIN ItemRenting ON ItemInfo.itemID = ItemRenting.itemID GROUP BY itemType ORDER BY totalIncome DESC ";
$itemquery = mysqli_query($dbc,$query);
$output = array();
while($result = mysqli_fetch_assoc($itemquery)){
    $row_array = array( "itemType" => $result['itemType'],
      "totalIncome" => $result['totalIncome']);
    array_push($output, $row_array);
 }
echo json_encode($output);
?>
