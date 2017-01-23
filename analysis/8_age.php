<?php
//date in mm/dd/yyyy format; or it can be in other formats as well
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$query = "SELECT DOB FROM Customer";
$result = mysqli_query($dbc,$query);
$i=array();
for ($j=0; $j <5 ; $j++) {
  $i[$j]=0;
  //echo $i[$j];
  //echo "<br>";
}
while($row = mysqli_fetch_assoc($result)){
  $birthDate = $row["DOB"];
  $birthDate = explode("-", $birthDate);
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
  ? ((date("Y") - $birthDate[0]) - 1)
  : (date("Y") - $birthDate[0]));
  if ($age>=11 && $age<=20) {
    //echo "1";
    $i[0]+=1;
  }else if($age>=21 && $age<=30){
    //echo "2";
    $i[1]+=1;
  }else if($age>=31 && $age<40){
    //echo "3";
    $i[2]+=1;
  }else if($age>=41 && $age<=50){
    //echo "4";
    $i[3]+=1;
  }else{
    $i[4]+=1;
  }
}
$output = array('a'=>$i[0],'b'=>$i[1],'c'=>$i[2],'d'=>$i[3],'else'=>$i[4]);
echo json_encode($output);


   ?>
