<?php
session_start();
if ($_SESSION["customerID"]==null) {
  header("Location:index.php");
}
$dbc = mysqli_connect("localhost", "tutumminth_root", "Tum12345678", "tutumminth_gymreservation");
$customerID = $_SESSION["customerID"];
$logincheck = mysqli_query($dbc,"SELECT * FROM Customer WHERE customerID = '$customerID'");
$row = mysqli_fetch_assoc($logincheck);
$fname = $row["fname"];
$lname = $row["lname"];
$phone = $row["phone"];
$email = $row["email"];
$password = $row["password"];
$DOB = $row["DOB"];
$disease = $row["disease"];
$bloodType = $row["bloodType"];
$allergy = $row["allergy"];
$regisDate = $row["regisDate"];
$role = $row["role"];
$credits = $row["credits"];
include 'guest-header.php';
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
    #home{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
    }

    #home:hover{
      background-color: #F11E2A;
      border-color: #F11E2A;
    }
    #login{
      background-color: #D01E2A;
      border-color: #D01E2A;
      font-size: 20px;
    }

    #login:hover{
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
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h1 style="font-family:bebas; text-align:center; color:#D01E2A; font-size:72px;">THANK YOU</h1>
        <div class="form">
          <div class="result">

          </div>
            <div class="form-group row" style="padding-top:15px;">
            <label for="example-text-input" class="col-xs-2 col-form-label">First name</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$fname.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-xs-2 col-form-label">Last name</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$lname.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-url-input" class="col-xs-2 col-form-label">Telephone</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$phone.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-xs-2 col-form-label">Email</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$email.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-email-input" class="col-xs-2 col-form-label">DOB</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$DOB.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-tel-input" class="col-xs-2 col-form-label">Disease</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$disease.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-password-input" class="col-xs-2 col-form-label">Blood Type</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$bloodType.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-number-input" class="col-xs-2 col-form-label">Allergy</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$allergy.'" >'; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Credits</label>
            <div class="col-xs-10">
              <?php echo '<input disabled class="form-control" id="fname" type="text" name="fname" placeholder="'.$credits.'" >'; ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 23%; margin-bottom: 21px; margin-top:5px; width:20%; font-family:bebas" id="home">HOME</button>
          <button type="submit" class="btn btn-primary" style="margin-left: 12%; margin-bottom: 21px; margin-top:5px; width:20%; font-family:bebas" id="login">LOGIN</button>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $("#home").click(function(){
        window.location.href = 'index.php';
      });
      $("#login").click(function(){
        window.location.href = 'loginform.php';
      });
    </script>
  </body>
</html>
