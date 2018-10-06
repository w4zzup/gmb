<?php

require 'dbconnect.php';
//to edit data
  		if (isset($_POST['edit']) && isset($_POST['block'])) {

				$block = addslashes($_POST['block']);
				$paid = addslashes($_POST['paid']);
				$outstanding_bill = addslashes($_POST['outstanding_bill']);
				$receipt = addslashes($_POST['receipt']);
				$extra = addslashes($_POST['extra']);
  
  			include 'dbconnect.php';
        $sql = "UPDATE major SET paid='$paid', outstanding_bill='$outstanding_bill', receipt='$receipt', extra='$extra' WHERE block='$block'";
  	 

  			$result = mysqli_query($conn, $sql);
  			if ($result)
  				echo 'success';
  			else
  				echo 'failed';
      }
      header("location: index.php");
?>