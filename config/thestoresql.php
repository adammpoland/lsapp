<?php 
  $query = 'SELECT * FROM user';

  $result = mysqli_query($conn, $query);

  //fetch db and makes it into array
  

  $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free resultmy
  mysqli_free_result($result);

  //close connection
  mysqli_close($conn);
  ?>