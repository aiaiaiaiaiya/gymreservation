<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$memid = $_POST["memid"];
if(isset($memid)){
  $query = "SELECT * FROM Reservation WHERE customerID = '$memid' AND checkInStatus ='Reserved' ORDER BY timeslot DESC";
  $queryCustomer = "SELECT customerID FROM Customer WHERE customerID = '$memid'";
  $resultCustomer = mysqli_query($dbc,$queryCustomer);
  $result = mysqli_query($dbc,$query);
  $output = array();
  if (mysqli_num_rows($result)==0 && mysqli_num_rows($resultCustomer)==1) {
    $output = array("status" => "noHistory");
  }else{
    while($row = mysqli_fetch_assoc($result)){
        $row_array = array( "status" => "success",
        "reserveNo" => $row["reserveNo"],
        "timestamp" => $row["timestamp"],
        "customerID" => $row["customerID"],
        "courtID" => $row["courtID"],
        "timeslot" => $row["timeslot"],
        "totalHour" => $row["totalHour"],
        "totalCreditPaid" => $row["totalCreditPaid"],
        "checkInStatus" => $row["checkInStatus"]);
    array_push($output, $row_array);
    }


  }
  echo json_encode($output);
 }
 ?>
