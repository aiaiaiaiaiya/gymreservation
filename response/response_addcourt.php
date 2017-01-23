<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  $courtid = $_POST['courtid'];
  $courttype = $_POST['courttype'];
  $credit= $_POST['credit'];
  $description= $_POST['description'];
  $queryiteminfo = mysqli_query($dbc,"INSERT INTO CourtInfo VALUES ('$courtid',' $courttype','$description','$credit')");

?>
