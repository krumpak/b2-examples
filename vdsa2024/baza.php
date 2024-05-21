<?php

  $gostitelj = "localhost";
  $uporabnik = "udelezenec02";
  $geslo = "password";
  $podatkovna_baza = "udelezenec02";

  try {
    $conn = new PDO("mysql:host=$gostitelj;dbname=$podatkovna_baza", $uporabnik, $geslo);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>