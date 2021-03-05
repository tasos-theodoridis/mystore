<?php

include 'config.php';
session_start ();
//elegxei an uparxei allos customer me to idio username 
if (isset($_POST['username_check'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM customers WHERE username = '$username' ";
   $result = mysqli_query($conn,$sql);
  
   $row = mysqli_fetch_assoc($result);
   if (mysqli_num_rows($result) > 0){
    $hash = $row['password'];
    if (password_verify($password, $hash)){
      $_SESSION['username'] = $username;
      $_SESSION['logged'] = 'Yes';
      echo 'correct';
      exit();
    }else{
      echo 'wrong';
      exit();
    }
   }else{
    echo 'wrong';
    exit();
   }
   
}
?>
