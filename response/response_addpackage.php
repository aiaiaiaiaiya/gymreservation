<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  $packageName = $_POST["packageName"];
  $price = $_POST["price"];
  $creditPoint = $_POST["creditPoint"];
  $query = "INSERT INTO PackageCredit VALUES ('$packageName', '$price', '$creditPoint')";
  $resultquery = mysqli_query($dbc,$query);

?>
