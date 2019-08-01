<?php
//connect.php
/*
$server = '192.168.49.79';
$username   = 'root';
$password   = 'akarg123';
$dbname = 'mysql';
 
// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";*/

$con=mysqli_connect("192.168.49.79","root","akarg123","mysql");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>