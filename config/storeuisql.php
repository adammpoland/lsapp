<?php
// get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $query = 'SELECT * FROM user WHERE id = '.$id;

  

  $result = mysqli_query($conn, $query);
  

  //fetch db DOMCdataSection
  $user = mysqli_fetch_assoc($result);

  //free resultmy
  mysqli_free_result($result);
  
  //close connection
  mysqli_close($conn);
  ?>