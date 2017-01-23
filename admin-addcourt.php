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
     <title>Add Court</title>
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
     <body>
     <div class="col-md-2">

     </div>
     <div class="col-md-8">
       <div class="containerrenting" style="matgin-top:100px;">
       <h1 style="margin-top:100px;">Add Court</h1>
        <div class="row">
          <div class="col-sm-6">

            <input type="text" class="form-control" id="courtid" placeholder="Court ID ...">
            <input type="text" class="form-control" id="courttype" placeholder="Court Type ...">
            <input type="text" class="form-control" id="credit" placeholder="Credit/Item ...">
              <input type="text" class="form-control" id="description" placeholder="Court Description ...">
            <button type="button" class="btn btn-primary btn-block signupbutton" onclick=myFunction() >Add Court</button>

          </div>
       </div>

       </div>
     </div>
     <div class="col-md-2">

     </div>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script>

     function myFunction(){

      $.post( "response/response_addcourt.php", { courtid: $("#courtid").val(), courttype: $("#courttype").val(),credit: $("#credit").val(),description: $("#description").val()})
      alert("Added");
      window.location.href=window.location.href;
    };



     </script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
   </body>
 </html>
