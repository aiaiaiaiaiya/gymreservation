<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

$query = "SELECT Customer.customerID, fname, lname, COUNT( checkInStatus ) AS numOfAbsent FROM Customer JOIN Reservation ON Customer.customerID = Reservation.customerID WHERE checkInStatus = 'Absent' GROUP BY Customer.customerID HAVING COUNT( checkInStatus ) >3;";
$absentquery = mysqli_query($dbc,$query);
$output = array();
while($result = mysqli_fetch_assoc($absentquery)){
    $row_array = array( "customerID" => $result['customerID'],
      "fname" => $result['fname'],
      "lname" => $result['lname'],
      "numOfAbsent" => $result['numOfAbsent']);
    array_push($output, $row_array);
 }
echo json_encode($output);
?>
