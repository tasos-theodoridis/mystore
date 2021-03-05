<?php

 include 'config.php';
 session_start ();

 $order = $_POST['deliveredid'];
 
 // update status in orders
 $sql = "UPDATE orders SET status = 'delivered' WHERE order_id = '$order'";
 $result = mysqli_query($conn,$sql);
 
   header( "Location: http://localhost/ptuxiaki/paraggelies.php" );
    exit();

 ?>