<?php
session_start();
if ($_SESSION["loginstatus"]!=1) {
  header('Location:http://tutumm.in.th/gymreserve/');
}elseif ($_SESSION["loginstatus"]==1 && $_SESSION["customerID"]==27) {
  header('Location:http://tutumm.in.th/gymreserve/admin.php');
}
//include 'member-header.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Reservation</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

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
      margin-left: 50px;
      margin-right: 50px;
    }
    h1{
      font-family: bebas;
      text-align: left;
      margin-bottom: 30px;
    }
    .result{
      margin-top: 5px;
    }
    .nav-stacked a{
      color: #C8102E !important;
    }
    .nav-stacked .active a,
    .nav-stacked .active a:hover {
      background-color: transparent !important;
    }
    .nav-pills > .active > a, .nav-pills > .active > a:hover {
      background-color: transparent !important;
      border: 2px solid #C8102E !important;
    }
  </style>

</head>
<body>
<?php include 'member-header.php'; ?>
<div class="containerpackage">
 <div class="row">
   <div class="col-sm-2">

    <ul class="nav nav-pills nav-stacked">
      <li role="presentation" class="active"><a href="#">My Profile</a></li>
      <li role="presentation"><a href="profile-historyCourt.php">History Court</a></li>
      <li role="presentation"><a href="profile-historyEquip.php">History Equipment</a></li>
      <li role="presentation"><a href="profile-historyPackage.php">History Package Top-up</a></li>
    </ul>

   </div>

  <div class="col-sm-10" style="border-left: 5px solid;padding-left: 50px;padding-right: 20px;">
    <div class="show-area">
      <div class="myprofile-area">
        <h1>My Profile</h1>
        <div class="prof">
          <br><b>Member ID:</b> <?php echo $_SESSION["customerID"];?>
          <br><b>Registration date:</b> <?php echo $_SESSION["regisDate"];?>
          <p id="cred"><br><b>Remaining credits:</b> </p>
          <hr style='border-top: 3px double #8c8b8b; margin-top: 10px;'>
          <h3 style="font-family: 'Kanit', sans-serif;">ข้อมูลส่วนตัว</h3>
          <p id="fname"><b>Name:</b> </p>
          <p id="lname"><b>Lastname:</b> </p>
          <p id="email"><b>E-mail:</b> </p>
          <br><b>Birthday:</b> <?php echo $_SESSION["DOB"];?>
          <br><b>Birthday:</b> <?php echo $_SESSION["bloodType"];?>
          <p id="dise"><b>Disease:</b> </p>
          <p id="alle"><b>Allergy:</b> </p>

          <div class="container">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit profile</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="all">Name:</label>
                      <input type="text" class="form-control" id="EDfname">
                    </div>
                    <div class="form-group">
                      <label for="all">Lastname:</label>
                      <input type="text" class="form-control" id="EDlname">
                    </div>
                    <div class="form-group">
                      <label for="all">E-mail:</label>
                      <input type="text" class="form-control" id="EDemail">
                    </div>
                    <div class="form-group">
                      <label for="dis">Disease:</label>
                      <input type="text" class="form-control" id="EDdise">
                    </div>
                    <div class="form-group">
                      <label for="all">Allergy:</label>
                      <input type="text" class="form-control" id="EDalle">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="submitedit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">

function pre() {
  var customerID = <?php echo $_SESSION['customerID']; ?>;
  $.post("response/response_customer.php", { memberid: customerID } ,
  function(data){
    data = jQuery.parseJSON(data);
    console.log(data);
    $('#cred').html("<b>Remaining credits:</b>" + data.credits);
    $('#dise').html("<b>Disease:</b>" + data.disease);
    $('#alle').html("<b>Allergy:</b>" + data.allergy);
    $('#fname').html("<b>Name:</b>" + data.fname);
    $('#lname').html("<b>Lastname:</b>" + data.lname);
    $('#email').html("<b>E-mail:</b>" + data.email);
  })
}

$(document).ready( pre())

$("#submitedit").click( function(){
  var customerID = <?php echo $_SESSION['customerID']; ?>;
  $.post( "response/response_customerEdit.php", { memberid: customerID, fname: $("#EDfname").val(),lname: $("#EDlname").val(),email: $("#EDemail").val(),dise: $("#EDdise").val() , alle: $("#EDalle").val() },
  function( data ) {
    data = jQuery.parseJSON(data);
    console.log(data);
    if (data=="success") {
      $('#myModal').modal('toggle');
      pre();
    }
    else {
      $('#myModal').modal('toggle');
    }
})
})


</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
