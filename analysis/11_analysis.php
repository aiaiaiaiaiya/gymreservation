<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT customerID,comment FROM MemberReview WHERE courtID='Badminton01'  ";
$result = mysqli_query($dbc,$query);
$arr = array();
$output = array();
while ($row = mysqli_fetch_assoc($result)) {
  $arr = array('customerID' => $row['customerID'],
  'comment' => $row['comment']
);
  array_push($output,$arr);
}
echo json_encode($output);
 ?>
