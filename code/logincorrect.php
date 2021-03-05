<?php

 include 'config.php';
 session_start ();

 if (isset($_POST['username_check'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM customers WHERE username = '$username'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0){
 	echo "taken";
  }else{
	echo "not_taken";
  }
  exit();
 }
 ?>