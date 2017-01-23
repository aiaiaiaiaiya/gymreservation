<?php
  session_start();
  if ($_SESSION["loginstatus"]!=1) {
    header('Location:http://tutumm.in.th/gymreserve/');
  }elseif ($_SESSION["loginstatus"]==1 && $_SESSION["customerID"]!=1) {
    header('Location:http://tutumm.in.th/gymreserve/member-home.php');
  }
  include 'admin-header.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Panel</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
    .table>thead>tr>th{
      text-align: center;
    }
    .radio {
      margin:auto;
    }
    .containerpackage{
      margin: auto;
      margin-top: 80px;
      margin-left: 100px;
      margin-right: 100px;
    }
    h1{
      font-family: bebas;
      text-align: center;
      margin-bottom: 30px;
    }
    .result{
      margin-top: 5px;
    }
    .table{
      text-align: center;
    }
    .control{
      text-align: center;
    }
    #signupbutton{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
      border-radius: 0px;
    }

    #signupbutton:hover{
      background-color: #F11E2A;
      border-color: #F11E2A;
    }
    #absentcheck{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
      border-radius: 0px;
    }

    #absentcheck:hover{
      background-color: #F11E2A;
      border-color: #F11E2A;
    }
  </style>

</head>
<body>

  <div class="col-md-6">
    <div class="control">
      <h1 style="margin-top:200px;font-size:80px;">Date Generator</h1>
      <div class="form-group row" width="50%">
         <label for="example-date-input" style="text-align:left;">Date</label>
         <input class="form-control" type="date" id="date" min="<?php echo date('Y-m-d'); ?>" max="<?php $date = strtotime('+3 day');
 echo date('Y-m-d', $date); ?>" style="width: 50%;margin: auto;">
      </div>
      <button style="margin-top:20px;" id="signupbutton"class="btn btn-primary" type="button" name="button">Add Date</button>
    </div>
  </div>

  <div class="col-md-6">
    <div class="control">
      <h1 style="margin-top:200px;font-size:80px;">Absence Check</h1>
      <button id="absentcheck" type="button" class="btn btn-primary" style="margin-top:95px;"name="button">Check</button>
      <div class="containTable">
      <table class='table table-striped table-condensed'><thead><tr><th>No.</th><th>CustomerID</th><th>Time</th><th>Status</th></tr></thead>
      <tbody>
      </tbody></table>

      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
  $("document").ready(function(){
    $(".containTable").hide();
  })
  $("#signupbutton").click(function(){
    var date = $("input[type='date']").val();
    $.post("response/response-control.php",{ date },
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data.output);
      if (data.output=="Success") {
        alert("Success");
      }else{
        alert("Date Exists");
      }
    }
  )})

  $("#absentcheck").click(function(){
    var dt = new Date();
    var datetime = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    $(".containTable").show();
    //console.log(datetime);
    $.post("response/response-absent.php",{ datetime },
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data);
      for (var i = 0; i < data.length; i++) {
        if (data[i].status == "Success") {
          $(".table").append(
            "<tr id='"+data[i].reserveNo+"'><td>" + data[i].reserveNo + "</td>" +
            "<td>" + data[i].customerID + "</td>" +
            "<td>" + data[i].timeslot + "</td>" +
            "<td>" + data[i].checkInStatus + "</td>" +
            "</tr>");
        }
      }
    }
  )
  })
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
