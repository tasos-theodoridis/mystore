<?php

include 'config.php';
session_start ();
//elegxei an uparxei allos customer me to idio username 
if (isset($_POST['username_check'])) {
   $username = $_POST['username'];
   $temp = $_SESSION['username'];
   if($username ==  $temp){
     echo "same_user";
   }else {
     $sql = "SELECT * FROM customers WHERE username = '$username'";
     $result = mysqli_query($conn,$sql);
     if (mysqli_num_rows($result) > 0){
       echo "taken";
     }else{
      echo "not_taken";
     }
   }
   exit();
}

//eisagh sth bash ton neo pelath
 if (isset($_POST['save'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $phone = $_POST['phone'];
   $pwd = password_hash($password, PASSWORD_DEFAULT); //kruptografw to pass gia na mhn mporei na klapei
  
  $sql = "SELECT * FROM customers WHERE username='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      echo "exists";	
      exit();
    }else{
    $temp = $_SESSION['username'];  
    $sql1 = "UPDATE customers SET username = '$username' , password = '$pwd' , email = '$email' , name = '$name' , surname = '$surname' , phone = '$phone'  WHERE username = '$temp'";  
    $result1 = mysqli_query($conn,$sql1);
   if($result1 === TRUE){
      $_SESSION['username'] = $username;
      $_SESSION['logged'] = 'Yes';
      echo 'Saved!';
      exit();
   }else{ 
      echo "Error inserting record: " . $conn->error;
   } 
  }

  }

   
?>