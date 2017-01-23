<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$reserveNo = $_POST["resNo"];
$query = "UPDATE Reservation SET checkInStatus = 'Canceled'  WHERE reserveNo = '$reserveNo'";
if(mysqli_query($dbc,$query)){
  $queryavai = "UPDATE CourtTimeTable SET courtStatus = 'Available' WHERE courtID=(SELECT courtID FROM Reservation WHERE reserveNo = '$reserveNo') AND timeslot=(SELECT timeslot FROM Reservation WHERE reserveNo = '$reserveNo')";
  $avai = mysqli_query($dbc,$queryavai);

  $res = mysqli_query($dbc,"SELECT totalCreditPaid FROM Reservation WHERE reserveNo = '$reserveNo'");
  $creditToRefund = mysqli_fetch_assoc($res);
  $customerID = $_SESSION["customerID"];
  $res = mysqli_query($dbc,"SELECT credits FROM Customer WHERE customerID = '$customerID'");
  $creditRemain = mysqli_fetch_assoc($res);

  $creditNew = $creditToRefund["totalCreditPaid"] + $creditRemain["credits"];

  $queryrefund = "UPDATE Customer SET credits = '$creditNew' WHERE customerID = '$customerID'";
  mysqli_query($dbc,$queryrefund);
  $output = "success";
}
else {
  $output = "error";
}

echo json_encode($output);

?>
