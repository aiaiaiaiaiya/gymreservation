<?php
session_start();
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$customerID = $_SESSION['customerID'];
$courtID = $_POST['courtID'];
$courtType = $_POST['courtType'];
$score = $_POST['score'];
$comment = $_POST['comment'];
$datetoday = date('Y/m/d h:i:sa');

    if ($courtID != null AND $comment != null AND $score!=-1  AND $courtType != null  ) {
      $query = "INSERT INTO MemberReview VALUES(DEFAULT,'$customerID','$courtID',DEFAULT,'$score','$comment')";
      mysqli_query($dbc,$query);

      $arr = array('output' => 1, 'customerID' => $customerID, 'score' => $score, 'comment' => $comment, 'datetoday' => $datetoday);
      echo json_encode($arr);
    }else{
      $arr = array('output' => '*All information must be filled', 'status' => $status);
      echo json_encode($arr);
    }





   ?>
