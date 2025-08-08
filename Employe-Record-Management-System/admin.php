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
    $sql="SELECT * FROM admin";
    $data= mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($data)
   ?>
  <header>
    <h1>Nk company</h1>
    <i class="fa-regular fa-user">
      <?php
        echo $r['username'];
      ?>
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
     <!--<div class="main-top" data-width="pushmenu">
        <i class="fa-solid fa-bars"></i>
      </div>-->
        <div class="container-fluid">

          <h1 style="padding: 35px; ">Dashboard</h1>

          
         </div>
         <div class="add">
         <a class='btn btn-primary' style="background:grey; padding:10px; margin:10px;" href='admin_add.php'>Add employees</a>
         <?php
          include("db.php");

          $sql="SELECT u.user_id,u.name,u.email,ed.degree,ed.university,ed.start_year,ed.end_year,ed.per from user u,education ed WHERE u.user_id=ed.user_id;";
          $data= mysqli_query($conn,$sql);

          if(!$data){
            die("Invalid query:");
          }
          $a=array('id','name','email','degree','university','start_year','end_year','per');
         echo "<table border='1' width='100%' style='margin:20px'>";
          ?>
           <tr>
             <th width="10%">Emp Id</th>
             <th width="10%">Name</th>
           <th width="20%">Email Id</th>
           <th width="10%">Degree</th>
           <th width="10%">University</th>
          <th width="10%">Start Year</th>
          <th width="10%">End Year</th>
          <th width="5%">CGPA</th>
          <th width="15%">Operation</th>
           </tr>
        <?php
        while($r=mysqli_fetch_assoc($data))
        {
            echo "<tr>
                   <td><center>".$r['user_id']."</center></td>
                    <td><center>".$r['name']."</center></td>
                   <td><center>".$r['email']."</center></td>
                   <td><center>".$r['degree']."</center></td>
                   <td><center>".$r['university']."</center></td>
                   <td><center>".$r['start_year']."</center></td>
                   <td><center>".$r['end_year']."</center></td>
                   <td><center>".$r['per']."</center></td>
                   <td>
                      <button class='btn btn-primary' style='background:blue; '><a  href='admin_edit.php?user_id=".$r['user_id']."'>Edit</a></button>
                       <button class='btn btn-danger' style='background:red;'><a  href='admin_delete.php?user_id=".$r['user_id']."'>Delete</a></button>
                   </td>
                  
                  </tr>";
        }

        ?> 
        </table>
        
      </section>
  
  </div>

 


    
</body>
</html>


