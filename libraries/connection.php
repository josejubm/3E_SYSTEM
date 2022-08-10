<?php

$user = "root";
$host = "localhost";
$password = "";
$database = "jose_3e";

$connection = mysqli_connect($host, $user, $password, $database);

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  // foreach ($conn->query("SHOW DATABASES") as $row){
  //   print_r($row);
  // }
} catch (PDOException $e) {
  die("PDO Connection Error: " . $e->getMessage());
}
