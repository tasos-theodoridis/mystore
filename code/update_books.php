<?php

 include 'config.php';
 session_start ();

 $posted = $_POST['new'];
 $size = sizeof($posted);


 for($i = 0; $i < $size; $i++){
  
   $a = $posted[$i]['apothema'];
   $b = $posted[$i]['timh'];
   $c = $posted[$i]['book_id'];
   $d = $posted[$i]['ekdoseis'];
   $e = $posted[$i]['suggrafeas'];
   $f = $posted[$i]['titlos'];
   $g = $posted[$i]['keimeno'];
    $sql = "UPDATE books SET titlos = '$f' , apothema = $a , timh = $b , ekdoseis = '$d' , suggrafeas = '$e' , keimeno = '$g'  WHERE book_id = $c  ";
     $result = mysqli_query($conn,$sql);
 }
 
    
	header( "Location: http://localhost/ptuxiaki/admin.php" );
    exit();
 

 	
?>