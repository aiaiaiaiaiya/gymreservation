<?php
session_start();
  if ($_SESSION["loginstatus"]==1) {
    if ($_SESSION["role"]=="admin") {
      header("Location: admin.php");
    }elseif ($_SESSION["role"]=="member") {
      header("Location: member-home.php");
    }
  }
  include 'guest-header.php';
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
      .col-xs-10 {
        width: 50.333333%;
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
    </style>

  </head>
  <body>

   <div class="loginform">
     <div class="col-md-3"></div>
     <div class="col-md-6" style="font-size:15px;">
       <div class="loginhead">
         LOGIN
       </div>
       <div class="result">

       </div>
       <div class="form-group row" style="padding-top:5px;">
           <label for="example-text-input" class="col-xs-2 col-form-label" style="margin-left:15%;">Email</label>
           <div class="col-xs-10">
             <input class="form-control" type="email" name="email" id="email">
           </div>
         </div>
         <div class="form-group row">
           <label for="example-search-input" class="col-xs-2 col-form-label" style="margin-left:15%;">Password</label>
           <div class="col-xs-10">
             <input class="form-control" type="password" name="password" id="password">
           </div>
         </div>
         <button type="submit" class="btn btn-primary" style="margin-left: 0%; margin-bottom: 25px;margin-top:0px; width:20%" id="signupbutton">SIGN IN</button>
     </div>
     <div class="col-md-3"></div>
   </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
      $("body").keyup(function(event){
        if (event.keyCode == 13) {
          $("#signupbutton").click();
        }
      });
      $("#signupbutton").click( function(){
        $.post( "response/response-login.php", { email: $("#email").val(), password: $("#password").val() }, function( data ) {
          data = jQuery.parseJSON(data);
          console.log(data);
          if (data.output==1) {
            window.location.href ='member-home.php';
          }else if(data.output==2){
            window.location.href ='admin.php';
          }else{
            $( ".result" ).html( data.output );
          }
        });
      })
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
