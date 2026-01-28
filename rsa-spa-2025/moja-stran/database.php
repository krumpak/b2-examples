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
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
  ]);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>