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
     session_start();
   ?>
  <header>
    <h1>Nk company</h1>
    <i class="fa-regular fa-user">
        <small>
        <?php
          echo $_SESSION['Email'];
          //   print_r($_SESSION);
        //  session_unset();
         
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
          <span class="nav-item"> <i class="fa-solid fa-house"></i>Home</span>
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

        <div class="container-fluid">

          <h1 style="padding: 35px; ">Education Information</h1>

          </div>
          <div class="form-container">
            <form method="POST" action="#">
               
                  <b>Degree:-</b><input type="text" name="degree" class="form-control" required><br>
                
                  <b>University:-</b> <input type="text" name="university" class="form-control" required><br>
                  
                  <b> Enter a Start year :-</b> <input type="text" name="start_year" class="form-control" required><br>

                   <b> Enter a end year :-</b> <input type="text" name="end_year" class="form-control" required><br>
                
                   <b>Enter a CGPA :-</b><input placeholder="8.00" type="text" name="per" class="form-control" required><br><br>

                  <input type="submit" name="submit" class="submit-box">
                </form>
             </div>
           
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
$degree=$_POST['degree'];
$uname=$_POST['university'];
$Sdate=$_POST['start_year'];
$Edate=$_POST['end_year'];
$per=$_POST['per'];


$sql="INSERT INTO education (user_id,degree,university,start_year,end_year,per)VALUES('$user_id','$degree','$uname',$Sdate,$Edate,'$per')";
$result=mysqli_query($conn,$sql);

if($result)
{
  echo "successfully stored in database.";

}
else
{
  echo "failed". mysqli_error($conn);
}
 // session_destroy();
}

?>