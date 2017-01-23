<?php
session_start();
if ($_SESSION["loginstatus"]!=1) {
  header('Location:http://tutumm.in.th/gymreserve/');
}elseif ($_SESSION["loginstatus"]==1 && $_SESSION["customerID"]==27) {
  header('Location:http://tutumm.in.th/gymreserve/admin.php');
}
//include 'member-header.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Reservation</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

  <style>
    @font-face {
      font-family: bebas;
      src: url(font/bebas.TTF);
    }
    html {
      height: 100%;
    }

    body {
      height: 100%;
    }
    .navbar-inverse{
      background-color: white;
      border-color: white;
    }

    .linkhover:hover{
      background-color: whitesmoke;
      color: #C8102E !important;
    }
    .navbar-inverse .navbar-nav>li>a{
      color: #C8102E !important;
    }
    .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
      background-color: black;
      color: white !important;
    }
    .nav{
      font-family: bebas;
    }
    .navbar-brand:hover{
      color: #7F7F7F !important;
    }
    .navbar{
      box-shadow: 0px 2px 0px black;
    }
    .containTable{
      text-align: center;
    }
    .table, .memberresult{
      margin-top: 20px;
    }
    .table>thead>tr>th,.table>tbody>tr>td{
      text-align: center;
    }
    .radio {
      margin:auto;
    }
    .containerpackage{
      margin: auto;
      margin-top: 80px;
      margin-left: 50px;
      margin-right: 50px;
    }
    h1{
      font-family: bebas;
      text-align: left;
      margin-bottom: 30px;
    }
    .result{
      margin-top: 5px;
    }
    .nav-stacked a{
      color: #C8102E !important;
    }
    .nav-stacked .active a,
    .nav-stacked .active a:hover {
      background-color: transparent !important;
    }
    .nav-pills > .active > a, .nav-pills > .active > a:hover {
      background-color: transparent !important;
      border: 2px solid #C8102E !important;
    }
  </style>

</head>
<body>
<?php include 'member-header.php'; ?>
<div class="containerpackage">
 <div class="row">
   <div class="col-sm-2">

    <ul class="nav nav-pills nav-stacked">
      <li role="presentation"><a href="profile.php">My Profile</a></li>
      <li role="presentation"><a href="profile-historyCourt.php">History Court</a></li>
      <li role="presentation" class="active"><a href="#">History Equipment</a></li>
      <li role="presentation"><a href="profile-historyPackage.php">History Package Top-up</a></li>
    </ul>

   </div>

  <div class="col-sm-10" style="border-left: 5px solid;padding-left: 50px;padding-right: 20px;">
    <div class="show-area">

        <h1>History item</h1>
        <div class="warn">

        </div>
        <table class='table table-striped table-condensed'><thead><tr><th>Renting ID</th><th>Item ID</th><th>Renting time</th><th>Returning time</th><th>Total Credits</th></tr></thead>
        <tbody>

        </tbody></table>

    </div>
  </div>
</div>

</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready( function(){
    $.post("response/response_historyEquip.php",
    { } ,
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data);
      var dateNow = new Date();
      console.log(dateNow);
      if (data.status=="noHistory") {
          $(".table").html("<div class='alert alert-warning fade in' style='margin-top: 10px; font-family: 'Kanit',sans-serif; text-align:center;'>ไม่มีประวัติการยืมอุปกรณ์</div>");
      }
      else {
        for (var i = 0; i < data.length; i++)
        {
          if (data[i].returnTime=="0000-00-00 00:00:00") {
            data[i].returnTime="Has not returned"
          }
          $(".table").append(
            "<tr><td>" + data[i].rentingID + "</td>" +
            "<td>" + data[i].itemID + "</td>" +
            "<td>" + data[i].rentingTime + "</td>" +
            "<td>" + data[i].returnTime + "</td>" +
            "<td>" + data[i].totalCreditPaid + "</td>" +
            "</tr>");
        }
      }

    })
  });

</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
