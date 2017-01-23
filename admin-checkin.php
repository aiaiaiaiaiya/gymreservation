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
  <title>Check In</title>
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
      text-align: left;
      margin-bottom: 30px;
    }
    .result{
      margin-top: 5px;
    }
    .table{
      text-align: center;
    }
  </style>

</head>
<body>

<div class="containerpackage">

 <div class="row">
    <div class="col-md-1">

    </div>
   <div class="col-md-10">
     <h1>Check-in</h1>

     <input type="text" class="form-control" id="inputID" placeholder="Member ID ...">
     <div class="memberresult panel panel-default panel-body" style="height: 90px;"></div>
     <div class="containTable">
     <table class='table table-striped table-condensed'><thead><tr><th>No.</th><th>CustomerID</th><th>Time</th><th>Hour(s)</th><th>Status</th><th>Check In</th></tr></thead>
     <tbody>
     </tbody></table>
     <!-- <button type="button" class="btn btn-primary btn-block" id="purchasesubmit" style="display:none;">Purchase</button> -->

     <div class="warn"></div>
     </div>
   </div>
  <div class="col-md-1">
  </div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">

  $("#inputID").keyup( function(){
    $.post( "response/response_customer.php", { memberid: $("#inputID").val() },
    function( data ) {
      if (!$("#inputID").val()){
        $(".memberresult").html(" ");
        $("#purchasesubmit").hide();
        $(".warn").hide();
      }
      else{
        data = jQuery.parseJSON(data);
        console.log(data);

        if (data.status == "notfound") {
          $(".memberresult").html("<b>NOT FOUND !</b>");
          $("#purchasesubmit").hide();
        }
        else if(data.status == "found") {
          $(".memberresult").html(
            "<b>Member ID:</b> " + data.customerID +
            "<br><b>Name:</b> " + data.fname + "  " + data.lname +
            "<br><b>Remaining credits:</b> " + data.credits
          );
          $("#purchasesubmit").show();
        }
      }
    });
  })

  $("#inputID").keyup( function(){
    var memid = $("#inputID").val();
    $("tbody").empty();
    $.post( "response/response-checkin.php", { memid: memid },
    function( data ) {
      data = jQuery.parseJSON(data);
      if (data.status=="noHistory") {
        //code here
      }else {
        for (var i = 0; i < data.length; i++) {
          if (data[i].checkInStatus != "Checked In") {
            $(".table").append(
              "<tr id='"+data[i].reserveNo+"'><td>" + data[i].reserveNo + "</td>" +
              "<td>" + data[i].customerID + "</td>" +
              "<td>" + data[i].timeslot + "</td>" +
              "<td>" + data[i].totalHour + "</td>" +
              "<td>" + data[i].checkInStatus + "</td>" +
              "<td style='padding-top:4px;'> <button type='button' class='btn btn-default reservebtn' onclick=reserveClick(" + data[i].reserveNo + ") > <span class='glyphicon glyphicon-ok-sign'></span></button></td>"+
              "</tr>");
          }
        }
      }
    });
  })

  function reserveClick(input){
    console.log(input);
    var reserveno = input;
    $.post("response/response-updatecheckin.php", {reserveno},
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data.output);
      console.log(data.reserveno);
      $("#"+data.reserveno).fadeOut();
    }
  )}

</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
