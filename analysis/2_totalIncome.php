<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT courtID, SUM(totalCreditPaid) AS Income FROM Reservation GROUP BY courtID ORDER BY Income DESC";
$result = mysqli_query($dbc,$query);
$arr = array();
$output = array();
while ($row = mysqli_fetch_assoc($result)) {
  $arr = array('courtID' => $row['courtID'], 'totalCreditPaid' => $row['Income']);
  array_push($output,$arr);
}
echo json_encode($output);
 ?>
