<?php
 session_start();
include('db.php');

// check if user os logged in
if (!isset($_SESSION['user_id'])) {
    die("User is not logged in");
}

$user_id= $_SESSION['user_id'];
//$user_id=$_GET['user_id'];  //ID from URL

$sql="SELECT Exp_id,company_name,duration,designation FROM exprience WHERE  user_id = $user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$exp_id=$row['Exp_id'];
$cname=$row['company_name'];
$dur=$row['duration'];
$desg=$row['designation'];

if(!$row){
  die("Exprience record not found");
}


  if(isset($_POST['submit']))
  {
    $exp_id=$_POST['Exp_id'];
    //$user_id=$_POST['user_id'];
    $cname=$_POST['company_name'];
   $dur=$_POST['duration'];
   $desg=$_POST['designation'];
   

    $query="UPDATE exprience set Exp_id=$exp_id,company_name='$cname',duration='$dur',designation='$desg' where user_id=$user_id";

    $data= mysqli_query($conn,$query);

    if($data){
  echo "updated succesfully";
   // header("location:editexprience.php");
    }
    else{
      echo "failed";
    }
  }
?>

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
    <?php
    include("db.php");
    //Session start
    
   ?>
  <header>
    <h1>Nk company</h1>
       <i class="fa-regular fa-user">
    <small>
 
        <?php
          echo $_SESSION['Email'];
        ?>
    </small></i>
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
       <!-- <i class="fa-solid fa-bars"></i>-->
        <div class="container-fluid">

          <h1 style="padding: 35px; ">Edit my Exprience</h1>

          </div>
          <div class="form-container">
            <form method="POST" action="editexprience.php">
              <div class="form-control">
                <input type="hidden" name="user_id" value="<?= $user_id ?>">
             <b> Exprience id:-</b> <input id="Exp_id" name="Exp_id" value="<?= $row['Exp_id']?>" required>
              </div>
              <div class="form-control">
             <b> Company Name:-</b> <input type="text" id="company_name" name="company_name" value="<?= $row['company_name']?>" required>
             </div>
              <div class="form-control">
              <b>Duration:-</b> <input type="text" id="duration" name="duration" value="<?= $row['duration']?>" required>
              </div>
                <div class="form-control">  
              <b>Designation:-</b> <input type="text" id="designation" name="designation" value="<?= $row['designation']?>" required>
              </div>
                <input type="submit" name="submit" class="submit-box">
              
                </div>
            </form>
          </div>
        
      </section>
    
  
  </div>   
</body>
</html>

