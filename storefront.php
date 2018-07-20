<?php
  require('config/config.php');
  require('config/db.php');
  //require('config/storeuisql.php');
 
//   $target = "images/".basename($_FILES['image']['name']);
//   $picture = $_FILES['image']['name'];

//       if($picture == NULL ){
//           $picture = $user['picture'];
          
//       }

//       $query = "UPDATE user SET
//       Name='$Name',
//       storename='$storename',
//       email='$email',
//       address='$address', 
//       about='$about',
//       picture='$picture'
//   WHERE id = {$update_id};
//   ";
//    if($picture != "noimage.png")
//    {
//        if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
//        {
//            echo "Image uploaded";
//        } else
//        {
//            echo "Something went wrong";
//        }
//    }
   
//        if(mysqli_query($conn, $query))
//        {
//            header('Location: http://localhost/thestore/mainstreet.php');
//        } else 
//        {
//            echo 'ERROR: '.mysqli_error($conn);
//        }
   

// }

// $id = mysqli_real_escape_string($conn, $_GET['id']);
// $query = 'SELECT * FROM user WHERE id = '.$id;
// $result = mysqli_query($conn, $query);
// $user = mysqli_fetch_assoc($result);
// mysqli_free_result($result);
// mysqli_close($conn);



  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $query = 'SELECT * FROM item WHERE userid = '.$id;
  $query2 = 'SELECT * FROM user WHERE id = '.$id;
  
  
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    

    //fetch db and makes it into array
    $item = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <link href="css/extra.css" rel="stylesheet">
        <script src="js/jquerybootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    

</head>

<?php
include 'inc/nav.php';
?>  

      

    <div class="container-fluid">
    <?php if ($auth_id == $user['storeowner'] ) : ?>
      <h2>Welcome to your store <?php echo $name?></h2>
    <?php endif; ?>
    <div class="col-sm-1">
        <img src="images/<?php echo $user['picture']; ?>" class="img-responsive img-circle"></img>
        </div>

        <div class="col-sm-3">
            <div><?php echo $user['about']; ?></div>
        </div>

</div>
<br>
<br>
    <div class="container">
        <div class="row">
          

        <?php foreach($item as $product) : ?>
       
        <div class="col-md-3">
            <div class=" thumbnail">
                <h3><?php echo $product['item']; ?></h3>
                <img style="width:auto; height:200px" src="images/<?php echo $product['picture']; ?>" class="img-rounded img-responsive"></img>
                <small><?php echo $product['description']; ?></small>
                <p>$<?php echo $product['price']; ?></p>
                <a href="product.php?id=<?php echo $product['id']; ?>">See Item</a>
                <?php if ($auth_id == $user['storeowner'] ) : ?>
                <a href="<?php echo ROOT_URL; ?>editproduct.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">edit</a>
                <a href="<?php echo ROOT_URL; ?>deleteproduct.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                <?php endif; ?>
        </div>
            
        </div> 
              
        <?php endforeach; ?>
        </div>
    

        <br>
        <hr>
      
      
        <?php if ($auth_id == $user['storeowner'] ) : ?>
          <a href="<?php echo ROOT_URL; ?>editstore.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Edit Store</a>
          <a href="<?php echo ROOT_URL; ?>addproduct.php?id=<?php echo $user['id']; ?>" class="pull-right btn btn-warning">Add Product</a>
        <?php endif; ?>
       

</div> <!-- /container -->
        <footer>
            <hr><p>&copy; store 2017</p>
        </footer>
    </body>
</html>