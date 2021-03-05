<?php

 include 'config.php';
 session_start ();
if (isset($_SESSION['logged'])){
 $username =  $_SESSION['username'];
 $sum = $_POST['sunolo'];
 $address1 = $_POST['address1'];
 $address2 = $_POST['address2'];
 $address3 = $_POST['address3'];
 $address = $address1.''.$address2.''.$address3;
 $afm = $_POST['afm'];
 $entname = $_POST['entname'];
 $_POST['gridRadios'] = $_POST['gridRadios'] == 'true' ? true : false;
 $radio = $_POST['gridRadios'];
 
 
 $sql1 = "INSERT INTO orders (username, status, sunolo, address, timologio, afm, enterprise_name) VALUES ('$username', 'pending', '$sum', '$address', '$radio', '$afm', '$entname')";  
 $result1 = mysqli_query($conn,$sql1);
 if ($result1 === TRUE){
    $sql = "SELECT MAX(order_id) AS max FROM orders";
    $result = mysqli_query($conn,$sql);
    $id = mysqli_fetch_assoc($result);
    $highestValue = $id['max'];

    $posted = $_POST['postthem'];
    $size = sizeof($posted);
    echo $size;
    for($i = 1; $i <= $size; $i++){
        $a = $posted[$i]['id'];
        $b = $posted[$i]['posothta'];
        echo $a;
        echo $b;
        $sql2 = "INSERT INTO list (order_id, book_id, posothta) VALUES ('$highestValue', '$a', '$b')";  
        $result2 = mysqli_query($conn,$sql2);
    }
    echo '<script>alert("H παραγγελία σας, με κωδικο:'.$highestValue.' αποθηκευτηκε");
    window.location.href="http://localhost/ptuxiaki/arxiki.php"; 
    </script>';
    exit();
    
 }else {
    echo "Something went wrong...";
    exit();
}
}else{
    echo '<script>
    window.location.href="http://localhost/ptuxiaki/arxiki.php"; 
    </script>';
}

?>