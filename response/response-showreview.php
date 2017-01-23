<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$output = array();
$arr = array();
$query = "SELECT courtID,rating,comment FROM MemberReview ORDER BY reviewID";
$result = mysqli_query($dbc,$query);
while($row = mysqli_fetch_assoc($result)){
  $output = array('courtID'=>$row["courtID"],'rating'=>$row["rating"],'comment'=>$row["comment"]);
  array_push($arr,$output);
}

echo json_encode($arr);
 ?>
