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
  <title>Edit Package</title>
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
      font-family: bebas;
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
    .signupbutton{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
      border-radius: 0px;
    }

    .signupbutton:hover{
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

  <div class="col-md-2">
  </div>

  <div class="col-md-8" style="margin:auto">
    <div class="control">
      <h1 style="margin-top:100px;font-size:50px;">Edit Packages</h1>
      <div class="containTable">
      <table class='table table-striped table-condensed'><thead><tr><th>Package</th><th>Price</th><th>Credit</th><th>Delete</th></tr></thead>
      <tbody>
      </tbody></table>

      </div>
    </div>
    <a href="http://tutumm.in.th/gymreserve/admin-addPackage.php"><button style="text-align:center; margin-left:41%; margin-bottom:20px;" type="button" class="btn btn-primary signupbutton" name="button">Add Package</button></a>
  </div>
  <div class="col-md-2">
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $.post("response/response_package.php",{},
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data);
      for (var i = 0; i < data.length; i++) {
        $(".table").append(
          "<tr id='"+data[i].packageName+"'><td>" + data[i].packageName + "</td>" +
          "<td>" + data[i].price + "</td>" +
          "<td>" + data[i].creditPoint + "</td>" +
          "<td style='padding-top:4px;'> <button type='button' class='btn btn-default getvalue' onclick=\"myFunction('"+data[i].packageName+"')\"> <span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
      }
    }
  )
  })

  function myFunction(input){
    console.log(input);
    if (confirm("Are you sure to delete "+input)) {
      $.post("response/response-deletePackage.php", {input},
      function(data){
        data = jQuery.parseJSON(data);
        console.log(data);
        // console.log(data.reserveno);
        $("#"+data).fadeOut();
      }
    )
    }
  }
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
