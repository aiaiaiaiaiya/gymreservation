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
        /*font-family: bebas;*/
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
      .gobutton{
        background-color: #D01E2A;
        border-color: #D01E2A;
        font-size: 20px;
        font-family: bebas;
      }
      .gobutton:hover{
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
      .panel-primary>.panel-heading {
        color: #fff;
        background-color: #D01E2A;
        border-color: #D01E2A !important;
      }
      .panel-primary {
        border-color: #D01E2A;
      }
    </style>
  </head>
  <body>
<?php include 'member-header.php'; ?>
   <div class="form col-md-6 " style="margin-top: 50px; text-align:center; font-family: bebas;">
     <h1 style="margin-bottom: 20px;">Court Reservation</h1>
     <div class="" style="width: 90%; margin: auto; margin-left:50px;">


       <div class="form-group row">
        <label for="example-date-input" style="text-align:left;">Date</label>
        <input class='form-control' type='date' id='date' min='<?php echo date("Y-m-d"); ?>' max='<?php $date = strtotime("+3 day");
echo date('Y-m-d', $date); ?>'>

      </div>

      <div class='alert alert-danger fade in' id='warn'style='display: none; margin-top: 10px; text-align:center;'><span class='glyphicon glyphicon-exclamation-sign'></span>   No court available</div>
      <div class="form-group row" id="formCourt" style='display: none;'>
          <label for="example-time-input" style="text-align:left;" id="showcourttype">Court type</label>
          <select class="form-control" id="court-selector"></select>
      </div>




       <button type="submit" class="btn btn-primary" style="display: none; margin-left: 0%; margin-bottom: 25px; width:25%" id="signupbutton">Search</button>




     <div class="timeslot">
       <div class="" id="timetable" style="margin-bottom: 50px;">
         <table class='table table-striped table-condensed' style="display: none;"  onchange="changeEventHandler(event);">
         <thead><tr><th>Court ID</th><th>Start time</th><th>Select</th></tr></thead>
         <tbody>

         </tbody></table>
         <button type="submit" class="btn btn-primary gobutton" style="display: none; margin-left: 0%; margin-bottom: 25px; width:25%" id="gobutton">Go !</button>

        </div>
     </div>

     </div>
   </div>

   <div class="col-md-6" style="margin-top: 130px; text-align:center">


     <div class="panel panel-primary" id="reservePanel" style="display: none">
       <p>*ถ้าเลือกเวลาบ่ายสองจะเลือกเพิ่มได้อีกแค่ 1 ชั่วโมง</p>
       <div class="panel-heading" style="font-family: 'Kanit';">รายละเอียดการจอง</div>
       <div class="panel-body" id="reservebody"></div>
     </div>
     <div class="panelwarn"></div>

     <div class="panel panel-success" id="reserveSuc" style="display: none;">
       <div class="panel-heading" style="font-family: 'Kanit';">Success</div>
       <div class="panel-body" style="text-align:left;" id="reservebodySuc"></div>
     </div>

   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script type="text/javascript">

  //  Date.prototype.addHours= function(h){
  //   this.setHours(this.getHours()+h);
  //   return this;
  //   }


  function refreshPage() {
     window.location.href=window.location.href;
  }

   function fnConfirm() {
     var input = $('input[type="range"]').val();
     var txt;
     var r = confirm("Are you sure?");
     console.log(input);
     if (r == true) {
         reservation(input);
     }
   }

   function updateSlider(input){
     $("#hourshow").html(input);
     //console.log(input);
   }

   function reservation(input){
     var pass = $(".optionre:checked").val();
     var vals = pass.split("|");
     var courtID = vals[0], datetimeStart =vals[1];
    //  var dt = new Date(datetimeStart);
    //  var dtHH = dt.getHours();
    //  var HHNew = dtHH + input - 1;
    //  var dtDD = dt.getDate();
    //  var dtMM = dt.getMonth() + 1;
    //  var dtYYYY = dt.getFullYear();
    //  var dateString = dtYYYY+"-"+dtMM+"-"+dtDD+" "+HHNew+":00:00";
     $.post( "member-ReserveSubmit.php", { amountHour:input, courtID:courtID, datetimeStart:datetimeStart },
     function( data ) {
       data = jQuery.parseJSON(data);
       console.log("From ReserveSubmit.php ===");
       console.log(data);
       if (data.status=="error") {
         $(".panelwarn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Error!</strong> Cannot reserve your request</div>");
         $(".panelwarn").fadeOut(6000);
       }
       else if (data.status=="errNoCredit") {
         $(".panelwarn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Error!</strong> Credit Not enough. Please contact us at Front counter</div>");
         $(".panelwarn").fadeOut(6000);
       }
       else if (data.status=="cannotReserve") {
         $(".panelwarn").html("<div class='alert alert-danger fade in' style='margin-top: 10px;'><strong>Error!</strong> Court is not available, Please try again.</div>");
         $(".panelwarn").fadeOut(6000);
       }
       else if (data.status=="success") {
         $("#reservePanel").hide();
         $("#reservebodySuc").html(
           "<h3 style='margin-top: 5px;'>Invoice</h3>" +
           "<b>Reserve No. </b>" + data.reserveNo + " : " + data.timestamp +
           "<hr style='margin-top: 10px;margin-bottom: 1px;border-top: 1px dashed #8c8b8b;'>" +
           "<br><b>Member ID:</b> " + data.customerID +
           "<br><b>Name:</b> " + data.fname + "  " + data.lname +
           "<br><b>Court ID:</b> " + data.courtID +
           "<br><b>Credits per hour:</b> " + data.creditPerHour +
           "<br><b>Start time:</b> " + data.timeslot +
           "<br><b>Total Hours:</b> " + data.totalHour +
           "<br><b>Total credit paid:</b> " + data.totalCreditPaid +
           "<br><b>Remaining credits:</b> " + data.credits +
           "<hr style='border-top: 3px double #8c8b8b; margin-top: 10px;'>"
         );
         $("#reserveSuc").show();
         setTimeout(refreshPage, 10000);

       }
     })
   }



  function changeEventHandler(event) {
    $("#reservePanel").hide();
    $("#reservebody").empty();
  }

   $('input[type="date"]').change(function(){
     var date = this.value;
     console.log(date);
     $.post( "response/response-courtTypeAvailable.php", { date: date },
     function( data ) {
        //alert(date); //Date in full format alert(new Date(this.value));
        // var inputDate = new Date(this.value);
        // console.log(inputDate);
        data = jQuery.parseJSON(data);
        console.log(data);
        $('#court-selector').empty();
        $('tbody').empty();
        $('.table').hide();
        $('#reserveSuc').hide();
        $('#formCourt').hide();
        $('#signupbutton').hide();
        $('#gobutton').hide();
        $('#reservePanel').hide();
        $('#reserveSuc').hide();
        if (data.status=="noCourt") {
          $("#warn").show();
          $("#warn").fadeOut(2500);
          date = null;
        }
        else {
          $('tbody').empty();
          for (var i=0;i < data.length;i++){
            $('#court-selector').append(
                '<option value="'+ data[i].courtType + '">' + data[i].courtType + '</option>'
            );
          }
          $('#formCourt').slideDown();
          $('#signupbutton').show();
        }

      });
  });

   $("#signupbutton").click( function(){
     var courtType = $('#court-selector option:selected').text();
     var dateinput = $('input[type="date"]').val();
     $.post( "response/response-courtTimeTableAvailable.php", { courtType: courtType , dateTime: dateinput },
     function( data ) {
       console.log(courtType);
       data = jQuery.parseJSON(data);
       console.log(data);

       $('tbody').empty();
       $('.table').hide();

       if (data =="noCourt") {
         $('#court-selector').empty();
         $('tbody').empty();
         $('.table').hide();
         $('#reserveSuc').hide();
         $('#formCourt').hide();
         $('#signupbutton').hide();
         $('#gobutton').hide();
         $("#warn").show();
         $("#warn").fadeOut(2500);
       }
       else{
         for (var i = 0; i < data.length; i++)
         {
          var inputDate = new Date(data[i].datetime);
          var hh = inputDate.getHours();
           //var court = data[i].courtID + "," + data[i].time;
           // onclick="return ReAssign(\'' + data[i].courtID + '\',\'' + data[i].time + '\')"
           //var but = "<button type='button' class='btn btn-default reservebtn'> <span class='glyphicon glyphicon-ok-sign'></span></button>";
           $(".table").append(
             "<tr><td>" + data[i].courtID + "</td>" +
             "<td>" + hh + ":00:00 </td>" +
             "<td style='padding:0px;'><input type='radio' name='optionre' class='optionre' value='" + data[i].courtID + "|" + data[i].datetime + "'></td>" +
             "</tr>");
         }
         $(".table").show();
         $('#gobutton').show();
       }

     })
   })

   $("#gobutton").click( function(){
     var input = $(".optionre:checked").val();
     var vals = input.split("|");
     var courtID = vals[0], datetimeStart =vals[1];
     console.log(courtID);
     console.log(datetimeStart);
     $.post( "member-courtreserveCal.php", { courtID: courtID, dateTime: datetimeStart  },
     function( data ) {
       data = jQuery.parseJSON(data);
       console.log(data);
       if (data.status=="errRedun") {
         $(".panelwarn").html("<div class='alert alert-danger fade in' style='margin-top: 10px; font-family: Kanit'>ไม่สามารถทำการจองได้ คุณเคยจองช่วงเวลานี้ไว้แล้ว กรุณาตรวจสอบที่เมนู History Court ใน Profile ของคุณ</div>");
         $(".panelwarn").fadeOut(6000);
       }
       else {
         var start = new Date(datetimeStart);
         var hourFstart = start.getHours();
         var count = 0;
         for (var i = 0; i < data.length; i++)
         {
           var dt = new Date(data[i].timeslot);
           var hourFslot = dt.getHours();
           while(hourFslot-hourFstart==1) {
             count++;
             hourFstart=hourFslot;
           }
         }
         count++;
         console.log(count);

         $("#reservebody").html(
           '<div class="col-md-3" style="font-family: Kanit">จำนวนชั่วโมง</div><div class="col-md-7"><input type="range" id="myRange" name="myRange" defaultValue="1" min="1" max="'+count+'" onchange="updateSlider(this.value)"></div><div class="col-md-2" id="hourshow">1</div><button type="submit" class="btn btn-primary gobutton" style="margin-left: 0%; margin-top: 25px; width:25%" id="submitLast" onclick=fnConfirm()>Submit</button>'
         );
         $("#reservePanel").show();
       }


     })
   })

   </script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
