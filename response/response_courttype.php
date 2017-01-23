<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$courtlist = mysqli_query($dbc,"SELECT DISTINCT courtType FROM CourtInfo ");
$output = array();

  while ($row = mysqli_fetch_assoc($courtlist)) {
    $row_array = array('courtType'=>$row["courtType"]);
    array_push($output, $row_array);
  }

echo json_encode($output);
 ?>
