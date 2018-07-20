<?php 
    require('config/config.php');
    require('config/db.php');
    
    

    if(isset($_POST['submit'])){
        //get form data

        //path to store uploaded picture
        
        $target = "images/".basename($_FILES['image']['name']);

        $picture = $_FILES['image']['name'];
        if($picture == NULL ){
            $picture = "noimage.png";
        }
        $item = mysqli_real_escape_string ($conn, $_POST['item']);
        $price = mysqli_real_escape_string ($conn, $_POST['price']);
        $description = mysqli_real_escape_string ($conn, $_POST['description']);
        $userid = mysqli_real_escape_string ($conn, $_POST['userid']);


        $query = "INSERT INTO item(item, price, description, userid, picture) VALUES('$item', '$price', '$description', '$userid', '$picture')";

    if($picture != "noimage.png"){
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            echo "Image uploaded";
        }else{
            echo "Something went wrong";
        }
    }
        if(mysqli_query($conn, $query)){
            echo "you did it";
            // header('Location: '.ROOT_URL.'mainstreet.php');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = 'SELECT * FROM user WHERE id = '.$id;
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    
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
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <div class="form-group">
        <input class="form-control" type="text" name="item" placeholder="Your Product or Service"><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="number" name="price" placeholder="price"><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="file" name="image"><br><br>
    </div>
    

<textarea name="description" class="form-control" placeholder="Write a short description about your product"></textarea><br><br>

<input type="hidden" name="userid" value="<?php echo $user['id']; ?>">
<input type="submit" name ="submit" value="submit" class="btn btn-primary">
</form>
</div>
</div>
</body>
</html>