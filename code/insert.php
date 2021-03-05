<?php

 include 'config.php';
 session_start ();
//elegxei an uparxei allos customer me to idio username 
 if (isset($_POST['username_check'])) {
  $username = $_POST['username'];
  
  $sql = "SELECT * FROM customers WHERE username = '$username'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0){
 	echo "taken";
  }else{
	echo "not_taken";
  }
  exit();
 }
//elegxei an uparxei allos customer me to idio email den xrhshmopoihtai
 if (isset($_POST['email_check'])) {
	$email = $_POST['email'];
	$sql = "SELECT * FROM customers WHERE email = '$email'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
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
     $sql1 = "INSERT INTO customers (username, password, email, name, surname, phone) VALUES ('$username', '$pwd', '$email', '$name', '$surname', '$phone')";  
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