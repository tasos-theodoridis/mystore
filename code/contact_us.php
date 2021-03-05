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
 

</head>
<style>
    body {
    height:100%;
    background-color:#F0EFEB;
      width: 100%;
    }
    .navbar{
      background-color:#005C7A;
      padding-top:18px;      
      padding-bottom:18px;    
    }
    #likebutton{
      float:right;
      width:30%;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
      padding: 0.8% 2%;
      margin-bottom: 0;
    }
  footer {
       clear: both;
       margin-bottom: 0;
       position: relative;
       bottom: 0px;
       text-align: center;  
       background-color:#A57982;
      
    }
</style>    
<body class="ml-auto mr-auto">
<!--Section: Contact v.2-->

    <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
        <a class="navbar-brand" href="http://localhost/ptuxiaki/arxiki.php"><img src="images/white_logo.png" style="width:110%;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        
          <?php   
           if (isset($_SESSION['logged'])){
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
                </ul> ';
           }
           ?>
         
          
        </div>
      </nav>
<section class="" style="margin-top:180px; width:100%;min-height:550px;">
    <!--Section heading-->
    

    <div class="row">

        <!--Grid column-->
        <div class="col-md-7 mb-md-0 mb-5 ml-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
              <!--Section description-->
              <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                  a matter of hours to help you.</p>
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <input type="submit" class="btn btn-dark" value="Αποστολή">
                <a id="likebutton" class="text-light bg-dark"  href="arxiki.php"><span style="margin-left:20%;">Επιστροφή στην αρχική<img src="images/undo.png" style="width:6%;"></span></a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 text-center ml-5">
        <div class="mapouter ml-5"><div class="gmap_canvas">
            <iframe width="520" height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=athnes&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://sites.google.com/view/torrentz2-eu/torrentz2"></a></div><style>.mapouter{position:relative;text-align:right;height:450px;width:520px;}.gmap_canvas {overflow:hidden;background:none!important;height:450px;width:520px;}</style>
        </div>
         </div>
        <!--Grid column-->
        
    </div>
    
     
</section>
<!--Section: Contact v.2-->

 

     <!-- Footer -->
     <footer class="page-footer font-small blue pt-4" style="border-top:2px solid black;">
   
   <div class="container-fluid text-center text-md-left ml-5">
     <!-- Grid row -->
     <div class="row ml-5">
   
       <!-- Grid column -->
       <div class="col-md-4 mt-md-0 mt-3 ">
          <div ><h6>ΔΩΡΕΑΝ ΑΝΤΙΚΑΤΑΒΟΛΗ</h6><img src="images/wallet.png" style="width:6%;"></div>
       </div>
       <!-- Grid column -->
       <div class="col-md-4 mt-md-0 mt-3">
          <div ><h6>ΑΜΕΣΗ ΠΑΡΑΔΟΣΗ</h6><p>σε όλη την Ελλάδα</p><img src="images/delivery.png"  style="width:6%;"></div>
       </div>
       <!-- Grid column -->
       <hr class="clearfix w-100 d-md-none pb-3">
       <!-- Grid column -->
       <div class="col-md-3 mb-md-0 mb-3 ">
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
       
    
   
   
     </div>
     <!-- Grid row -->
   
     </div>
    <!-- Footer Links -->
   
   <!-- Copyright --> 
   <div class="footer-copyright text-center py-3" style="border-top:1px solid white;"><p>© 2020 Copyright: BookStore</p></div>
   
   </footer>  
</body>