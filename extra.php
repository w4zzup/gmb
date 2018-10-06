<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<title>Flat Ferdeson</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
  <?php
  		//to retrived data
  		if (isset($_GET['block']))
  			$block = $_GET['block'];
  		else
  			$block = 0;

  		include 'dbconnect.php';
  		$sql = "SELECT block, receipt, paid, extra, outstanding_bill
  				 FROM major WHERE block = '$block'";
  		$result = mysqli_query($conn, $sql) or die('SQL error');
  		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  		
      
  ?>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-orange w3-hover-deep-orange">
    <i class="fa fa-angle-left w3-large"></i>
  </a>
<div class="w3-container w3-third w3-text-black w3-margin w3-card-4 w3-display-topmiddle">

 <div class="w3-row w3-section">
Block :
      <?php echo $row['block']; ?>
</div>

<div class="w3-row w3-section">
Date Paid :
      <?php date_default_timezone_set("Asia/Kuala_Lumpur");
      echo "" . date("d/m/Y") .""; ?>
</div>
<div class="w3-row w3-section">
Item paid :
      <?php echo $row['receipt']; ?>
</div>

<div class="w3-row w3-section">
Paid Amount : 
      RM <?php echo $row['paid']; ?>
</div>

<div class="w3-row w3-section">
Extra Money : 
      RM <?php echo $row['extra']; ?>
</div>
<div class="w3-row w3-section">
Outstanding Bill : 
      RM <?php echo $row['outstanding_bill']; ?>
</div>
</div>
<button onclick="myFunction()" class="w3-button w3-section w3-orange w3-hover-deep-orange w3-ripple">Print this page</button>
<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
