<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
  $memberid=$_SESSION["customerID"];
  if ($memberid!=null) {
    $query = "SELECT * FROM Reservation WHERE customerID = '$memberid' ORDER BY timeslot DESC";
    $resultquery = mysqli_query($dbc,$query);
    $output = array();
    if (mysqli_num_rows($resultquery)==0) {
      $output = array("status" => "noHistory");
    }
    else {
      while($row = mysqli_fetch_assoc($resultquery)){
          //$dt = new DateTime($row["timeslot"]);
          $row_array = array( "status" => "success",
          "reserveNo" => $row["reserveNo"],
          "timestamp" => $row["timestamp"],
          "customerID" => $row["customerID"],
          "courtID" => $row["courtID"],
          "timeslot" => $row["timeslot"],
          "totalHour" => $row["totalHour"],
          "totalCreditPaid" => $row["totalCreditPaid"],
          "checkInStatus" => $row["checkInStatus"]);
          // Reserved = จองแล้ว
          // Checked-in = จองแล้วมาเล่นแล้ว(คือไม่มีปัญหาอะไร)
          // Canceled = ยกเลิก
          // Abcent = ไม่มาตามที่จองไว้
      array_push($output, $row_array);
      }
    }
  }
  else {
    $output = array("status" => "error");
  }
  echo json_encode($output);
 ?>
