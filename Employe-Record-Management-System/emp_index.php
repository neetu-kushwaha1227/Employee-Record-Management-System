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
           //  print_r($_SESSION)  
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
          <!--<i class="fa-solid fa-house"></i>-->
          <span class="nav-item"><i class="fa-solid fa-house"></i>Home</span>
        </a></li>
        <li><a href="emp_addexprience.php">
          <span class="nav-item">Add exprience</span>
        </a></li>
        <li><a  href="emp_editexprience.php">
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

          <h1 style="padding: 35px; ">Dashboard</h1>

          </div>
          <div class="details" style="padding: 5px 6px 6px 61px; line-height: 2;">
                                <?php
                        include("db.php");

                      $user_id = $_SESSION['user_id'];

                      $query1 = "SELECT name FROM user WHERE user_id = $user_id";
                      $result = mysqli_query($conn, $query1);
                      $row = mysqli_fetch_assoc($result);

                      echo "<h2 style='padding-left: 319px;padding-bottom: 20px; font-size: xx-large; font-style: italic;'>
                            Welcome, " . $row['name'] . "</h2>";
                    

                      $query2 = "SELECT * FROM education WHERE user_id = $user_id";
                      $result = mysqli_query($conn, $query2);

                      echo "<h3>Education Details:</h3>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<p>Degree: " . $row['degree'] . "</p>";
                          echo "<p>University: " . $row['university'] . "</p>";
                          echo "<hr>";
                      }

                      $query3 = "SELECT * FROM exprience WHERE user_id = $user_id";
                      $result = mysqli_query($conn, $query3);

                      echo "<h3>Experience Details:</h3>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<p>Company: " . $row['company_name'] . "</p>";
                          echo "<p>Duration: " . $row['duration'] . "</p>";
                          echo "<p>Designation: " . $row['designation'] . "</p>";
                          echo "<hr>";
                      }
                      ?>
             </div>

        
      </section>
  
  </div>

 


    
</body>
</html>
