<?php
  include('db.php');

  if(isset($_GET['user_id']))
  {
    $user_id=$_GET['user_id'];

        // First, delete from dependent tables (e.g., education, exprience, employee)
    mysqli_query($conn, "DELETE FROM education WHERE user_id = $user_id");
    mysqli_query($conn, "DELETE FROM exprience WHERE user_id = $user_id");
    mysqli_query($conn, "DELETE FROM employee WHERE user_id = $user_id");

    // Now delete from user table
    $sql = "DELETE FROM user WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        //echo "delete successfully";
        header("location:admin.php");
    }
    else{
        echo "not deleted";
    }
  }
?>