<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  $itemid = $_POST['itemid'];
  $itemtype = $_POST['itemtype'];
  $credit= $_POST['credit'];
  $query = "INSERT INTO ItemInfo VALUES ('$itemid','$credit',DEFAULT,'$itemtype')";
  $resultquery = mysqli_query($dbc,$query);

?>
