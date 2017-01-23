<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

$query = "SELECT DISTINCT(courtID) FROM Reservation";
$courtIDNamequery = mysqli_query($dbc,$query);
$output = array();
while($courtID = mysqli_fetch_assoc($courtIDNamequery)){
    $check = $courtID['courtID'];
    $result = "SELECT t1.courtID, t1.timeReserve, MAX(t1.numOfReserve) AS MaxReserve FROM (SELECT courtID, CAST( timeslot AS TIME ) AS timeReserve, COUNT(reserveNo) AS numOfReserve FROM Reservation GROUP BY courtID, timeReserve ORDER BY courtID, numOfReserve DESC) as t1 WHERE courtID='$check'";
    $row = mysqli_query($dbc,$result);
    $resultq = mysqli_fetch_assoc($row);
    $row_array = array( "courtID" => $resultq['courtID'],
    "time" => $resultq['timeReserve'],
    "numOfReserve" => $resultq['MaxReserve']);
    array_push($output, $row_array);
 }
echo json_encode($output);
?>
