<?php

 include 'config.php';
 session_start ();

 $titlos = $_POST['titlos'];
 $kathgoria = $_POST['optradio'];
 $posothta = $_POST['posothta'];
 $textarea =$_POST['keimeno'];
 $timh = $_POST['timh'];
 $ekdoseis = $_POST['ekdoseis'];
 $suggrafeas = $_POST['suggrafeas'];
 $target_dir = "images/biblia/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $keimeno = str_replace("'", "", $textarea);
 
 // Check if file already exists
if (file_exists($target_file)) {
	echo 'a';
	
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
	echo 'b';
	
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
	echo 'c';
	
  }
 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

 $sql1 = "INSERT INTO books (titlos, katigoria, apothema, keimeno, img, timh, ekdoseis, suggrafeas)   VALUES ('$titlos', '$kathgoria', '$posothta', '$keimeno', ' $target_file', '$timh', '$ekdoseis', '$suggrafeas')";  
 
$result1 = mysqli_query($conn,$sql1);
	if($result1 === TRUE){
		
		header( "Location: http://localhost/ptuxiaki/admin.php" );
	   exit();
	}else{ 
	   echo "Error inserting record: " . $conn->error;
	} 

 	
?>