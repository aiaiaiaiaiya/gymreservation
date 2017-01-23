<?php
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT courtID FROM CourtInfo";
$result = mysqli_query($dbc,$query);
$i=0;
while($row = mysqli_fetch_assoc($result)){
  if ($row["courtID"]!="Swimming Pool") {
    $courtType[$i] = $row["courtID"];
    $i++;
  }
}
//echo print_r($courtType);
// $courtType = array("Badminton01","Badminton02","Badminton03","Badminton04","Basketball01","Basketball02","Football01","Football02","Ping Pong01","Ping Pong02","Tennis01","Tennis02");
//
$date = $_POST['date'];
$date = $date."%";
$query = "SELECT * FROM CourtTimeTable WHERE timeslot LIKE '$date'";
$result = mysqli_query($dbc,$query);
if (mysqli_num_rows($result)!=0 || $date=="2016-dd-12") {
  $output = array('output' => 'Date exists');
}else {
  for ($i=0; $i < count($courtType); $i++) {
      for ($j=10; $j < 15 ; $j++) {
        $query = "INSERT INTO CourtTimeTable VALUES('$courtType[$i]','$date $j:00:00',DEFAULT)";
        mysqli_query($dbc,$query);
      }
    }
  $output = array('output' => 'Success');
}

echo json_encode($output);


 ?>
