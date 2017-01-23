<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

  if (isset($_POST['memberid'])) {
    $memberid = $_POST['memberid'];
    $query = "SELECT * FROM ItemRenting WHERE customerID = '$memberid' AND returnTime = '0000-00-00 00:00:00' ";
    $resultquery = mysqli_query($dbc,$query);
    $output =array();
    while ($row=mysqli_fetch_assoc($resultquery)){

        $row_array = array( "status" => "found",
        "rentingID" => $row["rentingID"],
        "rentingTime" => $row["rentingTime"],
        "returnTime" => $row["returnTime"],
        "itemID" => $row["itemID"],
        "totalcreditPaid" => $row["totalcreditPaid"]);

      array_push($output, $row_array);
    }
  }
  echo json_encode($output);
 ?>
