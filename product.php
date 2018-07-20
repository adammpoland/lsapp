<?php
  require('config/config.php');
  require('config/db.php');
  //require('config/storeuisql.php');
  
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $query = 'SELECT * FROM item WHERE id = '.$id;
  $query2 = 'SELECT * FROM user WHERE id = '.$id;
  
  
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    

    //fetch db and makes it into array
    $item = mysqli_fetch_assoc($result);
    $user = mysqli_fetch_assoc($result2);
    
    //free resultmy
    mysqli_free_result($result);
    mysqli_free_result($result2);
   

    //close connection
    mysqli_close($conn);

    require('config/sessions.php');
 
  ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="My Store">
    <meta name="author" content="Products">
    <title><?php echo $user['storename']; ?></title>

    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquerybootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    

</head>

<?php
include 'inc/nav.php';
?>  
<div class="container">
    
   
     
    
    <div class="container">
       
       
        
        
            <h3><?php echo $item['item']; ?></h3>
            <img src="images/<?php echo $item['picture']; ?>" class="img-rounded img-responsive"></img>
            <small><?php echo $item['description']; ?></small>
            <p>$<?php echo $item['price']; ?></p>
            
            

       
        
    </div>
        <br>
        <hr>
      <footer>
        <hr>
       
<p>&copy; store 2017</p>
      </footer>
</div> <!-- /container -->
    </body>
</html>