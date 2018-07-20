<?php

    session_start();
    
    $name = $_SESSION['name']??'Guest';
    $email = $_SESSION['email']??'';
    $auth_id = $_SESSION['auth_id']??'0';
?>