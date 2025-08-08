
<?php
include('db.php');
session_start();

$user_id=$_GET['user_id'];

/*$sql="SELECT id,name,email,degree,university,start_year,end_year,per from user,education WHERE user.id=education.user_id;";
$result=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($result);*/


$user=mysqli_fetch_assoc(mysqli_query($conn,"select * from user where user_id=$user_id"));
$edu=mysqli_fetch_assoc(mysqli_query($conn,"select * from education where user_id=$user_id"));
//$ecode=$r['ecode'];
$id=$user['user_id'];
$name=$user['name'];
$email=$user['email'];
$degree=$edu['degree'];
$un=$edu['university'];
$sdate=$edu['start_year'];
$edate=$edu['end_year'];
$CGPA=$edu['per'];


  if(isset($_POST['submit']))
  {
      $id=$user['user_id'];
      $name=$user['name'];
      $email=$user['email'];
      $degree=$edu['degree'];
      $un=$edu['university'];
      $sdate=$edu['start_year'];
      $edate=$edu['end_year'];
      $CGPA=$edu['per'];

         mysqli_begin_transaction($conn);

    try{
          $sql1="UPDATE user set user_id=$id,name='$name',email='$email' where user_id=$user_id";
          mysqli_query($conn,$sql1);
     
          
         $sql2="UPDATE education set degree='$degree',university='$un',start_year='$sdate',end_year='$edate',per=$CGPA where user_id=$user_id";
          mysqli_query($conn,$sql2);

          mysqli_commit($conn);
          echo "<script> alert('User and education details updated successfully!');
               window.location.href = 'admin.php'; // redirect wherever you want
               </script>";

       }catch(Exception $e){
        mysqli_rollback($conn);
        echo "update failed:".mysqli_error($conn);
       }
   /* $sql2="UPDATE user set id=$id,name='$name',email='$email' where id=$id";
   $sql2="UPDATE employee set degree='$degree',university='$university',start_year='$sdate',end_year='$edate',per=$CGPA where user_id=$id";
    $data= mysqli_query($conn,$sql1,$sql2);


    if($data){
     echo "updated succesfully";
     header("location:admin.php");
    }
    else{
      echo "failed";
    }*/
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
  <header>
    <h1>Nk company</h1>
    <i class="fa-regular fa-user"></i>
  </header>
  
   <div class="container">
    <nav>     
      <ul>
    
        <li class="logo">
        <span class="nav-item">Dashboard</span> 
        </li>
       
        <li><a href="admin.php">
          <span class="nav-item">All Employees</span>
        </a></li>
        
      
        <li><a href="#">
          <span class="nav-item"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</span>
        </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
       <!-- <i class="fa-solid fa-bars"></i>-->
        <div class="container-fluid">

          <h1 style="padding: 35px; ">Edit Employees</h1>

          
         </div>
         <div class="form-container">
            <form method="POST" action="#">
               
              <div class="form-control">
               <input type="hidden" name="id" value="<?php echo $user_id ?>" required>
              </div>
              <div class="form-control">
            <b>  Name: <input type="text" name="name"  value="<?php echo $user['name']; ?>" required>
             </div>
              <div class="form-control">  
              <b>Email:</b> <input type="text" name="email" value="<?php echo $user['email']; ?>" required>
              </div>
              <div class="form-control">
              <b>Degree:</b> <input type="text" name="degree" value="<?php echo $edu['degree']; ?>" required>
              </div>

              <div class="form-control">
                <b>University:</b> <input type="text" name="university" value="<?php echo $edu['university']; ?>" required>
                </div>
             <div class="form-control">
                  <b>Start year:</b> <input type="text" name="start_year" value="<?php echo $edu['start_year']; ?>" required>
              </div>
              <div class="form-control">
                  <b>End year:</b> <input type="text" name="end_year" value="<?php echo $edu['end_year']; ?>" required>
              </div>
              <div class="form-control">
                  <b>CGPA:</b> <input type="text" name="per" value="<?php echo $edu['per']; ?>" required>
               </div>

                <input type="submit" name="submit" value="update" class="submit-box">
              
                </div>
            </form>
          </div>
        
      </section>
    
  
  </div>   
</body>
</html>

    