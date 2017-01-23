<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$date = $_POST["date"];
$date = $date."%";
$logincheck = mysqli_query($dbc,"SELECT DISTINCT ci.courtType FROM CourtInfo ci , CourtTimeTable ct WHERE ci.courtID = ct.courtID AND courtStatus ='Available' AND timeslot LIKE '$date'");
$output = array();
if (mysqli_num_rows($logincheck)==0) {
  $output = array("status" => "noCourt");
}
else {
  while ($row = mysqli_fetch_assoc($logincheck)) {
    $row_array = array('courtType'=>$row["courtType"]);
    array_push($output, $row_array);
  }
}
echo json_encode($output);
 ?>
