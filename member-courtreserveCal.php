<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$courtID = $_POST["courtID"];
$datetime = $_POST["dateTime"];
$dateobj = new DateTime($datetime);
$date = $dateobj->format('Y-m-d');
$date = $date."%";

$customerID = $_SEESION["customerID"];

$dtchk = $datetime."%";
$queryCheckRedun = mysqli_query($dbc,"SELECT * FROM Reservation WHERE courtID = '$courtID' AND timeslot LIKE '$dtcheck' AND customerID='$customerID'");
if ($resultcheck = mysqli_fetch_assoc($queryCheckRedun)) {
  $output = array( "status" => "errRedun");
}
else {
  $query = "SELECT timeslot FROM CourtTimeTable WHERE courtID = '$courtID' AND timeslot LIKE '$date' AND courtStatus='Available' ORDER BY timeslot ASC";
  $resultquery = mysqli_query($dbc,$query);
  $output = array();
  while($result = mysqli_fetch_assoc($resultquery)){
      $row_array = array("timeslot" => $result["timeslot"]);
      array_push($output, $row_array);
  }
}
echo json_encode($output);
?>
