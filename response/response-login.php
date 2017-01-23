<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$email = $_POST['email'];
$password = md5($_POST['password']);
$_SESSION["loginstatus"]=0;
$status = 0;
$logincheck = mysqli_query($dbc,"SELECT * FROM Customer WHERE email = '$email' AND password = '$password'");
if ($email != null OR $password != null) {
  if (mysqli_num_rows($logincheck) == 1) {
      $status=1;
      $_SESSION["loginstatus"]=1;
      $row = mysqli_fetch_assoc($logincheck);
      if ($row["role"]=="admin") {
        $status = 2;
      }
      $_SESSION["customerID"] = $row["customerID"];
      $_SESSION["fname"] = $row["fname"];
      $_SESSION["lname"] = $row["lname"];
      $_SESSION["phone"] = $row["phone"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["password"] = $row["password"];
      $_SESSION["DOB"] = $row["DOB"];
      $_SESSION["disease"] = $row["disease"];
      $_SESSION["bloodType"] = $row["bloodType"];
      $_SESSION["allergy"] = $row["allergy"];
      $_SESSION["regisDate"] = $row["regisDate"];
      $_SESSION["role"] = $row["role"];
      $_SESSION["credits"] = $row["credits"];
      $arr = array('output' => $status);
      echo json_encode($arr);
  } else {
    $arr = array('output' => '*Invalid&nbsp; Email&nbsp; or&nbsp; Password*');
    echo json_encode($arr);
  }

}
   ?>
