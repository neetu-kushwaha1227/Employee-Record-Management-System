<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERMS</title>
    <link rel="stylesheet" href="login.css">
    <!--font awesome-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>
</head>
<body>
  
  

    <div class="login">
      <form action='#' method="POST">
        <h1>Login</h1>
        <div class="input-box">
        Enter a Email id:<input type="text" class="email"  name="email" required >
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-box">
          Enter a password:<input type="password"  minlength="8" class="password" id="password" name="password" required>
          <i class="fa-solid fa-lock"></i>
        </div>
        <div class="remember-forget">
        <input type="checkbox" id="showpassword" onclick="myfunction()" ><label>Show Password</label>
          <a href="#">Forget password?</a>

        </div>
        <input class="submit" type="submit" name="submit" ><br>
        <div class="register-link">
          <p>Don't have any account
          <a href="signup.php">Register</a></p>
          </div>


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


</script>

</html>
<?php
  include("db.php");
  //session start
  session_start();

  if(isset($_POST['submit']))
  {
      $email= $_POST['email'];
      $pass= $_POST['password'];

      $query= "select * from user where email= '$email' && password='$pass'";

      $data= mysqli_query($conn,$query);

      $total= mysqli_num_rows($data);

     // echo $total;

     if($total == 1)
     {
      $user = mysqli_fetch_assoc($data);
      // echo "login ok";
     $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['Email']=$email;
       header('location:emp_index.php');
       //header('location:addexprience.php');
     }
     else{
      echo "Login failed";
     }

  }
?>
