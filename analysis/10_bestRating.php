<?php
// SELECT courtID, AVG(rating) AS rating FROM MemberReview GROUP BY courtID ORDER BY rating DESC
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT courtID, AVG(rating) AS rating FROM MemberReview GROUP BY courtID ORDER BY rating DESC";
$result = mysqli_query($dbc,$query);
$arr = array();
$output = array();
while ($row = mysqli_fetch_assoc($result)) {
  $arr = array('courtID' => $row['courtID'], 'rating' => $row['rating']);
  array_push($output,$arr);
}
echo json_encode($output);
 ?>
