<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$servername = env('DB_HOST', 'localhost');
$username = env('DB_USERNAME');
$password = env('DB_PASSWORD');
$dbname = env('DB_NAME');

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ]);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>