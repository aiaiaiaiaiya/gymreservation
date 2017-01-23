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
  <title>Analysis Report</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
      font-family: 'Kanit';
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
    h4{
      font-family: 'Kanit';
    }
    .panel-group .panel{
      border-radius: 0px;
    }
    .panel-heading {
      background:#C8102E !important;
      border-color: #C8102E !important;
      color: white !important;
    }
    .panel-default{
      border-color: red;
    }
    tr{
      text-align: center;
    }

  </style>
</head>
<body>
  <div class="container">
    <h1 style="margin-top:80px">Analysis Report</h1>
    <!-- <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p> -->
    <div class="panel-group" id="accordion">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">1.Most popular peroid of reserved time per court per month</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table1' class='table table-striped table-condensed'><thead><tr><th>Court Type</th><th>Time Slot</th><th>Number of Reservation</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">2.Most total court income</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table2' class='table table-striped table-condensed'><thead><tr><th>Court ID</th><th>Income</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3.Most total item income</a>
          </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table3' class='table table-striped table-condensed'><thead><tr><th>Item Type</th><th>Total Income</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">4.Top 5 most total hours of members</a>
          </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table4' class='table table-striped table-condensed'><thead><tr><th>Customer ID</th><th>First Name</th><th>Last name</th><th>Total Hours</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">5.Members who have birthday in this month</a>
          </h4>
        </div>
        <div id="collapse5" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table5' class='table table-striped table-condensed'><thead><tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Birthday</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">6.Members who absents more than 3 times</a>
          </h4>
        </div>
        <div id="collapse6" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table6' class='table table-striped table-condensed'><thead><tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Number of Absence</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">7.Numbers of member of each congenital disorder</a>
          </h4>
        </div>
        <div id="collapse7" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table7' class='table table-striped table-condensed'><thead><tr><th>Disease</th><th>Amount of Members</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">8.Number of member in each age range</a>
          </h4>
        </div>
        <div id="collapse8" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table8' class='table table-striped table-condensed'><thead><tr><th>Age</th><th>Total Number</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">9.Total Reserved Hour of each court</a>
          </h4>
        </div>
        <div id="collapse9" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table9' class='table table-striped table-condensed'><thead><tr><th>Court ID</th><th>Total Used Hour</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">10.Top rating courts</a>
          </h4>
        </div>
        <div id="collapse10" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table10' class='table table-striped table-condensed'><thead><tr><th>Court ID</th><th>Rating</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">11.Reviews in each Court</a>
          </h4>
        </div>
        <div id="collapse11" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table11' class='table table-striped table-condensed'><thead><tr><th>Customer ID</th><th>Comment</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">12.Top most purchased packages</a>
          </h4>
        </div>
        <div id="collapse12" class="panel-collapse collapse">
          <div class="panel-body">
            <table id = 'table12' class='table table-striped table-condensed'><thead><tr><th>Package Name</th><th>Purchase Counts</th></tr></thead>
            <tbody>

            </tbody></table>
          </div>
        </div>
      </div>

    </div>
  </div>

<script src="bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript">

 $(document).ready(function(){
   $.post( "analysis/1_popularTime.php",
     function( data ) {
       data = jQuery.parseJSON(data);
       console.log(data);
       for (var i = 0; i < data.length; i++)
       {
         $("#table1").append(
         "<tr><td>" + data[i].courtID + "</td>" +
         "<td>" + data[i].time + "</td>" +
         "<td>" + data[i].numOfReserve + "</td>" +
         "</tr>");
       }
    })

 })


  $(document).ready(function(){
    $.post( "analysis/2_totalIncome.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table2").append(
           "<tr><td>" + data[i].courtID + "</td>" +
           "<td>" + data[i].totalCreditPaid + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/3_popularItem.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table3").append(
           "<tr><td>" + data[i].itemType + "</td>" +
           "<td>" + data[i].totalIncome + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/4_analysis.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table4").append(
           "<tr><td>" + data[i].customerID + "</td>" +
           "<td>" + data[i].fName + "</td>" +
           "<td>" + data[i].lName + "</td>" +
           "<td>" + data[i].totalHour + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/5_birthdayinMonth.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table5").append(
           "<tr><td>" + data[i].customerID + "</td>" +
           "<td>" + data[i].fname + "</td>" +
           "<td>" + data[i].lname + "</td>" +
           "<td>" + data[i].DOB + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/6_numAbsent.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table6").append(
           "<tr><td>" + data[i].customerID + "</td>" +
           "<td>" + data[i].fname + "</td>" +
           "<td>" + data[i].lname + "</td>" +
           "<td>" + data[i].numOfAbsent + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/7_havedisease.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table7").append(
           "<tr><td>" + data[i].disease + "</td>" +
           "<td>" + data[i].amountMember + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/8_age.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
           $("#table8").append(
           "<tr><td>11-20</td>" +
           "<td>" + data.a + "</td>" +
           "</tr>"+
           "<tr><td>21-30</td>" +
           "<td>" + data.b + "</td>" +
           "</tr>"+
           "<tr><td>31-40</td>" +
           "<td>" + data.c + "</td>" +
           "</tr>"+
           "<tr><td>41-50</td>" +
           "<td>" + data.d + "</td>" +
           "</tr>"+
           "<tr><td>Else</td>" +
           "<td>" + data.else + "</td>" +
           "</tr>");
     })

  })

  $(document).ready(function(){
    $.post( "analysis/9_courtUsedHour.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table9").append(
           "<tr><td>" + data[i].courtID + "</td>" +
           "<td>" + data[i].TotalUsedHour + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/10_bestRating.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table10").append(
           "<tr><td>" + data[i].courtID + "</td>" +
           "<td>" + data[i].rating + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/11_analysis.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table11").append(
           "<tr><td>" + data[i].customerID + "</td>" +
           "<td>" + data[i].comment + "</td>" +
           "</tr>");
        }
     })

  })

  $(document).ready(function(){
    $.post( "analysis/12_analysis.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
           $("#table12").append(
           "<tr><td>" + data[i].packageName + "</td>" +
           "<td>" + data[i].countPurchase + "</td>" +
           "</tr>");
        }
     })

  })






 </script>

 </body>
 </html>
