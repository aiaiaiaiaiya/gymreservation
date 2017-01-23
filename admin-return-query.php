<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  $customerID = $_POST['memberid'];
  $rentingid = $_POST['rentingid'];
  $currenttime= date('Y/m/d h:i:sa');
  $queryiteminfo = mysqli_query($dbc,"UPDATE ItemRenting SET returnTime = '$currenttime' WHERE rentingId= '$rentingid' ");
  $queryitemrrenting = mysqli_query($dbc,"UPDATE ItemInfo SET itemAvailable='Available' WHERE itemID=(SELECT itemID FROM ItemRenting WHERE rentingID= '$rentingid')");
?>
