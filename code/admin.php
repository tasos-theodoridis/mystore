<?php 
  
  include 'config.php';
  include 'deletebook.php';
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
    .nav li {
       display: inline;
	     font-size:120%;
       padding: 30px;
       cursor: pointer;
    }
     header {
       text-align: left;
     }
    ul li{
        display: inline;
        margin-left: 3%;
        cursor: pointer;
    }
    #paraggelies{
      width: 100%;
      text-align: center; 
      margin-top: 180px;
      min-height:690px;
    }
    #stock{
      display:none;
       width: 80%;
        text-align: center; 
        margin-left:7%;
        margin-right:10%;
        font-size:120%;
        margin-top: 180px;
        min-height:850px;
    }
    input[type=number]{
     min-width: 50px;
    } 
    #neo{
      display:none;
      font-size:120%;
      margin-top: 180px;
      min-height:690px;
    }
    .number{
      width:35%;
    }
    .mybuttons{
      width:40%;
      min-width:650px;
    }
    .mydropdown{
      width:32%;
      background-color:#c1dce0;
    }
    .disabled{
    background: transparent;
    border: 1px solid #ADE4EB;
    border-radius:6px;
    }
    footer {
       clear: both;
       margin-bottom: 0;
       position: relative;
       bottom: 0px;
       text-align: center;  
       background-color:#A57982;
    }
   .aristera{
      margin-left:30%;
    }
    .dexia{
      margin-left:10%;
    }
 */
  
