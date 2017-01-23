<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$value = $_POST["input"];
$query = "DELETE FROM CourtInfo WHERE courtID = '$value'";
$result = mysqli_query($dbc,$query);
$output = $value;

echo json_encode($output);
?>
