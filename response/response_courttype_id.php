<?php
session_start();
$type = $_POST['courtType'];
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$courtlist = mysqli_query($dbc,"SELECT DISTINCT courtID FROM CourtInfo WHERE courtType = '$type' ");
$output = array();

  while ($row = mysqli_fetch_assoc($courtlist)) {
    $row_array = array('courtID'=>$row["courtID"]);
    array_push($output, $row_array);
  }
echo json_encode($output);
 ?>
