<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$DOB = $_POST['DOB'];
$disease = $_POST['disease'];
$addDisease = $_POST['addDisease'];
$bloodType = $_POST['bloodType'];
$allergy = $_POST['allergy'];
$datetoday = date('Y/m/d h:i:sa');
$result = mysqli_query($dbc,"SELECT * FROM Customer WHERE email = '$email'");
$row_cnt = mysqli_num_rows($result);
$status = 0;

if ($disease == "others") {
  $disease = $addDisease;
}
if ($disease == "-") {
  $disease = "No disease";
}

if ($row_cnt==0) {
  if ($allergy == null) {
    $allergy = "-";
  }
  if ($password == $confirmpassword AND (strlen($password) >= 8 AND strlen($password) <= 12)) {
    $password = md5($password);
    if ($fname != null AND $lname != null AND $phone != null AND $email != null AND $DOB != null AND $disease != null AND $bloodType != null AND $password != null) {
      $query = "INSERT INTO Customer VALUES(DEFAULT,'$fname','$lname','$phone','$email','$password','$DOB','$disease','$bloodType','$allergy','$datetoday',DEFAULT,DEFAULT)";
      mysqli_query($dbc,$query);
      $status = 1;

      $logincheck = mysqli_query($dbc,"SELECT * FROM Customer WHERE email = '$email' AND password = '$password'");
      $row = mysqli_fetch_assoc($logincheck);
      $_SESSION["customerID"] = $row["customerID"];
      $arr = array('output' => 1);
      echo json_encode($arr);
    }else{
      $arr = array('output' => '*All information must be filled', 'status' => $status);
      echo json_encode($arr);
    }
  }else{
    $arr = array('output' => '*Your password must have more than 8-12 characters or password does not match', 'status' => $status);
    echo json_encode($arr);
  }

}else{
  $arr = array('output' => '*Email has been used', 'status' => $status);
  echo json_encode($arr);
}

   ?>
