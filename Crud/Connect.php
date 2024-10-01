<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name ="project";
$conn = null;
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
  //     the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>