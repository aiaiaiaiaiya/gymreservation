<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="http://tutumm.in.th/gymreserve/admin.php" style="font-family:bebas;">GYM &nbsp;RESERVATION</a>
   </div>
   <div id="navbar" class="collapse navbar-collapse">
     <ul class="nav navbar-nav">
       <li class="linkhover"><a style="color:#C8102E" href="admin.php">Home</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-customerInfo.php">Customer Info</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-checkin.php">Check-in</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-return.php">Return item</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-renting.php">Renting item</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-package.php">Packages</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-reportPanel.php">Report Panel</a></li>
       <li class="linkhover"><a style="color:#C8102E" href="admin-controlPanel.php">Control Panel</a></li>
       <li class="linkhover">
        <a href="#" class="dropdown-toggle" style="color:#C8102E" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edit <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin-deletePackage.php">Package</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="admin-deleteCourt.php">Court</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="admin-deleteItem.php">Item</a></li>
        </ul>
      </li>
     </ul>
   <div class="navbar-right ">
     <ul class="nav navbar-nav">
       <li class="" style="margin-top:16px;">Hello, &nbsp;</li>
       <li class="" style="margin-top:16px;"><?php echo $_SESSION["fname"];?></li>
       <li class="linkhover"><a style="color:#C8102E" href="logout.php">Logout</a></li>
     </ul>
   </div>
 </div>
 </div>
</nav>
