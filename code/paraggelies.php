
<?php 
  session_start();
  include 'config.php';
 
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
 

</head>
<style>
    body {
     height:100%;
     background-color:#F0EFEB;
      box-sizing: border-box; 
      width: 100%;
    }
    .navbar{
      background-color:#005C7A;
      padding-top:18px;      
      padding-bottom:18px;    
    }
    #likebutton{
     width:20%;
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
    #aside{
      float:right;
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
      <div class="collapse navbar-collapse" id="navbarCollapse">
    
        <?php   
          echo ' <ul class="navbar-nav dropleft ml-auto mr-5">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" style="width:130px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="images/profileicon.png" style="width: 18%;" > ' . $_SESSION['username'] . '
                  </a>
                  <div  id="logout" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-item"><form id="loged" action="logout.php">
                       <input type="submit" value="Αποσύνδεση" class="btn btn-light" > 
                     </form>
                    </div>
                    <a class="dropdown-item"  href="paraggelies.php" ><p>Οι παραγγελίες μου</p></a>
                    <a class="dropdown-item"  href="updatecustomer.php" ><p>Ενημέρωση Στοιχείων</p></a>
                  </div>
                 </li>
              </ul> ';
         ?>
       
        
      </div>
    </nav>

    	<div class="row" style="margin-left:6%;margin-top:120px;">
            <div class="col-md-12" style="margin-left:20%;">
                <h4>Παραγγελίες</h4>
            </div>
            <div class="col-lg-8 col-md-10 ml-auto mr-auto">
           
                <div class="table-responsive">
                <table class="table" >
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Κωδικός παραγγελίας</th>
                            <th>Κατάσταση</th>
                            <th colspan="2">Διεύθυνση</th>
                            <th class="text-right">Κόστος</th>
                            <th class="text-right">Επιβεβαίωση παραλαβής</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                     <?php
                     $username = $_SESSION['username'];
                     $sql = "SELECT * FROM orders WHERE username = '$username' ";
                     $result = mysqli_query($conn,$sql);
                     $i = 0;
                     if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            $i += 1;
                            echo '<tr>
                            <td style="text-align:center;">'.$i.'</td>
                            <td style="text-align:center;">'.$row["order_id"].'</td>
                            <td>'.$row["status"].'</td>
                            <td colspan="2">'.$row["address"].'</td>
                            <td class="text-right">'.$row["sunolo"].'€</td>
                            <td class="td-actions text-right">  ';
                             $status = $row["status"];
                              if ($status == 'shipped'){
                              echo '    
                             <form method="POST" action="delivered.php">            
                               <input type="hidden" value="'.$row["order_id"].'" name="deliveredid">
                               <input type="submit" rel="tooltip" class="btn btn-success  btn-just-icon btn-sm material-icons" value="&#10004;" >
                             </form> '; 
                              }
                        echo'</td>
                            </tr>';
                        }
                     }
                    ?>
                    <tr>
                        <td colspan="7" >
                          <a id="likebutton" class="text-light bg-dark"   href="arxiki.php">Επιστροφή στην αρχική<img src="images/undo.png" style="width:1.5%;"></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div> 
        </div>
       
       <!-- Footer -->
   <footer class="page-footer font-small blue pt-4" style="border-top:2px solid black;margin-top:150px;">
   
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
            
            


</body>