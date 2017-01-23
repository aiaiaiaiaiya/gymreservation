<?php
session_start();
if ($_SESSION["loginstatus"]==1 && $_SESSION["customerID"]!=27) {
  header('Location:http://tutumm.in.th/gymreserve/member-home.php');
}elseif ($_SESSION["loginstatus"]==1 && $_SESSION["customerID"]==27) {
  header('Location:http://tutumm.in.th/gymreserve/admin.php');
}
include "guest-header.php";
 ?>

    <div class="homepage" id="home">
      <h1 id="header">GYM &nbsp;RESERVATION</h1>
      <button type="button" class="btn btn-primary btn-lg" id="signupbutton" onclick="window.location.href='signupform.php'">Sign&nbsp; Up</button><br>
      <button type="button" class="btn btn-primary btn-lg" id="signupbutton" onclick="window.location.href='loginform.php'" style="margin-top:25px">Log&nbsp; In</button>
    </div>

    <div class="videopromote" id="about">
      <h1 style="font-family:bebas">OUR &nbsp;PRESENTATION</h1>
      <iframe width="560px" height="315px" src="https://www.youtube.com/embed/cKIzoHO-fOY" frameborder="0" allowfullscreen></iframe>
    </div>
    <hr width="70%">
    <div class="mapPresence" id=contact>
      <h1>OUR &nbsp;GYM &nbsp;PRESENCE</h1>
      <p>
        Gym&nbsp; Reservation&nbsp; currently&nbsp; operates&nbsp; in&nbsp; 1&nbsp; place&nbsp;. &nbsp;Go&nbsp; to&nbsp; a&nbsp; region’s&nbsp; website&nbsp; by&nbsp; clicking&nbsp; on&nbsp; the&nbsp; country&nbsp; below&nbsp;.
      </p>
      <div id="map" style="width:80%;height:500px;text-align:center;margin:auto;margin-bottom:50px;"></div>
      <script>
      function initMap() {
        var uluru = {lat: 13.738505, lng: 100.5524513};
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 13.738505, lng: 100.5524513},
          scrollwheel: false,
          zoom: 10
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    </div>
    <div class="member-group" style="text-align:center; margin-bottom:200px">
      <h1 style="font-size:80px;">Made By</h1>
      <p style="font-size:50px;">Yanisa Hemprachitchai 57070501009</p>
      <p style="font-size:50px;">Sakan Komolvatin 57070501041</p>
      <p style="font-size:50px;">Phitsinee Sincharoenpong 57070501073</p>
      <p style="font-size:50px;">Satit Udompanich 57070501078</p>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfq8bR7GMvQ3E1SwEg9C-eu-Ur3TmPyiU&callback=initMap"async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
