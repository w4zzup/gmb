<?php
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword) or die ('Error connecting to mysql');
$dbname = 'management';
mysqli_select_db($conn, 'management');
?> 
