<?php
session_start();
if ($_SESSION["loginstatus"]!=1) {
  header("Location: loginform.php");
}
include 'member-header.php';
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
      .form{
        padding-top:110px;
      }
      thead>tr>th{
        text-align: center;
      }
      #signupbutton{
        background-color: #D01E2A;
        border-color: #D01E2A;
        font-size: 20px;
        font-family: bebas;
      }
      .col-xs-10 {
        width: 100%;
      }
      #signupbutton:hover{
        background-color: #F11E2A;
        border-color: #F11E2A;
      }
      .col-md-4{
        text-align: center;
      }
    </style>
  </head>
  <body>

   <div class="form">
     <div class="col-md-4"></div>
     <div class="col-md-4">
       <div class="form-group row">
        <label for="example-date-input" style="margin-top:6px;" class="col-xs-2 col-form-label">Date</label>
        <div class="col-xs-10">
          <input class="form-control" type="date" value="YYYY-MM-DD" id="date">
        </div>
      </div>
      <div class="form-group row">
       <label for="example-time-input" style="margin-top:6px;" class="col-xs-2 col-form-label">Time</label>
       <div class="col-xs-10">
         <input class="form-control" type="time" value="HH:MM" id="time">
       </div>
     </div>
     <div class="form-group row">
      <label for="example-time-input" style="margin-top:6px;" class="col-xs-2 col-form-label">Court</label>
      <div class="col-xs-10">
        <select class="form-control" id="court">
          <option>Badminton</option>
          <option>Ping Pong</option>
          <option>Tennis</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: 0%; margin-bottom: 25px; width:25%" id="signupbutton">Submit</button>
     </div>
     <div class="col-md-4"></div>
   </div>
   <div class="timeslot">

     <div class="col-md-12" id="timetable">

     </tbody>
   </table>
      </div>

   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script type="text/javascript">
   $("#signupbutton").click( function(){
     $.post( "response/response-courttype.php", { courtType: $("#court").val()}, function( data ) {
       data = jQuery.parseJSON(data);
       console.log(data);
       $("#timetable").empty().append("<table class='table' style='text-align:center'><thead><tr><th>Court</th><th>Time</th><th>Checkbox</th></tr></thead><tbody id='myTable'></tbody></table>")
       for (var i = 0; i < data.length; i++) {
          var table = document.getElementById("myTable");
          var row = table.insertRow(i);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          cell1.innerHTML = data[i].courtID;
          cell2.innerHTML = data[i].timeslot;
          if (data[i].courtStatus=="Unavailable") {
            cell3.innerHTML = "<input type='checkbox' disabled checked name='tag_"+i+"' id='tag_"+i+"'>";
          }else{
            cell3.innerHTML = "<input type='checkbox' name='tag_"+i+"' id='tag_"+i+"'>";
          }
       }
     });
   })



   </script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
