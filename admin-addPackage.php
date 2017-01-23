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
  <title>Add Package</title>
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
    .signupbutton{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
      font-family: bebas;
    }
    .signupbutton:hover{
      background-color: #F11E2A;
      border-color: #F11E2A;
    }
  </style>

</head>
<body>
<div class="col-md-2">

</div>
<div class="col-md-8">
  <div class="containerrenting" style="matgin-top:100px;">
  <h1 style="margin-top:100px;">Add Package</h1>
   <div class="row">
     <div class="col-sm-6">
         <input type="text" class="form-control" id="packageName" placeholder="Package Name ...">
         <input type="text" class="form-control" id="price" placeholder="price ...">
         <input type="text" class="form-control" id="creditPoint" placeholder="Credit Point ...">
         <button type="button" class="btn btn-primary btn-block signupbutton" id="submit">Add Package</button>
     </div>
  </div>

  </div>
</div>
<div class="col-md-2">

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">

$("#submit").click( function(){
  $.post( "response/response_addpackage.php", { packageName: $("#packageName").val(), price: $("#price").val(), creditPoint: $("#creditPoint").val()})
  alert("Added Successfully");
  window.location.href=window.location.href;

})

</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
