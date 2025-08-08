<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERMS</title>
    <link rel="stylesheet" href="style.css">
    <!--font awesome-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>
</head>
<body>
  <header>
    <h1>Nk company</h1>
    <i class="fa-regular fa-user">
      <small>
        <?php
           session_start();
             include("db.php");
          echo $_SESSION['Email'];   
     
          
        ?>
    </small>
    </i>
  </header>
  
   <div class="container">
    <nav>     
      <ul>
    
        <li class="logo">
        <span class="nav-item">Dashboard</span> 
        </li>
       
        <li><a href="index.php">
          <span class="nav-item"><i class="fa-solid fa-house"></i>Home</span>
        </a></li>
        <li><a href="emp_addexprience.php">
          <span class="nav-item">Add exprience</span>
        </a></li>
        <li><a href="emp_editexprience.php">
          <span class="nav-item">Edit exprience</span>
        </a></li>
        <li><a href="emp_education.php">
          <span class="nav-item">Add Education</span>
        </a></li>
      
        <li><a href="firstpage.php">
          <span class="nav-item"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</span>
        </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
      <!--  <i class="fa-solid fa-bars"></i>-->
        <div class="container-fluid">

          <h1 style="padding: 35px; ">Add Exprience</h1>

          </div>
          <div class="form-container">
            <form method="POST" action="#">
              <div class="form-control">
             <b>Company Name:-</b> <input type="text" name="company_name" required>
             </div>
              <div class="form-control">  
              <b>Duration:-</b> <input type="text" name="duration" required >
              </div>
              <div class="form-control">
              <b>designation:-</b> <input type="text" name="designation" required>
              </div>  
                 <div class="form-control">
                 <input type="submit" name="submit" class="submit-box">
                 </div>
              
                </div>
            </form>
          </div>
        
      </section>
    
  
  </div>   
</body>
</html>

<?php

   print_r($_SESSION);
  include("db.php");
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}


$user_id=$_SESSION['user_id'];

  if(isset($_POST['submit']))
  {
    $cname= $_POST['company_name'];
    $dur= $_POST['duration'];
    $desg=$_POST['designation'];

    $query= "INSERT INTO exprience (user_id,company_name,duration,designation	) values('$user_id','$cname','$dur','$desg')";

    $data= mysqli_query($conn,$query);

    if($data){
     echo "succesfully stored in database";
    }
    else{
      echo "failed";
    }
  }
?>