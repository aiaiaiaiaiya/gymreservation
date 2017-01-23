<?php
  session_start();
  if ($_SESSION["loginstatus"]!=1) {
    header('Location:http://tutumm.in.th/gymreserve');
  }
  include 'member-header.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Court Type</title>
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
  <h1 style="margin-top:100px;">Court Type</h1>
   <div class="row">
       <div class="containTable">

       <table class='table table-striped table-condensed' style="text-align:center"><thead><tr><th>Court Type</th><th>Credit Per Hour</th><th>Description</th></tr></thead>
       <tbody>

       </tbody></table>
     </div>

  </div>
</div>
<div class="col-md-2">

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready( function(){
    $.post("response/response_courttypeInfo.php",
    { } ,
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data);
      for (var i = 0; i < data.length; i++)
      {
        $(".table").append(
          "<tr><td>" + data[i].courtType + "</td>" +
          "<td>" + data[i].creditPerHour + "</td>" +
          "<td style='text-align:left'>" + data[i].Description + "</td>" +
          "</tr>");
      }
    })
  });

</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
