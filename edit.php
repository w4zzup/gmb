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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<body>
  <?php
  		//to retrived data
  		if (isset($_GET['block']))
  			$block = $_GET['block'];
  		else
  			$block = 0;

  		include 'dbconnect.php';
  		$sql = "SELECT block, bill, utility, outstanding_bill
  				 FROM major WHERE block = '$block'";
  		$result = mysqli_query($conn, $sql) or die('SQL error');
  		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  		
   
  ?>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-orange w3-hover-deep-orange">
    <i class="fa fa-angle-left w3-large"></i>
    Back
  </a>
<div class="w3-container w3-padding-32 w3-justify" id="edit">
<hr style="width:200px" class="w3-opacity">
<div class="w3-container w3-half w3-display-middle">
<div id="edit" class="w3-container profile">

<form action="update.php" method="post" class="w3-container w3-card-4 w3-text-orange w3-margin" oninput="outstanding_bill.value=parseInt(old_outstanding_bill.value)-parseInt(paid.value)">

 <div class="w3-row w3-section">
Block<br/>
    <div class="w3-rest">
      <input disabled style="border:none" class="w3-input" name="block" type="text" placeholder="Block Number" value="<?php echo $row['block']; ?>">
    </div>
</div>

 <div class="w3-row w3-section">
Bill<br/>
    <div class="w3-rest">
      <input disabled style="border:none" class="w3-input" name="bill" type="number" placeholder="Billable amount" value="<?php echo $row['bill']; ?>">
    </div>
</div>

 <div class="w3-row w3-section">
Utility<br/>
    <div class="w3-rest">
      <input disabled style="border:none" class="w3-input" name="utility" type="number" placeholder="Utility Amount" value="<?php echo $row['utility']; ?>">
    </div>
</div>
<div class="w3-row w3-section">
Outstanding<br/>
    <div class="w3-rest">
      <input disabled style="border:none" class="w3-input" name="old_outstanding_bill" type="number" placeholder="Outstanding Bill Amount" value="<?php echo $row['outstanding_bill']; ?>">
  </div>

<div class="w3-row w3-section">
Paid Item<br/>
    <div class="w3-rest">
<select class="w3-input" name="receipt">
      <option disabled selected value="choose">Please choose</option>
      <option value="Bill">Bill</option>
      <option value="Utility">Utility</option>
      <option value="Bill and Utility">Bill and Utility</option>
</select> 
    </div>
</div>

<div class="w3-row w3-section">
Pay<br/>
    <div class="w3-rest">
      <input style="border:none" class="w3-input" name="paid" type="number" placeholder="Pay Bill Amount" min="0">
    </div>
Outstanding Bill Balance<br/>
    <input style="border:none" class="w3-input" name="outstanding_bill" type="number" min="0">
<div class="w3-row w3-section">
Extra Money<br/>
    <div class="w3-rest">
      <input style="border:none" class="w3-input" name="extra" type="number" placeholder="Extra Money" value="<?php echo $row['extra']; ?>">
    </div>
</div>
      

</div>
<input type="hidden" name="block" value="<?php echo $row['block']; ?>">
<input type="submit" name="edit" value=" Pay " class="w3-button w3-block w3-section w3-orange w3-hover-deep-orange w3-ripple">

</form>
</div>
</div>
</div>
</body>
</html>
