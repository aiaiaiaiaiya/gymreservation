<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="http://tutumm.in.th/gymreserve/member-home.php" style="font-family:bebas;">GYM &nbsp;RESERVATION</a>
   </div>
   <div id="navbar" class="collapse navbar-collapse">
     <ul class="nav navbar-nav">
       <li class="linkhover"><a style="color:#C8102E" href="member-home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="member-review.php"><span class="glyphicon glyphicon-star"></span> Review</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="member-courtreserve.php"><span class="glyphicon glyphicon-time"></span> Court  &nbsp; Reservation</a></li>
       <li class="linkhover">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-info-sign"></span>Info <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="info-package.php">Package info</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="info-courtType.php">Court info</a></li>
        </ul>
      </li>
     </ul>
   <div class="navbar-right">
     <ul class="nav navbar-nav">
       <!-- <li class="" style="margin: 15px 9px;"><i class="fa fa-credit-card" aria-hidden="true"></i>  &nbsp; <?php echo $_SESSION["credits"]; ?></li> -->
       <li class=""><a style="color:black;" href="profile.php"><span class="glyphicon glyphicon-user"></span> Hello, &nbsp; <?php echo $_SESSION["fname"];?></a></li>
       <li class="linkhover"><a style="color:#C8102E" href="logout.php">Logout <span class="glyphicon glyphicon-off"></span></a></li>
     </ul>
   </div>
 </div>
 </div>
</nav>
