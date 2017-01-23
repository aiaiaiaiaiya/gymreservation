<?php
  session_start();
  if ($_SESSION["loginstatus"]!=1) {
    header('Location:http://tutumm.in.th/gymreserve');
  }
  include 'admin-header.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer  Information</title>
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
    h1{
      font-family: bebas;
      /*text-align: center;*/
      margin-bottom: 30px;
    }
    .result{
      margin-top: 5px;
    }
    .containerrenting{
      margin: auto !important;
    }
    .col-md-8{
      margin: auto !important;
    }
  </style>

</head>
<body>
<div class="col-md-2">

</div>
<div class="col-md-8">
  <div class="containerrenting" style="matgin-top:100px;">
  <h1 style="margin-top:100px;">Customer Information</h1>
   <div class="row">
     <div class="col-sm-6">
         <input type="text" class="form-control" id="inputName" placeholder="Member Name ...">

       <div class="memberresult panel panel-default panel-body" style="height: 90px;"></div>

       <div class="containTable">
       <table class='table table-striped table-condensed' style="text-align:center"><thead><tr><th>customerID</th><th>fname</th><th>lname</th><th>phone</th><th>email</th><th>DOB</th><th>disease</th><th>bloodType</th><th>allergy</th><th>regisDate</th><th>credits</th></tr></thead>
       <tbody>

       </tbody></table>

       <div class="warn"></div>
       </div>

     </div>
  </div>

  </div>
</div>
<div class="col-md-2">

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
  $("#inputName").keyup( function(){
    $.post( "response/response_customerInfo.php", { memberName: $("#inputName").val() },
    function( data ) {
      if (!$("#inputName").val()){
        $(".memberresult").html(" ");
        $(".warn").hide();
      }
      else{
        data = jQuery.parseJSON(data);
        console.log(data);
        if (data.status == "notfound") {
          $(".memberresult").html("<b>NOT FOUND !</b>");
        }
        else {
          $("tbody").empty();
          i = 0;
          $(".memberresult").html("<b>FOUND "+ data[i].count + " RESULTS</b>");
          for (var i = 0; i < data.length; i++)
          {
            $(".table").append(
              "<tr><td>" + data[i].customerID + "</td>" +
              "<td>" + data[i].fname + "</td>" +
              "<td>" + data[i].lname + "</td>" +
              "<td>" + data[i].phone + "</td>" +
              "<td>" + data[i].email + "</td>" +
              "<td>" + data[i].DOB + "</td>" +
              "<td>" + data[i].disease + "</td>" +
              "<td>" + data[i].bloodType + "</td>" +
              "<td>" + data[i].allergy + "</td>" +
              "<td>" + data[i].regisDate + "</td>" +
              "<td>" + data[i].credits + "</td>" +
              "</tr>");
          }
        }
      }
    });
  })

</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
