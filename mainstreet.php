<?php
  require('config/config.php');
  require('config/db.php');
  require('config/thestoresql.php');
  require('config/sessions.php');
  ?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="Portfolio" content="Web Development">

 
    <title>Store</title>
    
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href="css/extra.css" rel="stylesheet">
        <script src="js/jquerybootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
   
      </head>
    
<body>
    

    

<?php
include 'inc/nav.php';
?>  
  
    <div class="container">
    <p>Welcome <?php echo $name ?></p>
        <!--I should really name the database objects differently -->
        <div class="container">
                <?php foreach($user as $thing) : ?>
                <div ="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3><?php echo $thing['storename']; ?></h3>
                        <img src="images/<?php echo $thing['picture']; ?>" class="img-rounded thumb-post img-responsive"></img>
                        <small class="crop-text-2"><?php echo $thing['about']; ?></small>
                        <p><?php echo $thing['address']; ?></p>
                        <a href="storefront.php?id=<?php echo $thing['id']; ?>">Window Shop</a>
                </div>
                    </div>
                <?php endforeach; ?>
        </div>
        
        
        
       
 
      <hr>

      <footer>
        <p>&copy; store 2017</p>
      </footer>
    </div> <!-- /container -->
    </body>
</html>