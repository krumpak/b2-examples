<?php

  if (isset($_GET) && isset($_GET['id'])) {
    echo "Brisanje žuželke z ID: " . $_GET['id'];

    include_once 'helper.php';

    $gostitelj = getVar('HOST');
    $podatkovna_baza = getVar('DB');
    $uporabnik = getVar('USER');
    $geslo = getVar('PASSWORD');

    try {
      $conn = new PDO("mysql:host=$gostitelj;dbname=$podatkovna_baza", $uporabnik, $geslo, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $delete = $conn->prepare("DELETE FROM zuzelke WHERE id = :id LIMIT 1");
      $delete->execute([
        'id' => $_GET['id']
      ]);

      $conn = null;

      header('Location: baza.php');
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

  }

?>