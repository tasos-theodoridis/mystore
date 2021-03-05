<?php 
  session_start();
  include 'config.php';
  $book = $_POST['id'];
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>bibliopolio</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript --> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
  <script src="functions.js"></script>
</head>


 <style>
    body{
      background-color:#F0EFEB;
      box-sizing: border-box;
    }
    .navbar{
      background-color:#005C7A;
    }
    .books{
      width:230px;
      height:350px;
    }
    #section{
        clear:both;
        width:100%; 
        height:100%;
    }
    #section img{
       position:relative;
       float:left;
       margin-left:2%;
       margin-top:30px;
    }
    
    .plaisio{
       float:left;
       box-shadow: 0px 0px 5px 0px rgb(161, 163, 164);
        border: 2px solid #fff;
        width:40%; 
        min-height: 500px;
        padding:30px;
        margin-top:8.3%;
        margin-left:10%;
        padding-left:15px;
        
    }
    #plaisio2{
       flex-direction: column;
       box-shadow: 0px 0px 5px 0px rgb(161, 163, 164);
        border: 2px solid #fff;
        min-height: 220px;
        padding:30px;
        
        margin-left:5%;
        margin-bottom:3%;
        padding-left:30px;
        
    }
    #info{
        margin:30px;
        padding:2%;
        margin-left:50%;
    }
     footer {
       clear: both;
       margin-bottom: 0;
       margin-top: 100px;;
       position: relative;
       bottom: 0px;
       text-align: center;
       background-color:#A57982;
    }
    button{
      width:15%;
      margin-left:45%; 
      margin-top:25px; 
    }
    .mybutton{
      box-shadow: 1px 2px 1px 2px #fff;
      margin-right:5%;
      margin-bottom: 5%;
    }
</style>  
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top ">
      <a class="navbar-brand" href="http://localhost/ptuxiaki/arxiki.php"><img src="images/white_logo.png" style="width:110%;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <form class="form-inline mt-2 " style="margin-left:20%;" method="POST" action="search.php">
          <input class="form-control mr-sm-2 form-control-lg form-control-borderless" name="forsearch" type="text" placeholder="Αναζήτηση Τίτλου" aria-label="Search" >
          <input class="btn btn-outline-success "  type="submit" value="Search">
        </form>
      
        <a href="cart.php" ><b style="margin-left:73%;color:white;">Καλάθι αγορών</b>
          <img src="images/cart_white.png" style="width:7%;"></a>
        
      <div class="collapse navbar-collapse" id="navbarCollapse">
    
        <?php   
         if (isset($_SESSION['logged'])){
          echo ' <ul class="navbar-nav dropleft ml-auto mr-5">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="width:130px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="images/white_logo.jpg" style="width: 16%;" ><span style="font-size:120%;"> ' . $_SESSION['username'] . '</span>
              </a>
                  <div  id="logout" class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <div class="dropdown-item text-center"><form id="loged" action="logout.php">
                     <input type="submit" value="Αποσύνδεση" class="btn btn-light" > 
                   </form>
                  </div>
                    <a class="dropdown-item text-center"  href="paraggelies.php" ><p>Οι παραγγελίες μου</p></a>
                    <a class="dropdown-item text-center"  href="updatecustomer.php" ><p>Ενημέρωση Στοιχείων</p></a>
                  </div>
                 </li>
              </ul> ';
         }
         ?>
       
        
      </div>
    </nav>

