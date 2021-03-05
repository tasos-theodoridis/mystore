<?php 
 
  include 'config.php';
  include 'login.php';
 
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
 
</head>


 <style>
    body{
      background-color:#ADE4EB;
      box-sizing: border-box;
      padding-top: 4.5rem;
      
      
    }
    .navbar{
      background-color:#005C7A;
      padding-top:18px;      
      padding-bottom:18px;    
    }
    #mynav li {
       border-bottom:1px solid black;
       padding: 25px;
       cursor: pointer;
    }
    #section {
      background-color:#F0EFEB;
       float: right;
       width: 86%;
       height: 100%;
       border-left:2px solid #000;
       padding-top:7%;
       padding-bottom:10%;
       min-height:770px;
    }
    #aside {
      height: 100%;
      background-color:#ADE4EB;
      text-align: center;
       float: left;
       width: 14%;
       padding-top:1.5%;
       padding-bottom:10%;
       min-height: 720px;
       position:relative;
    }
    .books{
      width:190px;
      height:330px;
    }
     #table1 td {
       border: 1px solid white;
    }
     footer {
       clear: both;
       margin-bottom: 0;
       position: relative;
       bottom: 0px;
       text-align: center;  
       background-color:#A57982;
    }
    a, a:hover, a:active, a:visited {
      color: black; 
    }
    .pricing-card {
    background-color:#F0EFEB;
    flex-direction: column;
    min-width: 230px;
    color: #000;
    word-wrap: break-word;
    background-clip: border-box;
    border: 1px solid #fff;
    cursor:pointer;
    border-radius: 6px;
    -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
    -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
    box-shadow: 0px 0px 5px 0px rgb(161, 163, 164);
    }
    .onClickTextOverImage div {
      visibility:hidden;
      transition:.3s;
      opacity:0;
      width: 30%;
      background-color:#555;
      color:white;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip*/
      position: absolute; 
      z-index: 1;
    }
    a:link {
     text-decoration: none;
    }
    .mycarousel{
      margin-left:15%;
      margin-right:10%;
    }

   
            
</style>  

 <body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
      <a class="navbar-brand" href="http://localhost/ptuxiaki/arxiki.php"><img src="images/white_logo.png" style="width:110%;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
     
        <form class="form-inline mt-2 " style="margin-left:20%;" method="POST" action="search.php">
          <input class="form-control mr-sm-2 form-control-lg form-control-borderless" name="forsearch" type="text" placeholder="Αναζήτηση Τίτλου" aria-label="Search" >
          <input class="btn btn-outline-success "  type="submit" value="Search">
        </form>
      
        <a href="cart.php" ><b style="margin-left:73%;color:white;">Καλάθι αγορών</b>
          <img src="images/cart_white.png" style="width:7%;"></a>
        
        <?php
                if (isset($_SESSION['logged'])) {
                  echo ' <ul class="navbar-nav dropleft ml-auto mr-5">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" style="width:130px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/profileicon.png" style="width: 16%;" ><span style="font-size:120%;"> ' . $_SESSION['username'] . '</span>
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
                      </ul> 
                        ';
                }
                else {
                  echo ' 
                  <ul class="navbar-nav dropleft ml-auto" style="text-align:right;">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                       Login
                    </a>
                    <div  id="login" class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <div class="dropdown-item"  id="error_msg"></div>
                      <div class="dropdown-item" ><label for="uname">Username:</label><input type="text" id="uname" name="uname" required ></div>
                      <div class="dropdown-item" href="#"><label for="pass" style="margin-right:4px;">Password:</label><input type="password" id="pass" name="pass"  required></div>
                      <button class="btn btn-info" id="loginimg" style="margin-left:40%;">Login</button>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item"  href="register.php" ><p style="text-align:center;">Sign Up</p></a>
                    </div>
                   </li>
                </ul> ';
                }
              ?>
       
        
      </div>
    </nav>
    
	 

