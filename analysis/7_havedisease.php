<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT COUNT(*) AS amountMember , disease FROM Customer GROUP BY disease";
$resultquery = mysqli_query($dbc,$query);
$output = array();
while($row = mysqli_fetch_assoc($resultquery)){
    $row_array = array(
      "disease" => $row["disease"],
      "amountMember" => $row["amountMember"]
    );
    array_push($output, $row_array);
}

echo json_encode($output);
 ?>
