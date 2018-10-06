<?php

require 'dbconnect.php';
//to add data
$tarikh = mysqli_real_escape_string($conn, $_REQUEST['tarikh']);
$revenue = mysqli_real_escape_string($conn, $_REQUEST['revenue']);
  
  			include 'dbconnect.php';
        $sql = "INSERT INTO revenue (tarikh, revenue) VALUES ('$tarikh', '$revenue')";


  			if(mysqli_query($conn, $sql)){
  				echo 'success';
			  }else{
				  echo 'failed';
			  }
      header("location: revenue.php");
?>