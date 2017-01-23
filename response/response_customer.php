<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  if (isset($_POST['memberid'])) {
    $memberid = $_POST['memberid'];
    $query = mysqli_query($dbc,"SELECT * FROM Customer WHERE customerID = '$memberid'");
    if ($row=mysqli_fetch_assoc($query)) {
        $output = array( "status" => "found",
        "customerID" => $row["customerID"],
        "fname" => $row["fname"],
        "lname" => $row["lname"],
        "phone" => $row["phone"],
        "email" => $row["email"],
        "password" => $row["password"],
        "DOB" => $row["DOB"],
        "disease" => $row["disease"],
        "bloodType" => $row["bloodType"],
        "allergy" => $row["allergy"],
        "regisDate" => $row["regisDate"],
        "role" => $row["role"],
        "credits" => $row["credits"]);
    }
    else{
      $output = array("status" => "notfound");
    }
  }
  else {
    $output = array("status" => "error");
  }
  echo json_encode($output);
 ?>
