<?php

require 'dbconnect.php';
//to edit data
  		if (isset($_POST['edit']) && isset($_POST['block'])) {

				$block = addslashes($_POST['block']);
				$bill = addslashes($_POST['bill']);
				$utility = addslashes($_POST['utility']);
				$denda = addslashes($_POST['denda']);
				$outstanding_bill = addslashes($_POST['outstanding_bill']);
  
  			include 'dbconnect.php';
        $sql = "UPDATE major SET bill='$bill', utility='$utility', denda='$denda', outstanding_bill='$outstanding_bill' WHERE block='$block'";
  	

  			$result = mysqli_query($conn, $sql);
  			if ($result)
  				echo 'success';
  			else
  				echo 'failed';
      }
      header("location: index.php");
?>