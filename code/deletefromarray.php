<?php

 include 'config.php';
 session_start ();

 $a = $_POST['deleterow'];
 unset($_SESSION['cart'][$a]);
 header( "Location: http://localhost/ptuxiaki/cart.php" );
    exit();
 ?>