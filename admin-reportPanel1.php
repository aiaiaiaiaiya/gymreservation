<?php
session_start();
if ($_SESSION["loginstatus"]!=1) {
  header("Location: loginform.php");
}
//include 'member-header.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Reservation</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
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
      .checkbox, .radio{
        margin-top: 3px;
      }
      .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
        padding: 5px;
        text-align: center;
      }
      td{
        padding: 0px;
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
      .signupbutton:active{
        background-color: #F11E2A;
        border-color: #F11E2A;
      }
    </style>
  </head>
  <body>
<?php include 'admin-header.php'; ?>
    <div class="col-md-2"></div>
    <div class="col-md-8" style="text-align:center">
      <div class="report1" style="margin-top:100px;">
        <h1>Analysis Report</h1>
        <p>
        <button class="btn btn-primary signupbutton" type="button" id="analysis1" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          ช่วงเวลาที่มีการใช้บริการของสมาชิกมากที่สุดของแต่ละสนาม
        </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-block">
            <table id = 'table1' class='table table-striped table-condensed'><thead><tr><th>Court Type</th><th>Time Slot</th><th>Number of Reservation</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="report2" style="margin-top:50px;">
        <h1>Analysis2</h1>
        <p>
        <button class="btn btn-primary signupbutton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Button with data-target
        </button>
        </p>
        <div class="collapse2" id="collapseExample2">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>

      <div class="report3" style="margin-top:50px;">
        <h1>Analysis3</h1>
        <p>
        <button class="btn btn-primary signupbutton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Button with data-target
        </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>

      <div class="report4" style="margin-top:50px;">
        <h1>Analysis4</h1>
        <p>
        <button class="btn btn-primary signupbutton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Button with data-target
        </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>

      <div class="report5" style="margin-top:50px;">
        <h1>Analysis5</h1>
        <p>
        <button class="btn btn-primary signupbutton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Button with data-target
        </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>

      <div class="report6" style="margin-top:50px;">
        <h1>Analysis6</h1>
        <p>
        <button class="btn btn-primary signupbutton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Button with data-target
        </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-2"></div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script type="text/javascript">

   $("#analysis1").click( function(){
     $.post( "analysis/1_popularTime.php",
     function( data ) {
       data = jQuery.parseJSON(data);
       console.log(data);
       for (var i = 0; i < data.length; i++)
       {
          $("#table1").append(
          "<tr><td>" + data[i].courtID + "</td>" +
          "<tr><td>" + data[i].time + "</td>" +
          "<tr><td>" + data[i].numOfReserve + "</td>" +
          "</tr>");
       }
    });
   })

   </script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
