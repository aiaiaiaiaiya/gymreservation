<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Reservation</title>
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
      margin: 0;
      background: #000;
      font-family: bebas;
    }
    video {
      position: fixed;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -100;
      transform: translateX(-50%) translateY(-50%);
      background: url('//demosthenes.info/assets/images/polina.jpg') no-repeat;
      background-size: cover;
      transition: 1s opacity;
    }
    .stopfade {
       opacity: .5;
    }

    #polina {
      font-family: bebas;
      font-weight:100;
      background: rgba(0,0,0,0.7);
      color: white;
      padding: 2rem;
      width: 45%;
      margin:2rem;
      float: right;
      font-size: 1.2rem;
      margin-right: 340px;
      margin-top: 150px;
    }
    h1 {
      font-size: 5em;
      text-transform: uppercase;
      margin-top: 0;
      letter-spacing: .3em;
      margin: auto;
      text-align: center;
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

    @media screen and (max-width: 500px) {
      div{width:70%;}
    }
    @media screen and (max-device-width: 800px) {
      html { background: url(//demosthenes.info/assets/images/polina.jpg) #000 no-repeat center center fixed; }
      #bgvid { display: none; }
    }

    .present{
      background-image: url('img/running.jpg');
      text-align: center;
      font-family: 'Source Sans Pro', sans-serif;
      background-size: cover;
      height: 100%;
      background-position: center;
    }
    </style>
  </head>
  <body>
    <video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polna.jpg" id="bgvid" playsinline autoplay muted loop>
    <source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
    <source src="http://thenewcode.com/assets/videos/polna.mp4" type="video/mp4">
    </video>
    <div id="polina" style="text-align:center;">
    <h1>Gym Reservation</h1>
    <p style="margin-top:30px; font-size:15px;">Term&nbsp; project&nbsp; for&nbsp; cpe332</p>
    <a href="http://tutumm.in.th/gymreserve/index.php"><button id="signupbutton" class="btn btn-primary">Go&nbsp; To&nbsp; Home</button></a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var vid = document.getElementById("bgvid");
      var pauseButton = document.querySelector("#polina button");

      function vidFade() {
      vid.classList.add("stopfade");
      }

      vid.addEventListener('ended', function()
      {
      // only functional if "loop" is removed
      vid.pause();
      // to capture IE10
      vidFade();
      });


      pauseButton.addEventListener("click", function() {
      vid.classList.toggle("stopfade");
      if (vid.paused) {
        vid.play();
        pauseButton.innerHTML = "Pause";
      } else {
        vid.pause();
        pauseButton.innerHTML = "Paused";
      }
      })


    </script>
  </body>
</html>
