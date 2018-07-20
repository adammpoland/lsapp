<?php 
    require('config/config.php');
    require('config/db.php');
    
    

    if(isset($_POST['delete'])){
        //get form data
        $delete_id = mysqli_real_escape_string ($conn, $_POST['delete_id']);
        
        
        $query = "DELETE FROM item WHERE id = {$delete_id}";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = 'SELECT * FROM item WHERE id = '.$id;
    $result = mysqli_query($conn, $query);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Product</title>
    
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquerybootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'inc/nav.php';
?>  

<div class="container">
<div class="well">
<h3>Are You sure you want to delete this product?</h3>
<div class="form-group">
      <div id="container">
      <h3><?php echo $item['item']; ?></h3>
   
   
        <small>$<?php echo $item['price']; ?></small>
   
        <p><?php echo $item['description']; ?></p>

      </div>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    
<input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
<input type="submit" name ="delete" value="delete" class="btn btn-danger">
</form>
</div>
</div>
</body>
</html>