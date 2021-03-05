<?php

 include 'config.php';
 session_start ();

 $apostoli = $_POST['order'];
 $b = $_POST['tim'];
 // update status in orders
 $sql = "UPDATE orders SET status = 'shipped' WHERE order_id = '$apostoli'";
 $result = mysqli_query($conn,$sql);
 //update apothema in books
 $sql1 = "SELECT * FROM list WHERE order_id = '$apostoli'";
 $result1 = mysqli_query($conn,$sql1);
 while($row = mysqli_fetch_assoc($result1)){

    $bookid = $row['book_id'];
    $sql3 = "SELECT * FROM books WHERE book_id = '$bookid'";
    $result3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $temp = $row3['apothema'] - $row['posothta'];

    $sql2 = "UPDATE books SET apothema = $temp WHERE book_id = '$bookid'";
    $result2 = mysqli_query($conn,$sql2);
 
 }
 header( "Location: http://localhost/ptuxiaki/admin.php" );
	exit();
 ?>