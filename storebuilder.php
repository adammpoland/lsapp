<?php 
    require('config/config.php');
    require('config/db.php');
    

    if(isset($_POST['submit'])){
        //get form data


        $target = "images/".basename($_FILES['image']['name']);
        
                $picture = $_FILES['image']['name'];
                if($picture == NULL ){
                    $picture = "noimage.png";
                }
        
        $storename = mysqli_real_escape_string ($conn, $_POST['storename']);
       
        $address = mysqli_real_escape_string ($conn, $_POST['address']);
        $about = mysqli_real_escape_string ($conn, $_POST['about']);
        $storeowner = mysqli_real_escape_string ($conn, $_POST['storeowner']);

        $query = "INSERT INTO user(storename, address, about, picture, storeowner) VALUES('$storename', '$address', '$about', '$picture', '$storeowner')";

        if($picture != "noimage.png"){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                echo "Image uploaded";
            }else{
                echo "Something went wrong";
            }
        }
        if(mysqli_query($conn, $query)){
           header('Location:  http://localhost/thestore/mainstreet.php');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

    require('config/sessions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
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
        <input class="form-control" type="text" name="storename" placeholder="Store Name"><br><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="address" placeholder="Physical Address"><br><br>
    </div>
    <script>document.getElementById("images").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.images[0]);
};
</script>
    <div class="form-group">
        <input class="form-control" type="file" name="image" id="images"><br><br>
    </div>
    

<textarea name="about" class="form-control" placeholder="Write a short description about your store"></textarea><br><br>
<input type="hidden" name="storeowner" value="<?php echo $auth_id ?>">

<input type="submit" name ="submit" value="submit" class="btn btn-primary">
</form>
</div>
</div>
</body>
</html>