</style>    
<body>
  
   <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
      <a class="navbar-brand" href="#"><img src="images/white_logo.png" style="width:110%;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul style="list-style-type: none; text-align: left; margin-left:24%; color:white; width:60%; font-size:120%;">
            <li id="par" style="color:#99b3ff;">Εκκρεμείς παραγγελίες</li>
            <li id="st">Αποθήκη</li>
            <li id="new">Εισαγωγή νέου βιβλίου</li>  
          </ul>
        <?php   
          echo ' <ul class="navbar-nav dropleft ml-auto mr-5">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" style="width:130px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="images/profileicon.png" style="width: 15%;" > ' . $_SESSION['username'] . '
                  </a>
                  <div  id="logout" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-item"><form id="loged" action="logout.php">
                       <input type="submit" value="Αποσύνδεση" class="btn btn-light" > 
                     </form>
                    </div>
                  </div>
                 </li>
              </ul> ';
         ?>
       
        
      </div>
    </nav>
   
    <div id="paraggelies">
     <div class="mr-auto ml-auto">
      <?php
        $sql6 = "SELECT * FROM orders WHERE status = 'pending' ";
        $result6 = mysqli_query($conn,$sql6);
        $counter = 1;
        while ($row6 = mysqli_fetch_assoc($result6)){
          echo '<div class="dropdown" style="margin-top:3%;">
          <button class="btn btn-light dropdown-toggle mybuttons" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          '. $counter .'&nbspUser:&nbsp '. $row6["username"]. ' &nbsp&nbsp Διέυθυνση:&nbsp'. $row6["address"] .' &nbsp&nbsp Σύνολο:&nbsp'.$row6["sunolo"].'€&nbsp';
          if ($row6["timologio"] == 1){
            echo 'Τιμολόγιο';
          }else{
            echo 'Απόδειξη';
          }
          echo '</button>
          <div class="dropdown-menu mydropdown" aria-labelledby="dropdownMenuButton">';
          //pairnw ta biblia apo to list me 1 oreder_id
          $thisorderid = $row6["order_id"];
          $sql7 = "SELECT * FROM list WHERE order_id = $thisorderid";
          $result7 = mysqli_query($conn,$sql7);
          
          $ExecutableOrder = 1;

          $counter2 = 1;
          while( $rowlist = mysqli_fetch_assoc($result7)){
            $booksinlist = $rowlist["book_id"];
            $sql8 = "SELECT * FROM books WHERE book_id =  $booksinlist";
            $result8 = mysqli_query($conn,$sql8);
            $rowbook =  mysqli_fetch_assoc($result8);

            echo ' <p class="pl-3 d-inline">'.$counter2.'&nbsp&nbsp<b style="float:left;margin-left:2%;">Τίτλος:</b>&nbsp'.$rowbook["titlos"].'&nbsp&nbsp<b style="float:right;margin-right:23%;">Κομμάτια:'.$rowlist["posothta"].'</b>';
            //pws na kanw thn sugkrish
            $temp1 = $rowlist['posothta'];
            $temp2 = $rowbook['apothema'];
            if ($temp1 > $temp2){
              $ExecutableOrder = 0;
              echo '<img src="images/warning.png" style="width:2%;float:right;">';
            }
            echo'</p><br>';
            $counter2 += 1; 
          }
          if ($ExecutableOrder == 1){
          echo '<form method="POST" action="changestatus.php">
          <input type="hidden" name="order" value="'.$thisorderid.'">
          <input type="hidden" name="tim" value="'.$row6["timologio"].'">
          <input type="submit" class="btn btn-info"  value="Αποστολή παραγγελίας">
          </form>'; 
          }
          //edw prpei na mpei to form me hidden to order_id gia na allaxei to status kai to timologio (mporw kai me sql meta) me click button ekplhrwshs paraggelias
          $counter += 1; 
          echo ' </div>
          </div> ' ;  
        }
      ?>

     </div>            
    </div>
  <div id="stock" class="mt-3">
   <h1 class="h1 mb-3 font-weight-normal">Απόθεμα βιβλίων</h1><br><br>
	   <ul id="bar" class="h2" style="list-style-type: none; text-align: left; margin-left:8%; font-size:120%; " >
        <li id="a" style="color:red;">Ξένη Λογοτεχνία</li>
        <li id="b">Ελληνική Λογοτεχνία</li>
        <li id="c">Ιστορία</li>
        <li id="d">Φαντασία</li>
        <li id="e">Comics</li>
        <li id="f">Παιδικά</li>
    </ul><br><br>
    
      
     
       <?php
      
      $sql = "SELECT * FROM books WHERE katigoria = 'a' ";
       $result = mysqli_query($conn,$sql); 
       echo '<form id="xe_log" method="POST" action="update_books.php" >
       <table class="table">
       <thead>
         <tr>
           <th>
             <h4>Τίτλος</h4>
           </th>
           <th>
             <h4>Απόθεμα</h4>
           </th>
           <th>
             <h4>Τιμή</h4>
           </th>
           <th>
            <h4>Εκδόσεις</h4>
           </th>
           <th>
            <h4>Συγγραφέας</h4>
           </th>
           <th>
            <h4>Περιγραφή</h4>
           </th>
           <th>
            <h4>Διαγραφή</h4>
           </th>
         </tr>
       </thead>
       <tbody>
       ';
       $i = 0;
       while ($row = mysqli_fetch_assoc($result)) {
         echo '<tr><td><input class=" disabled" type="text" name="new['. $i .'][titlos]" value="' . $row["titlos"] . '" style="text-align:center;"></td>
         <td><input class="number disabled" type="number" name="new['. $i .'][apothema]" value="' . $row["apothema"] . '"></td>
         <td><input class="number disabled" type="number" name="new['. $i .'][timh]" step="0.1" value="' . $row["timh"] . '" style="text-align:center;">
         <input type="hidden"  name="new['. $i .'][book_id]" value="'. $row["book_id"] .'"></td>
         <td><input class=" disabled" type="text" name="new['. $i .'][ekdoseis]" value="' . $row["ekdoseis"] . '"  style="text-align:center;"></td>
         <td><input class=" disabled" type="text" name="new['. $i .'][suggrafeas]" value="' . $row["suggrafeas"] . '" style="text-align:center;"></td>
         <td>
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

         <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
              
               </div>
               <div class="modal-body">
                  <textarea class=" disabled" type="text" name="new['. $i .'][keimeno]"  style="text-align:center;width:100%;height:180px;">' . $row["keimeno"] . '</textarea>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>
           </div>
         </div>  
         </td>
         <td><button type="button" class="btn btn-danger del_button" id="' . $row["book_id"] . '" >X</button></td>
         </tr>';
         $i = $i + 1;
       }
       echo '</tbody></table><br><br>
       <input type="submit" value="Αποθήκεθση" class="btn btn-secondary"><br><br>
       </form>';

       $sql1 = "SELECT * FROM books WHERE katigoria = 'b' ";
       $result1 = mysqli_query($conn,$sql1); 
       echo '<form id="el_log" method="POST" action="update_books.php" style="display:none;">
       <table class="table">
       <thead>
         <tr>
           <th>
             <h4>Τίτλος</h4>
           </th>
           <th>
             <h4>Απόθεμα</h4>
           </th>
           <th>
             <h4>Τιμή</h4>
           </th>
           <th>
            <h4>Εκδόσεις</h4>
           </th>
           <th>
            <h4>Συγγραφέας</h4>
           </th>
           <th>
            <h4>Περιγραφή</h4>
           </th>
           <th>
            <h4>Διαγραφή</h4>
           </th>
         </tr>
       </thead>
       <tbody>
       ';
       $i = 0;
       while ($row1 = mysqli_fetch_assoc($result1)) {
        echo '<tr><td><input class=" disabled" type="text" name="new['. $i .'][titlos]" value="' . $row1["titlos"] . '" style="text-align:center;"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][apothema]" value="' . $row1["apothema"] . '"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][timh]" step="0.1" value="' . $row1["timh"] . '" style="text-align:center;">
        <input type="hidden"  name="new['. $i .'][book_id]" value="'. $row1["book_id"] .'"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][ekdoseis]" value="' . $row1["ekdoseis"] . '"  style="text-align:center;"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][suggrafeas]" value="' . $row1["suggrafeas"] . '" style="text-align:center;"></td>
        <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                 <textarea class=" disabled" type="text" name="new['. $i .'][keimeno]"  style="text-align:center;width:100%;height:180px;">' . $row1["keimeno"] . '</textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  
        </td>
        <td><button type="button" class="btn btn-danger del_button" id="' . $row1["book_id"] . '" >X</button></td>
        </tr>';
         $i = $i + 1;
       }
       echo '</tbody></table><br><br>
       <input type="submit" value="Αποθήκεθση" class="btn btn-secondary"><br><br>
       </form>';

       $sql2 = "SELECT * FROM books WHERE katigoria = 'c' ";
       $result2 = mysqli_query($conn,$sql2); 
       echo '<form id="ist" method="POST" action="update_books.php" style="display:none;">
       <table class="table">
       <thead>
         <tr>
           <th>
             <h4>Τίτλος</h4>
           </th>
           <th>
             <h4>Απόθεμα</h4>
           </th>
           <th>
             <h4>Τιμή</h4>
           </th>
           <th>
            <h4>Εκδόσεις</h4>
           </th>
           <th>
            <h4>Συγγραφέας</h4>
           </th>
           <th>
            <h4>Περιγραφή</h4>
           </th>
           <th>
            <h4>Διαγραφή</h4>
           </th>
         </tr>
       </thead>
       <tbody>
       ';
       $i = 0;
       while ($row2 = mysqli_fetch_assoc($result2)) {
        echo '<tr><td><input class=" disabled" type="text" name="new['. $i .'][titlos]" value="' . $row2["titlos"] . '" style="text-align:center;"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][apothema]" value="' . $row2["apothema"] . '"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][timh]" step="0.1" value="' . $row2["timh"] . '" style="text-align:center;">
        <input type="hidden"  name="new['. $i .'][book_id]" value="'. $row2["book_id"] .'"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][ekdoseis]" value="' . $row2["ekdoseis"] . '"  style="text-align:center;"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][suggrafeas]" value="' . $row2["suggrafeas"] . '" style="text-align:center;"></td>
        <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                 <textarea class=" disabled" type="text" name="new['. $i .'][keimeno]"  style="text-align:center;width:100%;height:180px;">' . $row2["keimeno"] . '</textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  
        </td>
        <td><button type="button" class="btn btn-danger del_button" id="' . $row2["book_id"] . '" >X</button></td>
        </tr>';
         $i = $i + 1;
       }
       echo '</tbody></table><br><br>
       <input type="submit" value="Αποθήκεθση" class="btn btn-secondary"><br><br>
       </form>';

       $sql3 = "SELECT * FROM books WHERE katigoria = 'd' ";
       $result3 = mysqli_query($conn,$sql3); 
       echo '<form id="fant" method="POST" action="update_books.php" style="display:none;">
       <table class="table">
       <thead>
         <tr>
           <th>
             <h4>Τίτλος</h4>
           </th>
           <th>
             <h4>Απόθεμα</h4>
           </th>
           <th>
             <h4>Τιμή</h4>
           </th>
           <th>
            <h4>Εκδόσεις</h4>
           </th>
           <th>
            <h4>Συγγραφέας</h4>
           </th>
           <th>
           <h4>Περιγραφή</h4>
          </th>
          <th>
           <h4>Διαγραφή</h4>
          </th>
         </tr>
       </thead>
       <tbody>
       ';
       $i = 0;
       while ($row3 = mysqli_fetch_assoc($result3)) {
        echo '<tr><td><input class=" disabled" type="text" name="new['. $i .'][titlos]" value="' . $row3["titlos"] . '" style="text-align:center;"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][apothema]" value="' . $row3["apothema"] . '"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][timh]" step="0.1" value="' . $row3["timh"] . '" style="text-align:center;">
        <input type="hidden"  name="new['. $i .'][book_id]" value="'. $row3["book_id"] .'"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][ekdoseis]" value="' . $row3["ekdoseis"] . '"  style="text-align:center;"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][suggrafeas]" value="' . $row3["suggrafeas"] . '" style="text-align:center;"></td>
        <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                 <textarea class=" disabled" type="text" name="new['. $i .'][keimeno]"  style="text-align:center;width:100%;height:180px;">' . $row3["keimeno"] . '</textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  
        </td>
        <td><button type="button" class="btn btn-danger del_button" id="' . $row3["book_id"] . '" >X</button></td>
        </tr>';
         $i = $i + 1;
       }
       echo '</tbody></table><br><br>
       <input type="submit" value="Αποθήκεθση" class="btn btn-secondary"><br><br>
       </form>';

       $sql4 = "SELECT * FROM books WHERE katigoria = 'e' ";
       $result4 = mysqli_query($conn,$sql4); 
       echo '<form id="com" method="POST" action="update_books.php" style="display:none;">
       <table class="table">
       <thead>
         <tr>
           <th>
             <h4>Τίτλος</h4>
           </th>
           <th>
             <h4>Απόθεμα</h4>
           </th>
           <th>
             <h4>Τιμή</h4>
           </th>
           <th>
            <h4>Εκδόσεις</h4>
           </th>
           <th>
            <h4>Συγγραφέας</h4>
           </th>
           <th>
           <h4>Περιγραφή</h4>
          </th>
          <th>
           <h4>Διαγραφή</h4>
          </th>
         </tr>
       </thead>
       <tbody>
       ';
       $i = 0;
       while ($row4 = mysqli_fetch_assoc($result4)) {
        echo '<tr><td><input class=" disabled" type="text" name="new['. $i .'][titlos]" value="' . $row4["titlos"] . '" style="text-align:center;"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][apothema]" value="' . $row4["apothema"] . '"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][timh]" step="0.1" value="' . $row4["timh"] . '" style="text-align:center;">
        <input type="hidden"  name="new['. $i .'][book_id]" value="'. $row4["book_id"] .'"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][ekdoseis]" value="' . $row4["ekdoseis"] . '"  style="text-align:center;"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][suggrafeas]" value="' . $row4["suggrafeas"] . '" style="text-align:center;"></td>
        <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                 <textarea class=" disabled" type="text" name="new['. $i .'][keimeno]"  style="text-align:center;width:100%;height:180px;">' . $row4["keimeno"] . '</textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  
        </td>
        <td><button type="button" class="btn btn-danger del_button" id="' . $row4["book_id"] . '" >X</button></td>
        </tr>';
         $i = $i + 1;
       }
       echo '</tbody></table><br><br>
       <input type="submit" value="Αποθήκεθση" class="btn btn-secondary"><br><br>
       </form>';

       $sql5 = "SELECT * FROM books WHERE katigoria = 'f' ";
       $result5 = mysqli_query($conn,$sql5); 
       echo '<form id="paid" method="POST" action="update_books.php" style="display:none;">
       <table class="table">
       <thead>
         <tr>
           <th>
             <h4>Τίτλος</h4>
           </th>
           <th>
             <h4>Απόθεμα</h4>
           </th>
           <th>
             <h4>Τιμή</h4>
           </th>
           <th>
            <h4>Εκδόσεις</h4>
           </th>
           <th>
            <h4>Συγγραφέας</h4>
           </th>
           <th>
           <h4>Περιγραφή</h4>
          </th>
          <th>
           <h4>Διαγραφή</h4>
          </th>
         </tr>
       </thead>
       <tbody>
       ';
       $i = 0;
       while ($row5 = mysqli_fetch_assoc($result5)) {
        echo '<tr><td><input class=" disabled" type="text" name="new['. $i .'][titlos]" value="' . $row5["titlos"] . '" style="text-align:center;"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][apothema]" value="' . $row5["apothema"] . '"></td>
        <td><input class="number disabled" type="number" name="new['. $i .'][timh]" step="0.1" value="' . $row5["timh"] . '" style="text-align:center;">
        <input type="hidden"  name="new['. $i .'][book_id]" value="'. $row5["book_id"] .'"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][ekdoseis]" value="' . $row5["ekdoseis"] . '"  style="text-align:center;"></td>
        <td><input class=" disabled" type="text" name="new['. $i .'][suggrafeas]" value="' . $row5["suggrafeas"] . '" style="text-align:center;"></td>
        <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                 <textarea class=" disabled" type="text" name="new['. $i .'][keimeno]"  style="text-align:center;width:100%;height:180px;">' . $row5["keimeno"] . '</textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  
        </td>
        <td><button type="button" class="btn btn-danger del_button" id="' . $row5["book_id"] . '" >X</button></td>
        </tr>';
         $i = $i + 1;
       }
       echo '</tbody></table><br><br>
       <input type="submit" value="Αποθήκεθση" class="btn btn-secondary"><br><br>
       </form>';

    ?>
	   
    <br>
  </div>
  <div id="neo">
  
    <form class="mx-5 " style="text-align: center;" id="insertbook"  method="POST"  action="insertbook.php" enctype="multipart/form-data">
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-4 pt-3" >
        <label for="titlos" class="h4 " >Τίτλος βιβλίου:</label>
        <input type="text"  name="titlos"  style="float:right;"   required>
      </div>
      <div class="col-md-4" >
       <p class="h4 " >Κατηγορία βιβλίου:</p>
       <label class=" ml-2 " ><input type="radio" value="a" name="optradio" checked> Ξένη Λογοτεχνία</label>
       <label class=" ml-2 " ><input type="radio" value="b" name="optradio"> Ελληνική Λογοτεχνία</label>
       <label class=" ml-2 "><input type="radio" value="c" name="optradio"> Ιστορία</label>
       <label class=" ml-2 "><input type="radio" value="d" name="optradio"> Φαντασία</label>
       <label class=" ml-2 "><input type="radio" value="e" name="optradio"> Comics</label>
       <label class=" ml-2 "><input type="radio" value="f" name="optradio"> Παιδικά</label>
      </div>
      <div class="col-md-2" ></div>
     </div><br>

     <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-4" >
        <label for="posothta" class="h4 " >Ποσότητα παραλαβής:</label>
        <input type="number" name="posothta"  style="float:right;" required >
      </div>
      <div class="col-md-4" >
        <label for="keimeno" class="h4 " >Κείμενο περιγραφής:</label><br>
        <textarea  name="keimeno"  rows="3" style="width:80%;" required></textarea>
      </div>
      <div class="col-md-2" ></div>
     </div><br>
     
     <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-4" style="margin-top:-60px;">
        <label for="timh" class="h4" >Τιμή:</label>
        <input type="number" name="timh"  style="float:right;" step="0.01" required >
      </div>
      <div class="col-md-4" >
      <label for="img" class="h4 " >Φωτογραφία Εξωφύλλου:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
      </div>
      <div class="col-md-2" ></div>
     </div><br>

     <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-4" style="margin-top:-70px;">
        <label for="ekdoseis" class="h4 " >Εκδόσεις:</label>
        <input type="text" name="ekdoseis"  style="float:right;" required >
      </div>
      <div class="col-md-4" ></div>
      <div class="col-md-2" ></div>
     </div><br>

     <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-4" >
        <label for="suggrafeas" class="h4 " >Συγγραφέας:</label>
        <input type="text" name="suggrafeas"  style="float:right;" step="0.01" required >
      </div>
      <div class="col-md-4" ></div>
      <div class="col-md-2" ></div>
     </div>
     <br> <br> <br> 
     <input type="submit" class="btn btn-secondary" value="Καταχώρηση">   <br> 
      
    </div> 
    </form>
    <fomr id="delete" class="mx-5 " style="text-align:center;display:none;" method="POST"  action="deletebook.php">
      <p class="h4">Εισάγετε τον τίτλο του βιβλίου προς διαγραφή</p>
      <div style="text-align:center;">
      <label for="deletebook" class="h4 " >Τίτλος βιβλίου:</label>
      <input type="text"  name="deletebook"   required><br><br>
      </div>
    </form>
  </div>
  <footer id="sticky-footer" class="py-4  ">
      <div class="container text-center">
        <small>Copyright &copy; 2020 Book. ALL RIGHTS RESERVED</small>
      </div>
     </footer>
   <script>
     $(document).ready(function(){
       $("#par").click(function () {
         $("#stock").hide();
         $("#neo").hide();
         $("#paraggelies").show();
         $('#st').css('color','white');
         $('#new').css('color','white');
         $(this).css('color','#99b3ff');
       });
    
       $("#st").click(function () {
         $("#stock").show();
         $("#neo").hide();
         $("#paraggelies").hide();
         $('#par').css('color','white');
         $('#new').css('color','white');
         $(this).css('color','#99b3ff');
       });
    
       $("#new").click(function () {
         $("#stock").hide();
         $("#neo").show();
         $("#paraggelies").hide();
         $('#st').css('color','white');
         $('#par').css('color','white');
         $(this).css('color','#99b3ff');
       });
       $('#a').click(function(){
          $('#b').css('color','black');
          $('#c').css('color','black');
          $('#d').css('color','black');
          $('#e').css('color','black');
          $('#f').css('color','black');
          $(this).css('color','red');
          $("#xe_log").show();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
        });
        $('#b').click(function(){
          $('#a').css('color','black');
          $('#c').css('color','black');
          $('#d').css('color','black');
          $('#e').css('color','black');
          $('#f').css('color','black');
          $(this).css('color','red');
          $("#xe_log").hide();
         $("#el_log").show();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
        });
        $('#c').click(function(){
          $('#a').css('color','black');
          $('#b').css('color','black');
          $('#d').css('color','black');
          $('#e').css('color','black');
          $('#f').css('color','black');
          $(this).css('color','red');
          $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").show();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").hide();
        });
        $('#d').click(function(){
          $('#a').css('color','black');
          $('#b').css('color','black');
          $('#c').css('color','black');
          $('#e').css('color','black');
          $('#f').css('color','black');
          $(this).css('color','red');
          $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").show();
         $("#com").hide();
         $("#paid").hide();
        });
        $('#e').click(function(){
          $('#a').css('color','black');
          $('#b').css('color','black');
          $('#c').css('color','black');
          $('#d').css('color','black');
          $('#f').css('color','black');
          $(this).css('color','red');
          $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").show();
         $("#paid").hide();
        });
        $('#f').click(function(){
          $('#a').css('color','black');
          $('#b').css('color','black');
          $('#c').css('color','black');
          $('#d').css('color','black');
          $('#e').css('color','black');
          $(this).css('color','red');
          $("#xe_log").hide();
         $("#el_log").hide();
         $("#ist").hide();
         $("#fant").hide();
         $("#com").hide();
         $("#paid").show();
        });

        $("#neobiblio").click(function () {
         $("#delete").hide();
         $("#insertbook").show();
         $("#diagrafh").css('color','black');
         $(this).css('color','red');
       });
       $("#diagrafh").click(function () {
         $("#insertbook").hide();
         $("#delete").show();
         $("#neobiblio").css('color','black');
         $(this).css('color','red');
       });

       $(".del_button").click(function(){
        var del_id = $(this).attr('id');
        $.ajax({
        	url: 'admin.php',
        	type: 'post',
        	data: {
        		'delete' : 1,
        		'delete_id' : del_id,
        	},
        	success: function(response){
            window.location.href = "http://localhost/ptuxiaki/admin.php";
            exit();
          }
        });
       });

     });
  </script>        
</body>
</html>    