<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  if (isset($_POST['memberName'])) {
    $memberName = $_POST['memberName'];
    $query = mysqli_query($dbc,"SELECT * FROM Customer WHERE fname = '$memberName'");
    $count = mysqli_num_rows($query);
    $output = array();
    if($count > 0){
      while ($row=mysqli_fetch_assoc($query)) {
          $row_array = array( "status" => "found",
          "count" => $count,
          "customerID" => $row["customerID"],
          "fname" => $row["fname"],
          "lname" => $row["lname"],
          "phone" => $row["phone"],
          "email" => $row["email"],
          "DOB" => $row["DOB"],
          "disease" => $row["disease"],
          "bloodType" => $row["bloodType"],
          "allergy" => $row["allergy"],
          "regisDate" => $row["regisDate"],
          "credits" => $row["credits"]);
          array_push($output, $row_array);
      }
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
