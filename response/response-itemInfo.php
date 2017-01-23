<?php
  session_start();
  $dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
  $memberid = $_POST['memberid'];
  $query = "SELECT * FROM ItemInfo";
  $resultquery = mysqli_query($dbc,$query);
  $output =array();
  while ($row=mysqli_fetch_assoc($resultquery)){

      $row_array = array(
      "itemID" => $row["itemID"],
      "creditPerItem" => $row["creditPerItem"],
      "itemAvailable" => $row["itemAvailable"],
      "itemType" => $row["itemType"]);

    array_push($output, $row_array);
  }

  echo json_encode($output);
 ?>
