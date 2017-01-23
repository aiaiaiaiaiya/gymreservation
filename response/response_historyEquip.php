<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
  $memberid=$_SESSION["customerID"];
  if ($memberid!=null) {
    $query = "SELECT * FROM ItemRenting WHERE customerID = '$memberid' ORDER BY rentingID DESC";
    $resultquery = mysqli_query($dbc,$query);
    $output = array();
    if (mysqli_num_rows($resultquery)==0) {
      $output = array("status" => "noHistory");
    }
    else {
      while($row = mysqli_fetch_assoc($resultquery)){
          $row_array = array( "status" => "success",
          "rentingID" => $row["rentingID"],
          "customerID" => $row["customerID"],
          "rentingTime" => $row["rentingTime"],
          "returnTime" => $row["returnTime"],
          "itemID" => $row["itemID"],
          "totalCreditPaid" => $row["totalcreditPaid"]);
      array_push($output, $row_array);
      }
    }
  }
  else {
    $output = array("status" => "error");
  }
  echo json_encode($output);
 ?>
