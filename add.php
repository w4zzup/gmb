<?php
include('session.php');
require 'dbconnect.php';
//to edit data
  		if (isset($_POST['block'])) {
        
        $receipt = addslashes($_POST['receipt']);
        $block = addslashes($_POST['block']);
        $bill = addslashes($_POST['bill']);
        $utility = addslashes($_POST['utility']);
        $outstanding_bill = addslashes($_POST["outstanding_bill"]);
            
        include 'dbconnect.php';
        $sql = "UPDATE major SET  receipt='$receipt', bill='$bill', utility='$utility', outstanding_bill='$outstanding_bill' WHERE block='$block'";
  	

  			$result = mysqli_query($conn, $sql);
  			if ($result)
  				echo 'success';
  			else
  				echo 'failed';
      }
      header("location: index.php");
?>
