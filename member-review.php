<?php
  session_start();
  if ($_SESSION["loginstatus"]!=1) {
    header('Location:http://tutumm.in.th/gymreserve');
  }
  // include 'member-header.php';
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Review Court</title>
   <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


   <style>
   @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
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
       margin-bottom: 30px;
     }
     h1{
       font-family: bebas;
       text-align: left;
       margin-bottom: 30px;
     }
     .result{
       margin-top: 5px;
     }
     #signupbutton{
       border: 2px solid #C8102E;
       background-color: #C8102E;
       margin-top: 25px;
       font-family: bebas;
       font-size: 18px;
       border-radius: 0px;
     }
     #signupbutton:hover{
       background-color: #F2102E;
       border: 2px solid #F2102E;
       -webkit-transition: all 0.3s ease-in-out;
     }
     .form {
        margin:0;
      }
      .rating {
        border: none;
        float: left;
      }

      .rating > input { display: none; }
      .rating > label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
      }

      .rating > .half:before {
        content: "\f089";
        position: absolute;
      }

      .rating > label {
        color: #ddd;
       float: right;
      }

      /***** CSS Magic to Highlight Stars on Hover *****/

      .rating > input:checked ~ label, /* show gold star when clicked */
      .rating:not(:checked) > label:hover, /* hover current star */
      .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

      .rating > input:checked + label:hover, /* hover current star when changing rating */
      .rating > input:checked ~ label:hover,
      .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
      .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

    .modal-footer > .customerid{
      text-align: left;
      display: inline;
    }
    .customerid > p{
      display: inline;
    }
   </style>

 </head>
 <body>

<?php include 'member-header.php'; ?>
  <div class="col-md-6" style="margin-top:50px;">
      <div class="containerpackage">

      <h1>Review</h1>

      <select class="form-control" id="courttype-selector" style="margin-bottom:25px;">
        <option disabled selected>SELECT YOUR COURT</option>
      </select>
      <select class="form-control" id="courtid-selector" style="margin-bottom:25px;">
      </select>

    <div>
      <textarea placeholder='Place your comments here' name='comments' id='comments' style='width:100%;font-size:1.2em;' style="margin-bottom:25px;" ></textarea>
    </div>

    <div class="star" style="margin-top:25px; margin-bottom:50px;">
      <fieldset class="rating">
          <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
          <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
          <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
          <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
          <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
          <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
          <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
          <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
          <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
          <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
      </fieldset>
    </div>
    <div class="testModal" style="margin-left:42%;">
      <button type="button" id="signupbutton" class="btn btn-primary btn-lg" onclick=confirmfn() data-toggle="modal" data-target="#myModal">
        Submit
      </button>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Review </h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <div class="customerid" style="display:inline">
              </div>
              <button type="button" class="btn btn-default" onclick="myFunction()"  data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-6" style="margin-top:100px;padding-right:100px;">
    <table class='table table-striped table-condensed' style="text-align:center">
    <thead><tr><th>Court ID</th><th>Rating</th><th></th><th>Comment</th></tr></thead>
    <tbody>

    </tbody></table>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">

  $(document).ready( function(){

    $('#courttype-selector')
    $.post( "response/response_courttype.php", {},
    function( data ) {
      data = jQuery.parseJSON(data);
       console.log(data);
         for (var i=0;i < data.length;i++){
           $('#courttype-selector').append(
               '<option value="'+ data[i].courtType + '">' + data[i].courtType + '</option>'
           );
         }
       })
  });

  $("#courttype-selector").click( function(){
   var courtType = $('#courttype-selector option:selected').text();
      $('#courtid-selector').empty();
    $.post( "response/response_courttype_id.php", {courtType: courtType},
    function( data ) {
       data = jQuery.parseJSON(data);
       console.log(data);
         for (var i=0;i < data.length;i++){
           $('#courtid-selector').append(
               '<option value="'+ data[i].courtID + '">' + data[i].courtID + '</option>'
           );
         }
       })
  });


  function confirmfn()
  {
        var test = document.getElementsByName("rating");
        var sizes = test.length;
        var review =-1;
        for (i=0; i < sizes; i++) {
                if (test[i].checked==true) {
                  console.log(test[i].value + ' you got a value');
                  review = parseFloat(test[i].value);
                }
        }
        console.log("review = "+review);


        var txt;
        //var r = confirm("Are you sure?");
          $.post( "response/response_review.php", {courtType:$("#courttype-selector").val(),courtID:$("#courtid-selector").val(),score:review,comment:$("#comments").val()}, function( data ) {
            data = jQuery.parseJSON(data);
            console.log(data);
            if (data.output==1) {
              // alert("Thank you for your comments. We are always keen to listen to our customers and to receive their feedback. This is the best way to improve our services and maintain our client’s satisfaction.")
              // window.location.href =window.location.href;
              $('select#courttype-selector').val("Badminton");
              $('select#courtid-selector').val("");
              $('textarea').val("");
              $(".modal-body").html("<p style='display:inline'>Customer ID: "+data.customerID+"</p><br><p>"+data.comment+"</p>");
              $("#myModalLabel").html("Review ( "+data.score+" &nbsp; Stars )");

            }
            if(data.output!=1){
              $(".modal-body").html(" "+data.output+" " );
              $("#myModalLabel").html(" Error ");
            }

          });
  }

  function myFunction(){
    window.location.href = "member-review.php"
  }

  $(document).ready(function(){
    $.post( "response/response-showreview.php",
      function( data ) {
        data = jQuery.parseJSON(data);
        console.log(data);
        for (var i = 0; i < data.length; i++)
        {
          var diff =0;
          var star = "";
          var intvalue = Math.floor( data[i].rating );
          diff = data[i].rating - intvalue;
          for (var j = 0; j < intvalue; j++) {
              star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
          }
          if (diff!=0) {
            star += "<i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
          }
           $(".table").append(
           "<tr><td>" + data[i].courtID + "</td>" +
           "<td>" + data[i].rating + "</td>" +
           "<td style='text-align:left; width:110px;'>" + star + "</td>" +
           "<td>" + data[i].comment + "</td>" +
           "</tr>");
        }
     })

  })


  </script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
  </html>
