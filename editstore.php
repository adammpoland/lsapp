<?php 
    require('config/config.php');
    require('config/db.php');
    

    if(isset($_POST['submit'])){
        //get form data
        

        $update_id = mysqli_real_escape_string ($conn, $_POST['update_id']);
        $Name = mysqli_real_escape_string ($conn, $_POST['Name']);
        $storename = mysqli_real_escape_string ($conn, $_POST['storename']);
        $email = mysqli_real_escape_string ($conn, $_POST['email']);
        $address = mysqli_real_escape_string ($conn, $_POST['address']);
        $about = mysqli_real_escape_string ($conn, $_POST['about']);
        
        $query = "UPDATE user SET
            Name='$Name',
            storename='$storename',
            email='$email',
            address='$address', 
            about='$about'
            
        WHERE id = {$update_id};
        ";

       
        
            if(mysqli_query($conn, $query))
            {
                header('Location: http://localhost/thestore/mainstreet.php');
            } else 
            {
                echo 'ERROR: '.mysqli_error($conn);
            }
        

    }

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = 'SELECT * FROM user WHERE id = '.$id;
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);


    require('config/sessions.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Your Store</title>
    
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
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

    <div class="form-group">
        <input class="form-control" type="text" name="Name" value="<?php echo $user['Name']; ?>" placeholder="Your Name" va><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="email"><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="storename" value="<?php echo $user['storename']; ?>" placeholder="Store Name"><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="address" value="<?php echo $user['address']; ?>" placeholder="Physical Address"><br><br>
    </div>
   
    <div class="form-group">
        <input class="form-control" type="file" name="image"><br><br>
    </div>
<textarea name="about" class="form-control" placeholder="Write a short description about your store"><?php echo $user['about']; ?></textarea><br><br>
<input type="hidden" name="update_id" value="<?php echo $user['id']; ?>">
<input type="submit" name ="submit" value="submit" class="btn btn-primary">
</form>
</div>
</div>
</body>
</html>
