<?php
include('session.php');

//to edit data
  		if (isset($_POST['block'])) {
        
        $block = addslashes($_POST['block']);
        $name = addslashes($_POST['name']);
        $phoneNo = addslashes($_POST['phoneNo']);
        $reports = addslashes($_POST['reports']);
        $remarks = addslashes($_POST['remarks']);
            
        include 'dbconnect.php';
        $sql = "UPDATE major SET name='$name', phoneNo='$phoneNo', reports='$reports', remarks='$remarks' WHERE block='$block'";
  	

  			$result = mysqli_query($conn, $sql);
  			if ($result)
  				echo 'success';
  			else
  				echo 'failed';
      }
      header("location: tenants.php");
?>
