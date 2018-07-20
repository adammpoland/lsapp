<?php 
    require('config/config.php');
    require('config/db.php');
    
   

    if(isset($_POST['submit'])){
        //get form data
    
        $username = mysqli_real_escape_string ($conn, $_POST['username']);
        $password = mysqli_real_escape_string ($conn, $_POST['password']);  
 
          $query = "SELECT * FROM auth WHERE username = '$username' and password = '$password'";
          $result = mysqli_query($conn, $query);
          $auth = mysqli_fetch_assoc($result);
          mysqli_free_result($result);
          $name = $auth['name'];   
          $email = $auth['email'];
          $auth_id = $auth['auth_id'];
        
        if(mysqli_query($conn, $query)){
            echo "it worked"; 
            session_start();
           $_SESSION['name'] = $name;
           $_SESSION['email'] = $email;
           $_SESSION['auth_id'] = $auth_id;
           
        } else {
            echo "Wrong Password or username";
        }
     mysqli_close($conn);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
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
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="mulipart/form-data">
   
    <div class="form-group">
        <input class="form-control" type="text" name="username" placeholder="Username"><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password"><br><br>
    </div>
    

<input type="submit" name ="submit" value="submit" class="btn btn-primary">
</form>
</div>
</div>
</body>
</html>