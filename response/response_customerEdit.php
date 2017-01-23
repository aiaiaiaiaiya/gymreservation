<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
  $memberid=$_POST["memberid"];
  if (!empty($_POST['dise'])) {
    $dise = $_POST['dise'];
    mysqli_query($dbc,"UPDATE Customer SET disease='$dise' WHERE customerID = '$memberid'");
  }
  if (!empty($_POST['alle'])) {
    $alle = $_POST['alle'];
    mysqli_query($dbc,"UPDATE Customer SET allergy='$alle' WHERE customerID = '$memberid'");
  }
  if (!empty($_POST['fname'])) {
    $fname = $_POST['fname'];
    mysqli_query($dbc,"UPDATE Customer SET fname='$fname' WHERE customerID = '$memberid'");
  }
  if (!empty($_POST['lname'])) {
    $lname = $_POST['lname'];
    mysqli_query($dbc,"UPDATE Customer SET lname='$lname' WHERE customerID = '$memberid'");
  }
  if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    mysqli_query($dbc,"UPDATE Customer SET email='$email' WHERE customerID = '$memberid'");
  }

  if ($dise||$alle||$fname||$lname||$email) {
    $output = "success";
  }
  else{
    $output = "notChange";
  }


  echo json_encode($output);
 ?>
