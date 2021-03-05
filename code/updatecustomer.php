<?php

 include 'config.php';
 include 'update.php'; 
 // kalountai ta stoixeia tou user pou thelei na ta allaxei
 $username = $_SESSION['username'];
 $sql = "SELECT * FROM customers WHERE username = '$username' ";
 $result = mysqli_query($conn,$sql);
 $row =  mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>bibliopolio</title>
  <!-- display for eye CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

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
   html,
   body {
    background-color:#005C7A;
    height: 100%;
   }
    
   
  form {
    background: #fff;
    padding: 4em 4em 2em;
    max-width: 60%;
    margin: 50px auto 0;
    box-shadow: 0 0 1em #222;
    border-radius: 2px;
  }
  h2 {
    margin:0 0 50px 0;
    padding:10px;
    text-align:center;
    font-size:30px;
    color:darken(#e5e5e5, 50%);
    border-bottom:solid 1px #e5e5e5;
  }
  p {
    margin: 0 0 3em 0;
    position: relative;
  }
  input {
    display: block;
    box-sizing: border-box;
    width: 100%;
    outline: none;
    margin:0;
  }
  input[type="text"],
  input[type="password"] {
    background: #fff;
    border: 1px solid #dbdbdb;
    font-size: 1.6em;
    padding: .6em .4em;
    border-radius: 2px;
  }
  input[type="text"]:focus,
  input[type="password"]:focus {
    background: #fff
  }
  .field-icon {
  float: right;
  cursor:pointer;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
  }
  input[type="submit"] {
    border-radius: 2px;
    border:none;
    color:#fff;
    cursor:pointer;
    display:block;
    font-size:2em;
    line-height:1.6em;
    margin:2em 0 0;
    outline:none;
    padding:.8em 0;
    text-shadow: 0 1px #68B25B;
  }
  input[type="submit"]{
    background: rgba(148,175,101,1);
  }
  label{
    position: absolute;
    left: 8px;
    top: 12px;
    color: #999;
    font-size: 18px;
    display: inline-block;
    padding: 4px 10px;
    font-weight: 400;
    background-color: rgba(255,255,255,0);
    
  }
    .floatLabel{
      top: -11px;
      background-color: rgba(255,255,255,0.8);
      font-size: 14px;
    }
    #reg_btn {
    border-radius: 2px;
    border:none;
    color:#fff;
    cursor:pointer;
    display:block;
    font-size:2em;
    line-height:1.6em;
    margin:2em 0 0;
    outline:none;
    padding:.8em 0;
    text-shadow: 0 1px #68B25B;
    display: block;
    box-sizing: border-box;
    width: 100%;
    outline: none;
    margin:0;
  }
  #reg_btn{
    background: rgba(148,175,101,1);
  }

      
    
    </style>    
<body class="text-center">
     
  <div class="container" id="content">
     
     <form  method="POST" action="update.php">

        <img src="images/logo.png"  style="width: 50%;" ><br><br>
        <h2>Παρακαλώ εισάγετε τα στοιχεία σας</h2>
        <div id="error_msg"></div>
        <p>
          <label for="username" class="floatLabel">Username:</label>
          <input id="username" name="username" type="text" value="<?php echo $row["username"]; ?>" required autofocus>
          <span  role="alert"></span>
        </p>
        <p>
          <label for="password" class="floatLabel">Password:</label>
          <input id="password" class="password-field" name="password" type="password" required>
          <span toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        </p>
        <p>
          <label for="email" class="floatLabel">Email:</label>
          <input id="email" name="email" type="text" value="<?php echo $row["email"]; ?>" required>
        </p>
        <p>
          <label for="name" class="floatLabel">Όνομα:</label>
          <input id="name" name="name" type="text" value="<?php echo $row["name"]; ?>" required>
        </p>
        <p>
          <label for="surname" class="floatLabel">Επίθετο:</label>
          <input id="surname" name="surname" type="text" value="<?php echo $row["surname"]; ?>" required>
        </p>
        <p>
          <label for="phone" class="floatLabel">Αριθμός τηλεφώνου:</label>
          <input id="phone" name="phone" pattern=[0-9]{10} type="text" value="<?php echo $row["phone"]; ?>" required>
        </p>

        
        <p>
          <button type="button" name="register" id="reg_btn">Inform My Account</button>
        </p>

        
       
        <a href="arxiki.php">Επιστροφή στην Αρχική</a>
     </form>
  </div>  
 
  
  <footer id="sticky-footer" class="py-4  ">
    <div class="container text-center">
      <small>Copyright &copy; 2020 Book. ALL RIGHTS RESERVED</small>
    </div>
   </footer>
 </body>

</html>
<script>
$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});

$('document').ready(function(){
  var username_state = false;
   //insret into database the user
   $('#username').mouseout( function(){
   	var username = $('#username').val();
   	
   	 //check if username is taken 
    $.ajax({
     url: 'updatecustomer.php',
     type: 'post',
     data: {
     	'username_check' : 1,
     	'username' : username,
     },
     success: function(response){
     if (response == 'taken' ) {
         username_state = false;
         $('#username').siblings("span").removeClass();
         $('#username').siblings("span").text('Sorry... Username already taken');
         $('#username').siblings("span").addClass("alert alert-danger");
       }else if (response == 'not_taken') {
         username_state = true;
         $('#username').siblings("span").removeClass(); 
         $('#username').siblings("span").text('');	
       }else if (response == 'same_user') {
        username_state = true;
         $('#username').siblings("span").removeClass(); 
         $('#username').siblings("span").text('');	
      }
      }  
     });
    });


   $('#reg_btn').on('click', function(){
    var username = $('#username').val();
   	var email = $('#email').val();
    var password = $('#password').val();
    var name = $('#name').val();
    var surname = $('#surname').val();
    var phone = $('#phone').val();
   	if (username_state == false) {
      $('#error_msg').text('Fix the errors in the form first');
      $('#error_msg').addClass("alert alert-info");
  	}else{
        // proceed with form submission
        $.ajax({
        	url: 'updatecustomer.php',
        	type: 'post',
        	data: {
        		'save' : 1,
        		'email' : email,
        		'username' : username,
            'password' : password,
            'name' : name,
            'surname' : surname,
            'phone' : phone,
        	},
        	success: function(response){
            window.location.href = "http://localhost/ptuxiaki/arxiki.php";
            exit();
          }
        });
   	}
  });

});

</script>  