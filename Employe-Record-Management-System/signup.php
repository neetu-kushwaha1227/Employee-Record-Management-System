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
      <form action="#" method="POST">
        <h1>Register</h1>
        <div class="input-box">
         Full Name:<input type="text"  name="name" class="name" required> 
        </div>
        <div class="input-box">
         Email ID: <input type="text" name="Email" class="Email" required>   
        </div>
        <div class="input-box">
         Password:<input type="password"  minlength="8" class="password" id="password" name="password" required>
       </div>
        <div class="input-box">
        Conform Password:<input type="password"  minlength="8" class="password" id="password" >
        </div>
         <div class="input-box">
          Role:<input type="text" class="role" name="role" >
        </div>
        <div class="remember-forget" style="margin-bottom:'12px'";>
          <input type="checkbox" id="showpassword" onclick="myfunction()" ><label>Show Password</label>
          </div>
     
        <input class="submit" type="submit"><br>
        <div class="register-link">
         <p> <a href="login.php">Login</a></p>
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


if (isset($_POST['submit'])){

          $name=$_POST['name'];
          $email=$_POST['Email'];
          $pass=$_POST['password'];
          $role=$_POST['role'];

          $sql = "INSERT INTO user (name, email, password, role) VALUES ('$name', '$email', '$pass', '$role')";
          $result = mysqli_query($conn, $sql);
          $result=mysqli_query($conn,$sql);

          if($result)
          {
            echo "successfully stored in database.";

          }
          else
          {
            echo "failed";
          }
}
?>