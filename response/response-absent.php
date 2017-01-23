<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$time = $_POST["datetime"];
$query = "SELECT * FROM Reservation WHERE checkInStatus = 'Reserved'";
$result = mysqli_query($dbc,$query);
$output = array();
$arr = array();
while($row = mysqli_fetch_assoc($result)){
  $dt = new DateTime($row["timeslot"]);
  $time = $dt->format('H:i:s');
  $date = $dt->format('m/d/Y');
  $new = new DateTime();
  $newTime = $new->format('H:i:s');
  $newDate = $new->format('m/d/Y');
  //echo $newTime;
  if ($time<$newTime && $date<=$newDate) {
    $reserveNo = $row['reserveNo'];
    $query = "UPDATE Reservation SET checkInStatus = 'Absent' WHERE reserveNo = $reserveNo";
    mysqli_query($dbc,$query);
    $output = array('status' => "Success","reserveNo" => $row["reserveNo"],"customerID" => $row["customerID"], "timeslot" => $row["timeslot"], "checkInStatus" => 'Absent');
    array_push($arr,$output);
  }else {
    $output = array("status" => 'No Absence');
    array_push($arr,$output);
  }
}

echo json_encode($arr);
 ?>
