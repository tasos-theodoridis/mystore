<?php

 include 'config.php';
 session_start ();

 if (isset($_POST['delete'])) {
   $id = $_POST['delete_id'];
   $sql = "DELETE FROM books WHERE book_id = '$id'";
   $result = mysqli_query($conn,$sql); 
   if($result === TRUE){
	echo 'Deleted!';
	exit();
  }else{ 
	echo "Error inserting record: " . $conn->error;
  } 
 }
 ?>