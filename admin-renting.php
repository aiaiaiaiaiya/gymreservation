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
  <title>Item renting</title>
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
    .signupbutton{
      font-family: bebas;
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
      border-radius: 0px;
    }

    .signupbutton:hover{
      background-color: #F11E2A;
      border-color: #F11E2A;
    }
  </style>

</head>
<body>
<div class="col-md-2">

</div>
<div class="col-md-8">
  <div class="containerrenting" style="matgin-top:100px;">
  <h1 style="margin-top:100px;">Equipment Renting</h1>
   <div class="row">
     <div class="col-sm-6">
         <input type="text" class="form-control" id="inputID" placeholder="Member ID ...">

       <div class="memberresult panel panel-default panel-body" style="height: 90px;"></div>


       <div class="dropdown">
           <select class="form-control" id="dropdown">
              <option disabled selected=""> SELECT EQUIPMENT TYPE </option>
           </select>
        </div>


       <button type="button" class="btn btn-primary btn-block signupbutton" id="searchsubmit" style="display:none">Search</button>

       <div class="containTable">

       <table class='table table-striped table-condensed' style="text-align:center"><thead><tr><th>Equipment</th><th>Select</th></tr></thead>
       <tbody>

       </tbody></table>

       <button type="button" class="btn btn-primary btn-block signupbutton" id="rentsubmit" style="display:none">Rent</button>

       <div class="warn"></div>
       </div>

     </div>

    <div class="col-sm-6">

      <div class="panel panel-success" id="receipt" style="display:none;">
        <div class="panel-heading">Renting successful !</div>
        <div class="panel-body" id="receiptbody"></div>
      </div>

    </div>
  </div>

  </div>
</div>
<div class="col-md-2">

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready( function(){
    $(".table").hide();
    $.post("response/response_renting.php",
    { } ,
    function(data){
      data = jQuery.parseJSON(data);
      console.log(data);
      for (var i = 0; i < data.length; i++)
      {
        $("#dropdown").append(
          '<option value="'+ data[i].itemType + '">' + data[i].itemType + '</option>'
          //"<td> <div class='radio'><input type='radio' name='option' class='option' value='" + data[i].itemType + "'> </div></td>" +
          //"</tr>"
        );
      }
    })
  });

  $("#inputID").keyup( function(){
    $(".table").hide();
    $.post( "response/response_customer.php", { memberid: $("#inputID").val() },
    function( data ) {
      if (!$("#inputID").val()){
        $(".memberresult").html(" ");
        $(".warn").hide();
        $("#searchsubmit").hide();
      }
      else{
        data = jQuery.parseJSON(data);
        console.log(data);
        if (data.status == "notfound") {
          $(".memberresult").html("<b>NOT FOUND !</b>");
          $("#searchsubmit").hide();
        }
        else if(data.status == "found") {
          $(".memberresult").html(
            "<b>Member ID:</b> " + data.customerID +
            "<br><b>Name:</b> " + data.fname + "  " + data.lname +
            "<br><b>Remaining credits:</b> " + data.credits
          );
          $("#searchsubmit").show();
        }
        //$("#inputID").val("");
      }
    });
  })

  $("#searchsubmit").click( function(){
    $.post( "admin-searchItem.php", { option: $("#dropdown").val()},
    function( data ) {
      data = jQuery.parseJSON(data);
      console.log(data);
      if (data=="noItemTypeSelect") {
        $("#receipt").hide();
        $(".table").hide();
        $("#rentsubmit").hide();
        $(".table").hide();
        $(".warn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Warning!</strong> No equipment type selected.</div>");
        $(".warn").fadeOut(6000);
      }
      else {
        $("tbody").empty();
        for (var i = 0; i < data.length; i++)
        {
          $(".table").append(
            "<tr><td>" + data[i].itemID + "</td>" +
            "<td> <div class='radio'><input type='radio' name='option' class='option' value='" + data[i].itemID + "'> </div></td>" +
            "</tr>");
        }
        $(".table").show();
        $("#rentsubmit").show();
      }
    });
  })

  $("#rentsubmit").click( function(){
    $.post( "admin-rentingInvoice.php", { option: $(".option:checked").val(), memberid: $("#inputID").val() },
    function( data ) {
      data = jQuery.parseJSON(data);
      console.log(data);
      if (data=="noItem") {
        $("#receipt").hide();
        $(".warn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Warning!</strong> No equipment selected.</div>");
        $(".warn").fadeOut(6000);
      }
      else if (data=="notEnoughCredits") {
        $("#receipt").hide();
        $(".warn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Warning!</strong> Your remaining credits is not enough.</div>");
        $(".warn").fadeOut(8000);
      }
      else {
        $(".warn").hide();
        $("#receipt").show();
        $("#receiptbody").html(
          "<h3 style='margin-top: 5px;'>Invoice</h3>" +
          "<b>Invoice No. </b>" + data.rentingID + " : " + data.timestamp +
          "<hr style='margin-top: 10px;margin-bottom: 1px;border-top: 1px dashed #8c8b8b;'>" +
          "<br><b>Member ID:</b> " + data.customerID +
          "<br><b>Name:</b> " + data.fname + "  " + data.lname +
          "<br><b>ItemID:</b> " + data.itemID +
          "<br><b>Total paid:</b> " + data.creditPerItem +
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
