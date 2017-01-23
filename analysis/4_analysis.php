<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT r.customerID,c.fName, c.lName, SUM(r.totalHOur) as TotalOfHour, c.regisDate FROM Reservation r,Customer c  WHERE r.customerID=c.CustomerID GROUP BY r.customerID  ORDER BY customerID DESC";
$result = mysqli_query($dbc,$query);
$arr = array();
$output = array();
while ($row = mysqli_fetch_assoc($result)) {
  $arr = array('customerID' => $row['customerID'],
  'fName' => $row['fName'],
  'lName' => $row['lName'],
  'totalHour' => $row['TotalOfHour']
);
  array_push($output,$arr);
}
echo json_encode($output);
 ?>
