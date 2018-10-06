<?php
   include("dbconnect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $tips = mysqli_real_escape_string($conn,$_POST['tips']); 
      
      $sql = "SELECT * FROM manager WHERE username = '$username' and tips = '$tips'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
    
      if($count == 1) {
         $_SESSION['login_user'] = $username;
         
         header("location: index.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>