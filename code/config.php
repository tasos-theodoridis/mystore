<?php 

$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "database"; 

$conn = new mysqli($hostname , $username, $password, $dbname); 
//mysqli_set_charset($conn, "utf8mb4");

if ($conn->connect_error) 
{ 
    die("Connection failed: " . $conn->connect_error); 
}

?>
