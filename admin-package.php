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
  <title>Credits pricing</title>
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
    #purchasesubmit{
      border: 2px solid #C8102E;
      background-color: #C8102E;
      margin-top: 25px;
      font-family: bebas;
      font-size: 18px;
      border-radius: 0px;
    }
    #purchasesubmit:hover{
      background-color: #F2102E;
      border: 2px solid #F2102E;
      -webkit-transition: all 0.3s ease-in-out;
    }
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
      position: absolute;
      margin-top: 4px\9;
      margin-left: -8px;
    }
  </style>

</head>
<body>

<div class="containerpackage">
<h1>Packages</h1>
 <div class="row">
   <div class="col-sm-6">
       <input type="text" class="form-control" id="inputID" placeholder="Member ID ...">

     <div class="memberresult panel panel-default panel-body" style="height: 90px;"></div>

     <div class="containTable">

     <table class='table table-striped table-condensed' style="text-align:center"><thead><tr><th>Package</th><th>Price</th><th>Credits</th><th>Select</th></tr></thead>
     <tbody>

     </tbody></table>
     <button type="button" class="btn btn-primary btn-block" id="purchasesubmit" style="display:none;">Purchase</button>

     <div class="warn"></div>
     </div>

   </div>

  <div class="col-sm-6">

    <div class="panel panel-success" id="receipt" style="display:none;">
      <div class="panel-heading">Purchase successful !</div>
      <div class="panel-body" id="receiptbody"></div>
    </div>

  </div>
</div>

</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready( function(){
    $.post("response/response_package.php",
    { } ,
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data);
      for (var i = 0; i < data.length; i++)
      {
        $(".table").append(
          "<tr><td>" + data[i].packageName + "</td>" +
          "<td>" + data[i].price + "</td>" +
          "<td>" + data[i].creditPoint + "</td>" +
          "<td> <div class='radio'><input type='radio' name='option' class='option' value='" + data[i].packageName + "'> </div></td>" +
          "</tr>");
      }
    })
  });

  $("#inputID").keyup( function(){
    $.post( "response/response_customer.php", { memberid: $("#inputID").val() },
    function( data ) {
      if (!$("#inputID").val()){
        $(".memberresult").html(" ");
        $("#purchasesubmit").hide();
        $(".warn").hide();
      }
      else{
        data = jQuery.parseJSON(data);
        console.log(data);
        if (data.status == "notfound") {
          $(".memberresult").html("<b>NOT FOUND !</b>");
          $("#purchasesubmit").hide();
        }
        else if(data.status == "found") {
          $(".memberresult").html(
            "<b>Member ID:</b> " + data.customerID +
            "<br><b>Name:</b> " + data.fname + "  " + data.lname +
            "<br><b>Remaining credits:</b> " + data.credits
          );
          $("#purchasesubmit").show();
        }
        //$("#inputID").val("");
      }
    });
  })


  $("#purchasesubmit").click( function(){
    $.post( "admin-packagePurchase.php", { option: $(".option:checked").val(), memberid: $("#inputID").val() },
    function( data ) {
      data = jQuery.parseJSON(data);
      console.log(data);
      if (data=="nopackage") {
        $("#receipt").hide();
        $(".warn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Warning!</strong> No package selected.</div>");
        $(".warn").fadeOut(3000);
      }
      else {
        $(".warn").hide();
        $("#receipt").show();
        $("#receiptbody").html(
          "<h3 style='margin-top: 5px;'>Invoice</h3>" +
          "<b>Invoice No. </b>" + data.invoiceNo + " : " + data.timestamp +
          "<hr style='margin-top: 10px;margin-bottom: 1px;border-top: 1px dashed #8c8b8b;'>" +
          "<br><b>Member ID:</b> " + data.customerID +
          "<br><b>Name:</b> " + data.fname + "  " + data.lname +
          "<br><b>Package:</b> " + data.packagename +
          "<br><b>Total paid:</b> " + data.price +
          "<br><b>Remaining credits:</b> " + data.credits +
          "<hr style='border-top: 3px double #8c8b8b; margin-top: 10px;'>"
        );
      }
    });
  })



</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