<?php
$sqlnew = "SELECT * FROM books WHERE book_id = '2'";
$resultnew = mysqli_query($conn,$sqlnew); 
$newrow = mysqli_fetch_assoc($resultnew);
$sqlnew1 = "SELECT * FROM books WHERE book_id = '19'";
$resultnew1 = mysqli_query($conn,$sqlnew1); 
$newrow1 = mysqli_fetch_assoc($resultnew1);
$sqlnew2 = "SELECT * FROM books WHERE book_id = '30'";
$resultnew2 = mysqli_query($conn,$sqlnew2); 
$newrow2 = mysqli_fetch_assoc($resultnew2);
?>  



<div id="section">
    <div id="demo" class="carousel slide" data-ride="carousel">

       <!-- Indicators -->
       <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
       </ul>

       <!-- The slideshow -->
      <div class="carousel-inner pb-5">
        <div class="carousel-item active">
          <div class= "mycarousel" >
           <img src="<?php echo $newrow["img"]; ?>" style="padding-top:25px;margin-left:15%;float:left;width:250px;height:330px;">
           <div  style="width:30%;margin-left:40%;min-height:360px;">
            <p>Κατηγορία: Ξένη Λογοτεχνία</p>
            <p>Τίτλος: <?php echo $newrow["titlos"]; ?></p>
            <p> <?php echo $newrow["keimeno"]; ?></p>
            <p>Τιμή: <?php echo $newrow["timh"]; ?>&euro;</p>
           </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class= "mycarousel" >
           <img src="<?php echo $newrow1["img"]; ?>" style="padding-top:25px;margin-left:15%;float:left;width:250px;height:330px;">
           <div  style="width:30%;margin-left:40%;min-height:360px;">
            <p>Κατηγορία: Ξένη Λογοτεχνία</p>
            <p>Τίτλος: <?php echo $newrow1["titlos"]; ?></p>
            <p> <?php echo $newrow1["keimeno"]; ?></p>
            <p>Τιμή: <?php echo $newrow1["timh"]; ?>&euro;</p>
           </div>
          </div>
        </div>

         <div class="carousel-item">
          <div class= "mycarousel" >
           <img src="<?php echo $newrow2["img"]; ?>" style="padding-top:25px;margin-left:15%;float:left;width:250px;height:330px;">
           <div  style="width:30%;margin-left:40%;min-height:360px;">
            <p>Κατηγορία: Ξένη Λογοτεχνία</p>
            <p>Τίτλος: <?php echo $newrow2["titlos"]; ?></p>
            <p> <?php echo $newrow2["keimeno"]; ?></p>
            <p>Τιμή: <?php echo $newrow2["timh"]; ?>&euro;</p>
           </div>
          </div>
      </div>

       <!-- Left and right controls -->
       <a class="carousel-control-prev" href="#demo" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
       </a>
       <a class="carousel-control-next" href="#demo" data-slide="next">
         <span class="carousel-control-next-icon"></span>
       </a>

    </div>