<br><br>
 <div id="section">
     <?php
     
     $sql = "SELECT * FROM books WHERE book_id = '$book' ";
     $result = mysqli_query($conn,$sql);
     
     if (mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
     }
     ?>
     <div id="" class="plaisio  rounded" >
       <img class="books" src="<?php echo $row["img"]; ?>" alt="ax">
       <div id="info">
           <span class="h4"><?php echo $row["titlos"]; ?> </span><br><br>
           <span class="h5">Κατηγορία: <?php if ($row["katigoria"] == 'a'){
             echo 'Ξένη Λογοτεχνία'; 
            } else if ($row["katigoria"] == 'b') {
              echo 'Ελληνίκη Λογοτεχνία';
            } else if ($row["katigoria"] == 'c') {
              echo 'Ιστορία';
            }else if ($row["katigoria"] == 'd') {
              echo 'Φαντασία';
            }else if ($row["katigoria"] == 'e') {
              echo 'Comics';
            }else if ($row["katigoria"] == 'f') {
              echo 'Παιδικά';
            }?> </span><br>
           
           <span class="h5">Εκδόσεις: <?php echo $row["ekdoseis"]; ?> </span><br>
           <span class="h5">Συγγραφέας: <?php echo $row["suggrafeas"]; ?> </span><br><br>
           <span class="h5">Τιμή: <?php echo $row["timh"]; ?>  &euro;</span><br>
           <span class="h6">Διαθέσιμο απόθεμα: <?php echo $row["apothema"]; ?> βιβλία</span><br><br>
           
           <form method="POST" action="addtocart.php">
             <input name="hidden" type="hidden" value="<?php echo $row["book_id"]; ?>">
             <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill " type="submit" value="Προσθήκη στο καλάθι" >
           </form>
       </div>
    </div>
 </div>
 
 <br>
 
 <div id="plaisio2" class="plaisio  rounded " >
     <span class="h4"><?php echo $row["titlos"]; ?> </span><br>
     <span class="h6 pt-auto pb-auto"><?php echo $row["keimeno"]; ?> </span><br><br>
     
  </div>
  <button class="mybutton btn btn-secondary float-right" style="width:15%;" onclick="window.location.href='arxiki.php';">Επιστροφή στην αρχική <img src="images/undo.png" style="width:8%;"></button>
   <!-- Footer -->
   <footer class="page-footer font-small blue pt-4" style="border-top:2px solid black;margin-top:15%;">
   
   <div class="container-fluid text-center text-md-left">
     <!-- Grid row -->
     <div class="row">
   
       <!-- Grid column -->
       <div class="col-md-3 mt-md-0 mt-3 ">
          <div ><h6>ΔΩΡΕΑΝ ΑΝΤΙΚΑΤΑΒΟΛΗ</h6><img src="images/wallet.png" style="width:6%;"></div>
       </div>
       <!-- Grid column -->
       <div class="col-md-3 mt-md-0 mt-3">
          <div ><h6>ΑΜΕΣΗ ΠΑΡΑΔΟΣΗ</h6><p>σε όλη την Ελλάδα</p><img src="images/delivery.png"  style="width:6%;"></div>
       </div>
       <!-- Grid column -->
       <hr class="clearfix w-100 d-md-none pb-3">
       <!-- Grid column -->
       <div class="col-md-3 mb-md-0 mb-3">
         <div >
            <ul style="list-style-type: none;">
                <li  class=" mb-4 "><img src="images/location.png" style="width:5%;min-width:25px;"></img>
                    <h6>Αθήνα, ΤΚ 11444, Ελλάδα</h6>
                </li>
                <li class=" my-4 "><img src="images/call.png" style="width:5%;min-width:25px;" ></img>
                    <h6>+ 30 210 2555 689</h6>
                </li>
            </ul>
           </div>
       </div>
       
       <!-- Grid column -->
       <div class="col-md-3 mb-md-0 mb-3">
       <div class="mt-4 "><a class="btn " href="contact_us.php"><img src="images/envelope.png" style="width:5%;min-width:25px;" ></img>
           <h6>contact@example.com</h6></a>
       </div>
       </div>
   
   
     </div>
     <!-- Grid row -->
   
     </div>
    <!-- Footer Links -->
   
   <!-- Copyright --> 
   <div class="footer-copyright text-center py-3" style="border-top:1px solid white;"><p>© 2020 Copyright: BookStore</p></div>
   
   </footer>       
</body>