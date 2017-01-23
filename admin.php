<?php
session_start();
if ($_SESSION["loginstatus"]!=1) {
  header('Location:http://tutumm.in.th/gymreserve/');
}elseif ($_SESSION["loginstatus"]==1 && $_SESSION["customerID"]!=1) {
  header('Location:http://tutumm.in.th/gymreserve/userhome.php');
}
include 'admin-header.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Reservation</title>
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
      .homepage{
        background-image: url('img/bgfitness.jpg');
        text-align: center;
        font-family: 'Source Sans Pro', sans-serif;
        background-size: cover;
        height: 100%;
        background-position: center;
      }
      #header{
        font-size: 80px;
        color: white;
        padding-top: 200px;
        margin: 0px;
        font-family: bebas;
      }
      .loginform{
        background-image: url('img/regisdone.jpg');
        text-align: center;
        background-size: cover;
        height: 100%;
        background-position: center;
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
      .loginform{
        padding-top: 200px;
      }
      .form-control{
        border-radius: 0px;
      }
      #signupbutton{
        background-color: #D01E2A;
        border-color: #D01E2A;
        font-size: 20px;
        font-family: bebas;
      }
      #signupbutton:hover{
        background-color: #F11E2A;
        border-color: #F11E2A;
      }
      .col-md-6{
        background-color:rgba(256, 256, 256, 0.5);
        border-radius: 3px;
        margin-top: 25px;
      }
      label{
        padding-top: 8px;
      }
      .result{
        color: red;
        font-family: bebas;
        margin-top: 12px;
      }
      .loginhead{
        font-family: bebas;
        font-size: 30px;
        margin-top: 10px;
      }
      .mapPresence{
        font-family: bebas;
        margin: auto;
        text-align: center;
      }
      .mapPresence h1{
        margin-top: 50px;
      }
      .videopromote{
        margin: auto;
        text-align: center;
        margin-bottom:50px;
      }
      .videopromote h1{
        margin-bottom: 20px;
        margin-top: 35px;
      }
    </style>

  </head>
  <body>



   <div class="homepage" id="home">
     <h1 id="header">GYM &nbsp;RESERVATION</h1>
   </div>
   <hr width="70%">

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfq8bR7GMvQ3E1SwEg9C-eu-Ur3TmPyiU&callback=initMap"async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
      $("#signupbutton").click( function(){
        $.post( "login.php", { email: $("#email").val(), password: $("#password").val() }, function( data ) {
          data = jQuery.parseJSON(data);
          console.log(data);
          if (data.output==1) {
            window.location.href ='userhome.php';
          }else{
            $( ".result" ).html( data.output );
          }
        });
      })
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
