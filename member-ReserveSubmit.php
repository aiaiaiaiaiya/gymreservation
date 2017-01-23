<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");

$courtID = $_POST["courtID"];
$datetimeStart = $_POST["datetimeStart"];
//$datetimeEnd = $_POST["datetimeEnd"];
$customerID = $_SESSION["customerID"];
$amountHour = $_POST["amountHour"];

$queryPrice = mysqli_query($dbc,"SELECT creditPerHour FROM CourtInfo WHERE courtID = '$courtID'");
$result = mysqli_fetch_assoc($queryPrice);
$totalPaid = $result["creditPerHour"] * $amountHour;
$timestamp = date('Y-m-d h:i:sa');


//transaction check crashing
list($date, $time) = explode(' ', $datetimeStart);
list($hour, $min, $sec) = explode(':', $time);
$ymdStartFind = $date."%";
$cnt = 0;
for ($i=0; $i <= $amountHour ; $i++) {
  $hour=$hour+i;
  $hstartFind = "%".$hour.":00:00";
  $queryPrice = mysqli_query($dbc,"SELECT * FROM CourtTimeTable WHERE courtID = '$courtID' AND timeslot LIKE '$ymdStartFind' AND timeslot LIKE '$hstartFind' AND courtStatus='Available'");
  if (mysqli_num_rows($queryPrice)) {
    $cnt++;
  }
}

if ($cnt-1==$amountHour) {
  $queryCustomer = mysqli_query($dbc,"SELECT credits FROM Customer WHERE customerID = '$customerID'");
  $creditINcustomer = mysqli_fetch_assoc($queryCustomer);
  $resultCredit = $creditINcustomer["credits"] - $totalPaid;
  if ($resultCredit<0) {
    $output = array( "status" => "errNoCredit");
  }
  else {
    if(mysqli_query($dbc,"UPDATE Customer SET credits='$resultCredit' WHERE customerID = '$customerID'")){
      if(mysqli_query($dbc,"INSERT INTO Reservation VALUES (DEFAULT,'$timestamp','$customerID','$courtID','$datetimeStart','$amountHour','$totalPaid',DEFAULT)")){
        $query=mysqli_query($dbc,"SELECT c.fname, c.lname, c.credits, r.reserveNo, r.courtID, r.totalHour, ci.creditPerHour, r.timeslot, r.totalCreditPaid FROM Reservation r, Customer c , CourtInfo ci WHERE c.customerID=r.customerID AND r.customerID = '$customerID' AND r.timeslot LIKE '$datetimeStart' AND ci.courtID=r.courtID AND r.courtID = '$courtID' ");
        $look=mysqli_fetch_assoc($query);
        $output = array( "status" => "success",
        "timestamp" => $timestamp,
        "customerID" => $customerID,
        "fname" => $look["fname"],
        "lname" => $look["lname"],
        "credits" => $look["credits"],
        "reserveNo" => $look["reserveNo"],
        "courtID" => $look["courtID"],
        "creditPerHour" => $look["creditPerHour"],
        "timeslot" => $look["timeslot"],
        "totalHour" => $look["totalHour"],
        "totalCreditPaid" => $look["totalCreditPaid"]);
        $reserveNo=$look["reserveNo"];

        $ts = $look["timeslot"];
        list($date, $time) = explode(' ', $ts);
        list($hour, $min, $sec) = explode(':', $time);
        for ($i=0; $i < $amountHour; $i++) {
          $timefind = $date." ".$hour."%";
          mysqli_query($dbc,"UPDATE CourtTimeTable SET courtStatus='Unavailable' WHERE courtID='$courtID' AND timeslot LIKE '$timefind'");
          $hour++;
        }

      }
      else $output = array( "status" => "error");
    }
    else $output = array( "status" => "error");
  }}

else {
  $output = array( "status" => "cannotReserve");
}






echo json_encode($output);

?>
