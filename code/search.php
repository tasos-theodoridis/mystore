<?php

 include 'config.php';
 session_start ();

 $titlos = $_POST['forsearch'];

 $sql = "SELECT * FROM books WHERE titlos = '$titlos'";
 $result = mysqli_query($conn,$sql);
 $row =  mysqli_fetch_assoc($result);
 if (mysqli_num_rows($result) > 0) {
    echo '<form id="jsform" method="POST" action="biblia.php">
     <input type="hidden" name="id" value="' .$row["book_id"]. '">
    </form>
    
    <script type="text/javascript">
      document.getElementById("jsform").submit();
    </script>';
    exit();
 }else{
    echo '<script>
    window.location.href="http://localhost/ptuxiaki/arxiki.php"; 
    </script>';
    exit();
 }
 ?>