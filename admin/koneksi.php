<?php
$conn = mysqli_connect("localhost","root","","pt_murgung");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>