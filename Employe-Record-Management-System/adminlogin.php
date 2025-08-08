<?php
  include("db.php");

  if(isset($_POST['submit']))
  {
    
    
     $username= $_POST['username'];
      $password= $_POST['password'];

      $query= "select * from admin where username= '$username' AND password= '$password' ";

      $data= mysqli_query($conn,$query);
      

      $total= mysqli_num_rows($data);

      //echo $total;

      if($total == 1)
     {
       //echo "login ok";
      header("location:admin.php");
     }
     else{
        echo "login failed";
     }

  }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERMS</title>
    <link rel="stylesheet" href="adminlogin.css">
    <!--font awesome-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>
</head>
<body>
  
  

    <div class="login">
      <form action='#' method="POST">
        <h1>Admin Login</h1>
        <div class="input-box">
        Enter a Admin id:<input type="text" placeholder="username" class="username" id="username" name="username" required>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-box">
          Enter a Password:<input type="password" placeholder="password" minlength="8" name="password" class="password" id="password" required>
          <i class="fa-solid fa-lock"></i>
        </div>
        <div class="remember-forget">
        <input type="checkbox" id="showpassword" onclick="myfunction()">Show Password
          <a href="#">Forget password?</a>

        </div>
        <input class="submit" type="submit" name="submit" >
      


<script type="text/javascript">
 
 let password= document.getElementById("password");
 let showpassword= document.getElementById("showpassword");
     showpassword.onclick = function(){
      if(showpassword.checked)
      {
        password.type = 'text';
      }
      else
      {
        password.type = 'password';
      }
      
     }


</script></body>
</html>

