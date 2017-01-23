<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT packageName , COUNT(*) as countPurchase FROM PurchaseCredit GROUP BY packageName ORDER BY countPurchase DESC";
$result = mysqli_query($dbc,$query);
$arr = array();
$output = array();
while ($row = mysqli_fetch_assoc($result)) {
  $arr = array('packageName' => $row['packageName'],
  'countPurchase' => $row['countPurchase']
);
  array_push($output,$arr);
}
echo json_encode($output);
 ?>
