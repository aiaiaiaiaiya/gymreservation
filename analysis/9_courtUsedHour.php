<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT SUM(totalHour) AS TotalUsedHour , courtID FROM Reservation GROUP BY courtID ORDER BY TotalUsedHour DESC";
$resultquery = mysqli_query($dbc,$query);
$output = array();
while($row = mysqli_fetch_assoc($resultquery)){
    $row_array = array(
      "courtID" => $row["courtID"],
      "TotalUsedHour" => $row["TotalUsedHour"]
    );
    array_push($output, $row_array);
}

echo json_encode($output);
 ?>
