<?php
  include "guest-header.php";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gym Resevation</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <style>
    @font-face {
      font-family: bebas;
      src: url(font/bebas.TTF);
    }
    .table{
      width: 50%;
      margin: auto;
      margin-top: 100px;
    }
    .formCustomer{
      margin-top: 13px;
    }
    .form-control{
      width: 77%;
      border-radius: 0px;
    }
    .form{
      background-color: #EDEDED;
    }
    .form-group{
      margin-left: 10%;
    }
    #signupbutton{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
    }

    #signupbutton:hover{
      background-color: #F11E2A;
      border-color: #F11E2A;
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
    .result{
      margin-left: 75px;
      margin-top: 15px;
      color: #D01E2A;
    }
  </style>
  <body>


    <div class="row" style="margin-top:50px">
      <div class="col-md-1"></div>
      <div class="col-md-4" style="margin-top:140px">
        <h5>START YOUR GYM RESERVATION EXPERIENCE HERE</h3>
        <p>
          Leave us your details and we’ll call you to arrange an appointment
          for a club tour, with absolutely
          no obligations. Also, enjoy 8 days’ free access to
          all our group exercise classes and facilities!
        </p>
        <img width="90%" src="img/run.jpg" alt="running" />
      </div>
      <div class="col-md-6">
        <div class="form">
          <div class="result">

          </div>
            <div class="form-group row" style="padding-top:15px;">
            <label for="example-text-input" class="col-xs-2 col-form-label">First name</label>
            <div class="col-xs-10">
              <input class="form-control" id="fname" type="text" name="fname" placeholder="e.g. Alice">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-xs-2 col-form-label">Last name</label>
            <div class="col-xs-10">
              <input class="form-control" id="lname" type="text" name="lname" placeholder="e.g. Wonderland">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-url-input" class="col-xs-2 col-form-label">Telephone</label>
            <div class="col-xs-10">
              <input class="form-control" id="phone" type="text" name="phone" placeholder="e.g. 0800000000">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-xs-2 col-form-label">Email</label>
            <div class="col-xs-10">
              <input class="form-control" id="email" type="email" name="email" placeholder="aliceinwonderland@gmail.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-xs-2 col-form-label">Password</label>
            <div class="col-xs-10">
              <input class="form-control" id="password" type="password" name="password" placeholder="must be 8-12 characters">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-xs-2 col-form-label">Confirm Password</label>
            <div class="col-xs-10">
              <input class="form-control" id="confirmpassword" type="password" name="confirmpassword">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-tel-input" class="col-xs-2 col-form-label">Birthday</label>
            <div class="col-xs-10">
              <input class="form-control" id="DOB" type="date" name="DOB" placeholder="2011-08-19">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-password-input" class="col-xs-2 col-form-label">Disease</label>
            <div class="col-xs-10">
              <select class="form-control" id="disease" name="disease">
                <option disabled selected>Please Select...</option>
                <option>-</option>
                <option>โรคความดันโลหิต</option>
                <option>โรคหัวใจ</option>
                <option>โรคเบาหวาน</option>
                <option>โรค G6PD</option>
                <option>โรคไตวาย</option>
                <option value="others">อื่นๆ</option>
              </select>
                <input style="display:none"class="form-control" id="addDisease" type="text" name="addDisease" placeholder="Add Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-number-input" class="col-xs-2 col-form-label">Blood Type</label>
            <div class="col-xs-10">
              <select class="form-control" id="bloodType" name="bloodType">
                <option disabled selected>Please Select...</option>
                <option>A</option>
                <option>B</option>
                <option>AB</option>
                <option>O</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Allergy</label>
            <div class="col-xs-10">
              <input class="form-control" id="allergy" type="text" name="allergy">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 12%; margin-bottom: 21px; width:72%; font-family:bebas" id="signupbutton">SIGN &nbsp;UP &nbsp;NOW</button>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script>
    $("#disease").change(function(){
      if ($("#disease").val()=="others") {
        $("#addDisease").show();
      }else{
        $("#addDisease").hide();
      }
    });
      $("#signupbutton").click( function(){
        $.post( "response/response-signup.php", { fname: $("#fname").val(), lname: $("#lname").val(), phone: $("#phone").val(), email:$("#email").val(), password: $("#password").val(), confirmpassword: $("#confirmpassword").val(),
         DOB: $("#DOB").val(), disease: $("#disease").val(), bloodType: $("#bloodType").val(), allergy: $("#allergy").val(), addDisease: $("#addDisease").val() }, function( data ) {
          data = jQuery.parseJSON(data);
          console.log(data);
          if (data.output==1) {
            window.location.href ='thankyousignup.php';
          }else{
            $( ".result" ).html( data.output );
          }
        });
      })
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
