<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$reserveno = $_POST['reserveno'];
//$output = $reserveno;
if (isset($reserveno)) {
  $query = "UPDATE Reservation SET checkInStatus = 'Checked In' WHERE reserveNo = $reserveno";
  $result = mysqli_query($dbc,$query);
  $output = array('output' => 'Success', 'reserveno' => $reserveno);
}else{
  $output = array('output' => 'Fail');
}
echo json_encode($output);
 ?>
