<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$dateNow = new DateTime();
$result = $dateNow->format('m');
$mycheck = "%-".$result."-%";
$query = "SELECT customerID, fname, lname, DOB FROM Customer WHERE DOB LIKE '$mycheck'";
$resultquery = mysqli_query($dbc,$query);
$output = array();
while($row = mysqli_fetch_assoc($resultquery)){
    $row_array = array(
      "customerID" => $row["customerID"],
      "fname" => $row["fname"],
      "lname" => $row["lname"],
      "DOB" => $row["DOB"]
    );
    array_push($output, $row_array);
}

echo json_encode($output);
 ?>
