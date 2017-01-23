<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Reservation</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style media="screen">
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
      #signupbutton{
        border: 2px solid #C8102E;
        background-color: #C8102E;
        margin-top: 50px;
        font-family: bebas;
        font-size: 28px;
      }
      #signupbutton:hover{
        background-color: #F2102E;
        border: 2px solid #F2102E;
        -webkit-transition: all 0.3s ease-in-out;
      }
      #header{
        font-size: 80px;
        color: white;
        padding-top: 200px;
        margin: 0px;
        font-family: bebas;
      }
      .mapPresence{
        font-family: bebas;
        margin: auto;
        text-align: center;
      }
      .mapPresence h1{
        margin-top: 50px;
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

    <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="http://tutumm.in.th/gymreserve/" style="font-family:bebas;">GYM &nbsp;RESERVATION</a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li class="linkhover"><a style="color:#C8102E" href="#home">Home</a></li>
           <li class="linkhover"><a style="color:#C8102E" href="#about">About</a></li>
           <li class="linkhover"><a style="color:#C8102E" href="#contact">Contact</a></li>
         </ul>
         <div class="navbar-right">
           <ul class="nav navbar-nav">
             <li class="linkhover"><a style="color:#C8102E" href="loginform.php">Login</a></li>
             <li class="linkhover"><a style="color:#C8102E" href="signupform.php">Sign up</a></li>
           </ul>
         </div>
       </div>
     </div>
   </nav>
