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
  		$sql = "SELECT block, outstanding_bill, extra
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

<form action="update3.php" method="post" class="w3-container w3-card-4 w3-text-orange w3-margin" oninput="outstanding_bill.value=(parseInt(denda.value)+parseInt(bill.value)+parseInt(utility.value)+parseInt(old_outstanding_bill.value))-parseInt(extra.value)">

 <div class="w3-row w3-section">
Block<br/>
    <div class="w3-rest">
      <input disabled style="border:none" class="w3-input" name="block" type="text" placeholder="Block Number" value="<?php echo $row['block']; ?>">
    </div>
</div>

 <div class="w3-row w3-section">
Bill<br/>
    <div class="w3-rest">
      <input style="border:none" class="w3-input" name="bill" type="number" placeholder="Bill amount">
    </div>
</div>

 <div class="w3-row w3-section">
Utility<br/>
    <div class="w3-rest">
      <input style="border:none" class="w3-input" name="utility" type="number" placeholder="Utility Amount">
    </div>
</div> 
<div class="w3-row w3-section">
Fine<br/>
    <div class="w3-rest"> 
      <input style="border:none" class="w3-input" name="denda" type="number" placeholder="Fine Amount" value="0">
    </div>
</div>
<div class="w3-row w3-section">
Previous Outstanding Bill<br/>
    <div class="w3-rest">
      <input readonly style="border:none" class="w3-input" name="old_outstanding_bill" type="number" value="<?php echo $row['outstanding_bill']; ?>">
      <input style="border:none" class="w3-input" name="extra" type="hidden" value="<?php echo $row['extra']; ?>">
</div>
      <input style="border:none" class="w3-input" name="outstanding_bill" type="hidden">

</div>
<input type="hidden" name="block" value="<?php echo $row['block']; ?>">
<input type="submit" name="edit" value=" Charge " class="w3-button w3-block w3-section w3-orange w3-hover-deep-orange w3-ripple">

</form>
</div>
</div>
</div>
</body>
</html>