</div>

  <div id="xe_log" class="container mt-1" style="display:none;">
  <h2>Ξένη λογοτεχνία</h2>
  <?php 
  $sql = "SELECT * FROM books WHERE katigoria = 'a' ";
  $result = mysqli_query($conn,$sql); 
 
  while ($row = mysqli_fetch_assoc($result)){
  
   echo '<div style="width:31%; float:left;">
          <div class="pr-4">
            <div class="pricing-card p-3 text-center py-3 mt-2"  >
                <div  class="onClickTextOverImage" >
                 <form method="POST" action="biblia.php">
                   <input type="hidden" name="id" value="' .$row["book_id"]. '">
                   <input type="image" class="books"  alt="ax" src="' .$row["img"] . '">
                   <div>' . $row["keimeno"] . '</div>
                 </form>
                 <h6 class="mt-3">' .$row["titlos"] . '</h6>
                 <span class="d-block font-weight-bold mt-2">' .$row["timh"] . '€</span>
                 <form method="POST" action="addtocart.php">
                   <input name="hidden" type="hidden" value="' .$row["book_id"]. '">
                   <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill" type="submit" value="Προσθήκη στο καλάθι" >
                 </form>
                </div>
            </div>
          </div>
        </div>';
     
         
   }?>
  </div>

  <div id="el_log" class="container mt-1" style="display:none;">
  <h2>Ελληνική λογοτεχνία</h2>
  <?php 
  $sql1 = "SELECT * FROM books WHERE katigoria = 'b' ";
  $result1 = mysqli_query($conn,$sql1); 
 
  while ($row1 = mysqli_fetch_assoc($result1)){
  
   echo '<div style="width:31%; float:left;">
          <div class="pr-4">
            <div class="pricing-card p-3 text-center py-3 mt-2"  >
                <div  class="onClickTextOverImage" >
                <form method="POST" action="biblia.php">
                   <input type="hidden" name="id" value="' .$row1["book_id"]. '">
                   <input type="image" class="books"  alt="ax" src="' .$row1["img"] . '">
                   <div>' . $row1["keimeno"] . '</div>
                 </form>
                <h6 class="mt-3">' .$row1["titlos"] . '</h6>
                <span class="d-block font-weight-bold mt-2">' .$row1["timh"] . '€</span>
                <form method="POST" action="addtocart.php">
                <input name="hidden" type="hidden" value="' .$row1["book_id"]. '">
                <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill" type="submit" value="Προσθήκη στο καλάθι" >
                </form>
                </div>
            </div>
          </div>
        </div>';
     
         
   }?>
  </div>

  <div id="ist" class="container mt-1" style="display:none;">
  <h2>Ιστορία</h2>
  <?php 
  $sql2 = "SELECT * FROM books WHERE katigoria = 'c' ";
  $result2 = mysqli_query($conn,$sql2); 
 
  while ($row2 = mysqli_fetch_assoc($result2)){
  
   echo '<div style="width:31%; float:left;">
          <div class="pr-4">
            <div class="pricing-card p-3 text-center py-3 mt-2"  >
                <div  class="onClickTextOverImage" >
                <form method="POST" action="biblia.php">
                   <input type="hidden" name="id" value="' .$row2["book_id"]. '">
                   <input type="image" class="books"  alt="ax" src="' .$row2["img"] . '">
                   <div>' . $row2["keimeno"] . '</div>
                 </form>
                <h6 class="mt-3">' .$row2["titlos"] . '</h6>
                <span class="d-block font-weight-bold mt-2">' .$row2["timh"] . '€</span>
                <form method="POST" action="addtocart.php">
                <input name="hidden" type="hidden" value="' .$row2["book_id"]. '">
                <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill" type="submit" value="Προσθήκη στο καλάθι" >
                </form>
                </div>
            </div>
          </div>
        </div>';
     
         
   }?>
  </div>

  <div id="fant" class="container mt-1" style="display:none;">
  <h2>Φαντασία</h2>
  <?php 
  $sql3 = "SELECT * FROM books WHERE katigoria = 'd' ";
  $result3 = mysqli_query($conn,$sql3); 
 
  while ($row3 = mysqli_fetch_assoc($result3)){
  
   echo '<div style="width:31%; float:left;">
          <div class="pr-4">
            <div class="pricing-card p-3 text-center py-3 mt-2"  >
                <div  class="onClickTextOverImage" >
                <form method="POST" action="biblia.php">
                   <input type="hidden" name="id" value="' .$row3["book_id"]. '">
                   <input type="image" class="books"  alt="ax" src="' .$row3["img"] . '">
                   <div>' . $row3["keimeno"] . '</div>
                 </form>
                <h6 class="mt-3">' .$row3["titlos"] . '</h6>
                <span class="d-block font-weight-bold mt-2">' .$row3["timh"] . '€</span>
                <form method="POST" action="addtocart.php">
                <input name="hidden" type="hidden" value="' .$row3["book_id"]. '">
                <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill" type="submit" value="Προσθήκη στο καλάθι" >
                </form>
                </div>
            </div>
          </div>
        </div>';
     
         
   }?>
  </div>

  <div id="com" class="container mt-1" style="display:none;">
  <h2>Comics</h2>
  <?php 
  $sql4 = "SELECT * FROM books WHERE katigoria = 'e' ";
  $result4 = mysqli_query($conn,$sql4); 
 
  while ($row4 = mysqli_fetch_assoc($result4)){
  
   echo '<div style="width:31%; float:left;">
          <div class="pr-4">
            <div class="pricing-card p-3 text-center py-3 mt-2"  >
                <div  class="onClickTextOverImage" >
                <form method="POST" action="biblia.php">
                   <input type="hidden" name="id" value="' .$row4["book_id"]. '">
                   <input type="image" class="books"  alt="ax" src="' .$row4["img"] . '">
                   <div>' . $row4["keimeno"] . '</div>
                 </form>
                <h6 class="mt-3">' .$row4["titlos"] . '</h6>
                <span class="d-block font-weight-bold mt-2">' .$row4["timh"] . '€</span>
                <form method="POST" action="addtocart.php">
                <input name="hidden" type="hidden" value="' .$row4["book_id"]. '">
                <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill" type="submit" value="Προσθήκη στο καλάθι" >
                </form>
                </div>
            </div>
          </div>
        </div>';
     
         
   }?>
  </div>

  <div id="paid" class="container mt-1" style="display:none;">
  <h2>Παιδικά</h2>
  <?php 
  $sql5 = "SELECT * FROM books WHERE katigoria = 'f' ";
  $result5 = mysqli_query($conn,$sql5); 
 
  while ($row5 = mysqli_fetch_assoc($result5)){
  
   echo '<div style="width:31%; float:left;">
          <div class="pr-4">
            <div class="pricing-card p-3 text-center py-3 mt-2"  >
                <div  class="onClickTextOverImage" >
                <form method="POST" action="biblia.php">
                   <input type="hidden" name="id" value="' .$row5["book_id"]. '">
                   <input type="image" class="books"  alt="ax" src="' .$row5["img"] . '">
                   <div>' . $row5["keimeno"] . '</div>
                 </form>
                <h6 class="mt-3">' .$row5["titlos"] . '</h6>
                <span class="d-block font-weight-bold mt-2">' .$row5["timh"] . '€</span>
                <form method="POST" action="addtocart.php">
                <input name="hidden" type="hidden" value="' .$row5["book_id"]. '">
                <input class="add btn btn-primary shadow mt-2 px-3 rounded-pill" type="submit" value="Προσθήκη στο καλάθι" >
                </form>
                </div>
            </div>
          </div>
        </div>';
     
         
   }?>
  </div>

  

