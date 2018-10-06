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
  		$sql = "SELECT block, name, phoneNo, reports, remarks
  				 FROM major WHERE block = '$block'";
  		$result = mysqli_query($conn, $sql) or die('SQL error');
  		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  		
      
  ?>
  <a href="tenants.php" class="w3-bar-item w3-button w3-padding-large w3-orange w3-hover-deep-orange">
    <i class="fa fa-angle-left w3-large"></i>
    Back
  </a>
<div class="w3-container w3-padding-32 w3-justify" id="edit">
<hr style="width:200px" class="w3-opacity">
<div class="w3-container w3-half w3-display-middle">
<div id="edit" class="w3-container profile">

<form action="update2.php" method="post" class="w3-container w3-card-4 w3-text-orange w3-margin">
 <div class="w3-row w3-section">
  Block<br/>
    <div class="w3-rest">
      <input disabled style="border:none" class="w3-input" name="block" type="text" placeholder="Block" value="<?php echo $row['block']; ?>">
    </div>
</div>

 <div class="w3-row w3-section">
  Name<br/>
    <div class="w3-rest">
      <input style="border:none" class="w3-input" name="name" type="text" placeholder="Name" value="<?php echo $row['name']; ?>">
    </div>
</div>

 <div class="w3-row w3-section">
  Phone Number<br/>
    <div class="w3-rest">
      <input style="border:none" class="w3-input" name="phoneNo" type="text" placeholder="Phone Number" value="<?php echo $row['phoneNo']; ?>">
    </div>
</div>

 <div class="w3-row w3-section">
  Reports<br/>
    <div class="w3-rest">
      <textarea rows="5" style="border:none" class="w3-input" name="reports" type="text" placeholder="Reports" value="<?php echo $row['reports']; ?>"><?php echo $row['reports']; ?></textarea>
    </div>
</div>

 <div class="w3-row w3-section">
  Remarks<br/>
    <div class="w3-rest">
      <textarea rows="5" style="border:none" class="w3-input" name="remarks" type="text" placeholder="Remarks" value="<?php echo $row['remarks']; ?>"><?php echo $row['remarks']; ?></textarea>
    </div>

</div>
<input type="hidden" name="block" value="<?php echo $row['block']; ?>">
<input type="submit" name="edit" value=" Update " class="w3-button w3-block w3-section w3-orange w3-hover-deep-orange w3-ripple">

</form>
</div>
</div>
</div>
</body>
</html>
