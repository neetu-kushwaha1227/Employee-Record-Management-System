<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Form</title>
  <link rel="stylesheet" href="style.css">
    <!--font awesome-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
    }

    .form-container {
      max-width: 900px;
      margin: auto;
      padding: 14px 85px 0px 96px;
    
    }

    h2 {
      margin-top: 0;
    }

    .form-section {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .form-group {
      flex: 1 1 28%;
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 90%;
      padding: 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .submit-btn {
      display: block;
      width: 120px;
      margin: 0px 47px 0px 228px;
      padding: 10px;
      font-size: 16px;
      background-color: #007BFF;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #0056b3;
    }

    .section-title {
      margin-bottom: 10px;
      font-size: 18px;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <header>
    <h1>Nk company</h1>
    <i class="fa-regular fa-user">
     <!--<small>
        <?php
           session_start();
             include("db.php");
          echo $_SESSION['Email'];   
     
          
        ?>
    </small>-->
    </i>
  </header>
  <div class="container">
<nav>     
      <ul>
    
        <li class="logo">
        <span class="nav-item">Dashboard</span> 
        </li>
       
        <li><a href="admin.php">
          <span class="nav-item">All Employees</span></i>
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

          <h1 style="padding: 19px; ">Add Exprience</h1>

          </div>    
           <div class="form-container">
             <form method="POST" action="#">
               <div class="form-section">
                 <!-- Employee Details -->
                  <div class="form-group">
                    <div class="section-title">Employee details:</div>
                 
                       <label>Name:</label>
                          <input type="text" name="name">
                      <label>Email</label>
                          <input type="email" name="email">
                       <label>Role</label>
                           <input type="text" name="role">
                        <label>Date of Birth</label>
                            <input type="date" name="dob">
                         <label>Contact</label>
                             <input type="text" name="contact">
                         <label>Dept</label>
                             <input type="text" name="dept">
                          <label>Join Date</label>
                            <input type="text" name="join_date">
                          <label>Salary</label>
                              <input type="text" name="salary">
                    </div>

                     <!-- Education Details -->
                   <div class="form-group">
                     <div class="section-title">Education details:</div>
                        <label>Degree</label>
                           <input type="text" name="degree">
                         <label>University</label>
                              <input type="text" name="university">
                          <label>Start Year</label>
                               <input type="text" name="start_year">
                          <label>End Year</label>
                             <input type="text" name="end_year">
                           <label>Per</label>
                             <input type="text" name="per">
                   </div>

                    <!-- Experience Details -->
                    <div class="form-group">
                      <div class="section-title">Experience details:</div>
                      <label>Company Name</label>
                      <input type="text" name="company_name">
                      <label>Duration</label>
                      <input type="text" name="duration">
                      <label>Designation</label>
                      <input type="text" name="designation">
                      <label>Password</label>
                      <input type="password" name="password">
                    </div>
               </div>

                <button type="submit" name="submit" class="submit-btn">Submit</button>
             </form>
           </div>
        </div>
      </section>
  </div>

</body>
</html>


    
<?php

include('db.php'); // DB connection file

if (isset($_POST['submit'])) {
   // $user_id=$_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $role = $_POST['role'];

    $dob=$_POST['dob'];
    $contact=$_POST['contact'];
    $dept=$_POST['dept'];
    $jd=$_POST['join_date'];
    $salary=$_POST['salary'];

    $company = $_POST['company_name'];
    $duration = $_POST['duration'];
    $designation = $_POST['designation'];

    $degree = $_POST['degree'];
    $university = $_POST['university'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $per = $_POST['per'];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // 1. Insert into user table
        $sql1 = "INSERT INTO user (name, email, password, role) 
                 VALUES ('$name', '$email', '$password', '$role')";
         if (!mysqli_query($conn, $sql1)) {
            throw new Exception("User insert error: " . mysqli_error($conn));
        }
        $user_id = mysqli_insert_id($conn);

        // 2. Insert into experience table
        $sql2 = "INSERT INTO exprience (user_id, company_name, duration, designation)
                 VALUES ('$user_id', '$company', '$duration', '$designation')";
       // mysqli_query($conn, $sql2);
        if (!mysqli_query($conn, $sql2)) {
            throw new Exception("User insert error: " . mysqli_error($conn));
        }

        // 3. Insert into education table
        $sql3 = "INSERT INTO education (user_id, degree, university, start_year, end_year, per)
                 VALUES ('$user_id', '$degree', '$university', '$start_year', '$end_year', '$per')";
        //mysqli_query($conn, $sql3);
         if (!mysqli_query($conn, $sql3)) {
            throw new Exception("User insert error: " . mysqli_error($conn));
        }

        //4. Insert into employee table
        $sql4= "INSERT INTO  employee(dob,contact,dept,join_date,salary,user_id) 
                VALUES ('$dob','$contact','$dept','$jd','$salary','$user_id')";
        //mysqli_query($conn,$sql4);
         if (!mysqli_query($conn, $sql4)) {
            throw new Exception("User insert error: " . mysqli_error($conn));
        }

        // 7. Commit the transaction
        mysqli_commit($conn);

        echo "<script>
                alert('Employee added successfully!');
                window.location.href = 'admin.php';
              </script>";
    } catch (Exception $e) {
       mysqli_rollback($conn);
        echo "Error occurred: " .$e->getMessage();;
    }
}
?>