</div>
  
 
    <div id="aside">
     <nav id="mynav">
     <ul style="list-style-type: none; text-align: left; margin-left:0;margin-bottom:0;cursor:pointer; ">
       
        <li id="arxikh" style="background-color:#F0EFEB;">Αρχική</li>
        <li id="a">Ξένη Λογοτεχνία</li>
        <li id="b">Ελληνική Λογοτεχνία</li>
        <li id="c">Ιστορία</li>
        <li id="d">Φαντασία</li>
        <li id="e">Comics</li>
        <li id="f">Παιδικά</li>
        
       </ul>
      
	 </nav> 
  </div><br><br>
     
      <!-- Footer -->
   <footer class="page-footer font-small blue pt-4" style="border-top:2px solid black;">
   
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
       <div class="mt-4"><a class="btn " href="contact_us.php"><img src="images/envelope.png" style="width:5%;min-width:25px;" ></img>
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
           
   <script>
   $(document).ready(function(){
     /*tooltip gia perigrafh bibliwn
      $(".books").mouseover(function() {
        $(this).next().css({"visibility": "visible", "opacity": "1"});
      });
      $(".books").mouseout(function() {
        $(this).next().css({"visibility": "hidden", "opacity": "0"});
      });
     */ 
       $("#arxikh").click(function () {
         $('#a').css('background-color','#ADE4EB');
         $('#b').css('background-color','#ADE4EB');
         $('#c').css('background-color','#ADE4EB');
         $('#d').css('background-color','#ADE4EB');
         $('#e').css('background-color','#ADE4EB');
         $('#f').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
         $("#demo").show();
       });
  
       $("#a").click(function () {
         $('#arxikh').css('background-color','#ADE4EB');
         $('#b').css('background-color','#ADE4EB');
         $('#c').css('background-color','#ADE4EB');
         $('#d').css('background-color','#ADE4EB');
         $('#e').css('background-color','#ADE4EB');
         $('#f').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").show();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
         $("#demo").hide();
        });

        $("#b").click(function () {
         $('#arxikh').css('background-color','#ADE4EB');
         $('#a').css('background-color','#ADE4EB');
         $('#c').css('background-color','#ADE4EB');
         $('#d').css('background-color','#ADE4EB');
         $('#e').css('background-color','#ADE4EB');
         $('#f').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").hide();
         $("#el_log").show();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
         $("#demo").hide();
        });

        $("#c").click(function () {
         $('#arxikh').css('background-color','#ADE4EB');
         $('#a').css('background-color','#ADE4EB');
         $('#b').css('background-color','#ADE4EB');
         $('#d').css('background-color','#ADE4EB');
         $('#e').css('background-color','#ADE4EB');
         $('#f').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").show();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
         $("#demo").hide();
        });

        $("#d").click(function () {
         $('#arxikh').css('background-color','#ADE4EB');
         $('#a').css('background-color','#ADE4EB');
         $('#b').css('background-color','#ADE4EB');
         $('#c').css('background-color','#ADE4EB');
         $('#e').css('background-color','#ADE4EB');
         $('#f').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").show();
         $("#com").hide();
         $("#paid").hide();
         $("#demo").hide();
        });

        $("#e").click(function () {
         $('#arxikh').css('background-color','#ADE4EB');
         $('#a').css('background-color','#ADE4EB');
         $('#b').css('background-color','#ADE4EB');
         $('#c').css('background-color','#ADE4EB');
         $('#d').css('background-color','#ADE4EB');
         $('#f').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").show();
         $("#paid").hide();
         $("#demo").hide();
        });

        $("#f").click(function () {
         $('#arxikh').css('background-color','#ADE4EB');
         $('#a').css('background-color','#ADE4EB');
         $('#b').css('background-color','#ADE4EB');
         $('#c').css('background-color','#ADE4EB');
         $('#d').css('background-color','#ADE4EB');
         $('#e').css('background-color','#ADE4EB');
         $(this).css('background-color','#F0EFEB');
         $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").show();
         $("#demo").hide();
        }); 

       
       //username and password check
       $('#loginimg').on('click', function(){
       
         var username = $('#uname').val();
         var password = $('#pass').val();
         if (username == '') {
        	username_state = false;
       	  return;
         }
       	 
        $.ajax({
         url: 'arxiki.php',
         type: 'post',
         data: {
         	'username_check' : 1,
           'username' : username,
           'password' : password,
         },
         success: function(response){
          
         if (response == 'wrong' ) { 
          $('#error_msg').text('Password or username are wrong!');
          $('#error_msg').addClass("alert alert-danger");
         
          }else if (response == 'correct') {
            
            if(username == 'admin'){
              window.location = "http://localhost/ptuxiaki/admin.php";
            }else{
              window.location = "http://localhost/ptuxiaki/arxiki.php";
            }
           }
          }  
         });
        });

    });
    </script>
   
 </body>
</html>
