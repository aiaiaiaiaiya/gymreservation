<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$value = $_POST["input"];
$query = "DELETE FROM PackageCredit WHERE packageName = '$value'";
$result = mysqli_query($dbc,$query);
$output = $value;

echo json_encode($output);
?>
