<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<title>Flat Ferdeson</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link href="dist/select.min.css" rel="stylesheet">
<script src="dist/select.min.js"></script>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" /><style>
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.table_outer { height: 25em; overflow: auto; }

</style>
<body>

<!-- Sidebar/menu -->
<div class="sidebar" data-color="orange" data-background-color="white">
      <div class="logo">
        <div class="simple-text logo-normal">
          Flat Ferdeson
        </div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">monetization_on</i>
              <p>Main</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="tenants.php">
              <i class="material-icons">person_pin</i>
              <p>Tenants</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="revenue.php">
              <i class="material-icons">pie_chart</i>
              <p>Revenue</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
                <a class="nav-link" href="logout.php">
                    <i class="material-icons">power_settings_new</i>
                    <p>Logout</p>
                </a>
          </li>
        </ul>
      </div>
    </div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px"> 

  <!-- Header -->
  <div class="w3-container" id="search">
    <h1 class="w3-xxxlarge w3-text-orange"><b>Tenants List</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
  </div>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for block.." title="Type in a block">
<div class="table_outer">
<table id="myTable" class="table table-striped">
<thead>
			<tr class="w3-orange">
				<th>Block</th>
				<th>Name</th>
				<th>Contact</th>
        <th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "management";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $resultSet = $conn->query("SELECT block FROM major");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT block, name, phoneNo, reports, remarks FROM major";
$result = $conn->query($sql);
		while($row = $result->fetch_assoc())
		{
      echo "<tr>
          <td>" . $row['block']. "</td>
					<td>" . $row['name']. "</td>
          <td>" . $row['phoneNo']. "</td>
          <td class='td-actions'>
          <a rel='tooltip' class='btn btn-warning btn-round' href='edit2.php?block=".$row['block']."'><i class='material-icons'>create</i></a>
          <a rel='tooltip' class='btn btn-info btn-round' href='extras.php?block=".$row['block']."'><i class='material-icons'>local_printshop</i></a>
          </td>
				</tr>";
		}
		$conn->close();
		?>
		</tbody>
	</table>
</div>

<!-- End page content -->
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="./assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</body>
</html>