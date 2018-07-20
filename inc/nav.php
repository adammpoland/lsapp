
<nav class="navbar navbar-default">

    <div class="container-fluid">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>                        
        </button>
      <a class="navbar-brand" href="mainstreet.php">Mainstreet</a>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="mainstreet.php">Home</a></li>
        <li><a href="storebuilder.php">Build a store</a></li>
        <li><a href="contact.php"></a></li>
        <li><a href="services.php"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if ($auth_id == 0) : ?>
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php else :?> 
      
      <li><a href="logout.php">Log Out</a></li>
      <?php endif; ?>
      
    </ul>
    </div>
  </div>
</nav>
