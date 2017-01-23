<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$courtType = $_POST["courtType"];
$court = $courtType."%";
$datetime = $_POST["dateTime"];
$dateobj = new DateTime($datetime);
$date = $dateobj->format('Y-m-d');
$date = $date."%";
$datetimeNow = date("Y-m-d H:i:sa");
$logincheck = mysqli_query($dbc,"SELECT * FROM CourtTimeTable WHERE courtID LIKE '$court' AND courtStatus='Available' AND timeslot LIKE '$date' AND timeslot > '$datetimeNow'");
if (mysqli_num_rows($logincheck)==0) {
  $output = "noCourt";
}
else {
  $output = array();
  while ($row = mysqli_fetch_assoc($logincheck)) {
    //$dt = new DateTime($row["timeslot"]);
    //$time = $dt->format('H:i:s');
    $arr = array(
      'courtID'=>$row["courtID"],
      'datetime'=>$row["timeslot"]);
    array_push($output,$arr);
  }
}

echo json_encode($output);
 ?>
