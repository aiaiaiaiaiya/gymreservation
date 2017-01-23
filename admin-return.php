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
  <title>Return Item</title>
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
  </style>

</head>
<body>


 <div class="containerpackage">
 <h1>Return</h1>
  <div class="row">
    <div class="col-sm-6">
        <input type="text" class="form-control" id="inputID" placeholder="Member ID ...">

        <div class="memberresult panel panel-default panel-body" style="height: 90px;"></div>

      <table style='width:900;text-align:center;' class='table table-striped table-condensed'><thead><tr><th>Renting ID</th><th>Renting Time</th><th>Return Time</th><th>Item</th><th>Credits</th><th>Returned</th></tr></thead>
      <tbody>

      </tbody>
      </table>

      <div class="containTable">


    </div>


 </div>

 </div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <script type="text/javascript">




  function myFunction(){
   alert("Returned");
   $.post( "admin-return-query.php", { rentingid: $(".btn").val(), memberid: $("#inputID").val()})
   window.location.href=window.location.href;
 };

   $("#inputID").keyup( function()
   {
     $.post( "response/response_customer.php", { memberid: $("#inputID").val() },
     function( data ) {
       if (!$("#inputID").val()){
         $(".memberresult").html(" ");
       }
       else{
         data = jQuery.parseJSON(data);
         console.log(data);
         if (data.status == "notfound") {
           $(".memberresult").html("<b>NOT FOUND !</b>");
         }
         else if(data.status == "found") {
           $(".memberresult").html(
             "<b>Member ID:</b> " + data.customerID +
             "<br><b>Name:</b> " + data.fname + "  " + data.lname +
             "<br><b>Remaining credits:</b> " + data.credits
           );
         }

       }
     });

     $.post( "response/response_return.php", { memberid: $("#inputID").val() },
     function( data )
     {
       if (!$("#inputID").val())
       {
         $(".table").append(" ");
       }
       else
       {
         $("tbody").empty();
         data = jQuery.parseJSON(data);
         console.log(data);

             for (var i = 0; i < data.length; i++)
             {
               $(".table").append
               (
                 "<tr><td>" + data[i].rentingID + "</td>" +
                 "<td>" + data[i].rentingTime + "</td>" +
                 "<td>" + data[i].returnTime + "</td>" +
                 "<td>" + data[i].itemID + "</td>" +
                 "<td>" + data[i].totalcreditPaid + "</td>" +
                 "<td><button type='button' class='btn btn-default button123' onclick=myFunction() value ='"+data[i].rentingID+"'> <span class='glyphicon glyphicon-share-alt'></span></button></td></tr>"
              )
            }

       }
     })
   });







 </script>
<script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>
