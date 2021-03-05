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
    body{
        height:100%;
        background-color:#F0EFEB;
      box-sizing: border-box;
    }
    .navbar{
      background-color:#005C7A;
      padding-top:18px;      
      padding-bottom:18px;    
    }
    #loged{
      float:right;
    }
    footer {
       clear: both;
       margin-bottom: 0;
       position: relative;
       bottom: 0px;
       text-align: center;  
       background-color:#A57982;
    }
    .disabled{
    background: transparent;
    border: none;
    }
    a, a:hover, a:active, a:visited {
      color: black; 
    }


.number-input button {
  background-color: transparent;
  border:none;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  margin: 0;
  position: relative;
}
.number-input button:before,
.number-input button:after {

  transform: translate(-50%, -50%);
}

input[type=number] {
  text-align: center;
}


.md-number-input.number-input {
  border: 2px solid #ddd;
  width: 11.8rem;
}
.md-number-input.number-input button {
  outline: none;
  width: 3rem;
  height: 2rem;
  padding-top: .8rem;
}

.md-number-input.number-input button.plus {
  padding-left: 2px;
}
.md-number-input.number-input button:before,
.md-number-input.number-input button:after {
  width: 1rem;
  background-color: #212121;
}
.quantity{
  width:30;
}
.myspan{
  height: calc(1.5em + .75rem + 2px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem; 
}
.myrow{
  width: 70%;
  float:right;
    height: calc(1.5em + .75rem + 2px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem; 
}
.krufa{
  visibility:hidden;
}
#likebutton{
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  padding: 1% 2%;
  margin-bottom: 0;
}
.table_border{
  border: 2px solid #000;
  box-shadow: 0px 0px 5px 0px rgb(161, 163, 164);
  padding:30px;
  margin-bottom:30px;
  border-radius:10px;
}
.form_border{
  border: 2px solid #000;
  box-shadow: 0px 0px 5px 0px rgb(161, 163, 164);
  margin-bottom:30px;
  border-radius:10px;
  padding:30px;
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
 <div class="container" style="margin-top:200px;min-height:550px;">
   <div class="row">    
     <div class="col-lg-10  ml-auto mr-auto">
        <h3><small>Επιλεγμένα βιβλία</small></h3>
        <div class="table-responsive table_border">
          <table class="table " >
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Τίτλος</th>
                <th class="pl-5">Ποσότητα</th>
                <th >Τιμή</th>
                <th class="text-right">Διαγραφή</th>
              </tr>
            </thead>
            <tbody>
             
             <?php 
              if(isset($_SESSION['cart'])){
               $Cart = $_SESSION['cart'];
               $i = 0;
               
                 foreach($Cart as $value) {
                  $i = $i + 1; //table row
                  $j = $i - 1; //array key
                  
                  $sql = "SELECT * FROM books WHERE book_id = $value ";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_assoc($result);
                  if (mysqli_num_rows($result) > 0){
                    echo '
                      <tr class="kalathi">
                         <td class="text-center">'.$i.'</td>
                         <td><input type="text"  value="'.$row["titlos"].'" style="width:130%;" class="disabled" disabled></td>
                         <td class="pl-5">
                            <input type="number" class="change disabled" name="book['.$i.'][qty]"  value="1" style="width:30%;">
                         </td>
                         <td>
                            <input type="number" step="0.01" value="'.$row["timh"].'" name="book['.$i.'][value]" style="width:50%;text-align:left;" class="disabled" disabled>
                          </td>
                          <td class="td-actions text-right">
                            <form method="POST" action="deletefromarray.php">            
                             <input type="hidden" value="'.$j.'" name="deleterow">
                             <input type="submit" rel="tooltip" class="btn btn-danger  btn-just-icon btn-sm material-icons" value="X" >
                            </form>
                          </td>   
                       </tr>  ';
                   
                    }
                }
              }?>
                
                      <tr>
                        <td colspan="2"></td>
                        <td class="td-total">
                           <span style="font-size:120%;"> Σύνολο:</span>
                        </td>
                        <td colspan="2" class="td-price">
                          <span id="sunolo"><span>
                        </td>
                      </tr>
            </tbody>
          </table> 
        </div>  
        <h3><small>Στοιχεία Αποστολής</small></h3>
        <form class="form_border" method="POST" action="fillthelist.php" >   
    
          <input type="hidden"  name="sunolo" >
          <div class="d-inline "> <span style="font-size: 18px;">Επιθυμείτε απόδειξη ή τιμολόγιο</span> 
            <input class="ml-5" type="radio" name="gridRadios" value="false" checked>
            <label  for="gridRadios1" > Aπόδειξη</label>
           
            <input class="ml-4" type="radio" name="gridRadios" value="true" id="gridRadios2" >
            <label  for="gridRadios2" >Tιμολόγιο</label>
          </div><br><br>

          <div class="d-inline ">
            <p style="font-size:18px;">Διεύθυνση Αποστολής</p>
           <label for="address"   style="height: calc(1.5em + .75rem + 2px);font-size: 18px;margin-left:1%;" >Οδός:</label>
           <input type="text"  class="myspan " name="address1" placeholder="π.χ Ενδυμίωνος" style="margin-left:1%;" required> 
           <label for="address"   style="height: calc(1.5em + .75rem + 2px);font-size: 18px;margin-left:7%;" >Αριθμός:</label>
           <input type="text"  class=" myspan" name="address2" placeholder="π.χ 25" style="margin-left:1%;" required> 
           <label for="address"   style="height: calc(1.5em + .75rem + 2px);font-size: 18px;margin-left:7%;" >Τ.Κ.</label>
           <input type="text" pattern=[0-9]{5} class="myspan " name="address3" placeholder="π.χ 11143" required> 
          </div><br>
          <div class="d-inline ">
           <label for="afm"  style="height: calc(1.5em + .75rem + 2px);font-size: 18px;" class="krufa">ΑΦΜ</label> 
           <input type="text" class="myrow krufa " name="afm" placeholder="π.χ 123456789">
          </div><br>
          <div class="d-inline ">
           <label for="entname"  style="height: calc(1.5em + .75rem + 2px);font-size: 18px;" class="krufa">Επωνυμία Εταιρείας</label> 
           <input type="text" class="myrow krufa" name="entname" placeholder="π.χ Θεοδωρίδης Α.Ε.">
          </div><br><br>
          <?php 
          // ftiaxnw hidden input twn qty kai value gia na apofugw ta nested form
            $d = 0;
            if(isset($_SESSION['cart'])){
            foreach($Cart as $value) {
              $d = $d + 1; //table row

              if (mysqli_num_rows($result) > 0){
                echo ' <input type="hidden"  name="postthem['.$d.'][posothta]"  value="1" style="display:none;">
                <input type="hidden"  name="postthem['.$d.'][id]"  value="' .$value. '" style="display:none;">';
              }
            }
          }
          ?>
           <a id="likebutton" class="text-light bg-dark"  href="arxiki.php">Επιστροφή στην αναζήτηση <img src="images/undo.png" style="width:2%;"></a>
           <input type="submit" class="btn btn-dark" value="Αποστολή παραγγελίας" style="float:right;">
                   
        </form> 
      </div>
    </div>
</div>

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
      //upologizei to sunolo onload
      $sum = 0;
      $x = 1;
      $('.kalathi').each(function() {
        
       $a = parseFloat($("input[name ='book["+ $x +"][qty]']").val(),10);
       $b = parseFloat($("input[name ='book["+ $x +"][value]']").val(),10);
       $sum = $a * $b + $sum;
       $("input[name ='sunolo']").val($sum);
        $("#sunolo").text($sum + '€');
        $x = $x + 1;
       });
      
       //upologizei to sunolo onchange posothtas
       $( ".change" ).change(function() {
        $sum = 0;
        $x = 1;
        $('.kalathi').each(function() {
        
        $a = parseFloat($("input[name ='book["+ $x +"][qty]']").val(),10);
        $b = parseFloat($("input[name ='book["+ $x +"][value]']").val(),10);
        $sum = $a * $b + $sum;
        $("input[name ='sunolo']").val($sum);
        $("#sunolo").text($sum + '€');
        $x = $x + 1;
        });
       });
       
       //show hide inputs sumfwna me to radio 
       $('input[type=radio][name=gridRadios]').change(function() {
         if (this.value == "false"){
          $(".krufa").each(function(){
            $(".krufa").css({"visibility": "hidden"});
          });
       }else {
          $(".krufa").each(function(){
            $(".krufa").css({"visibility": "visible"});
          });
        }
       });

       //ftiaxnei ta hidden values onchange posothtas
       $( ".change" ).change(function() {
        $y = 1;
        $('.kalathi').each(function() {
          $c = parseFloat($("input[name ='book["+ $y +"][qty]']").val(),10);
          $("input[name ='postthem["+ $y +"][posothta]']").val($c);
          $y = $y + 1;
        });
       });

    });
    

    
</script>
</body>
