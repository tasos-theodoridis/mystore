<?php

 include 'config.php';
 session_start ();

 $posted = $_POST['hidden'];
 if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
 }
 array_push($_SESSION['cart'],$posted);
 
 header( "Location: http://localhost/ptuxiaki/cart.php" );
    exit();
 ?>