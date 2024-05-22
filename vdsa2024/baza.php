<!doctype html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seznam žuželk</title>
</head>
<body>
<a href="./vnos.php">dodajanje žuželk</a>
<?php

  include_once 'helper.php';

  $gostitelj = getVar('HOST');
  $podatkovna_baza = getVar('DB');
  $uporabnik = getVar('USER');
  $geslo = getVar('PASSWORD');

  try {
    $conn = new PDO("mysql:host=$gostitelj;dbname=$podatkovna_baza", $uporabnik, $geslo, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  try {
    $sql = $conn->prepare("SELECT * FROM zuzelke ORDER BY ime, latinsko ASC");
    $sql->execute();
    $result = $sql->fetchAll();

    echo "<h1>Seznam žuželk</h1><ul></ul>";
    foreach ($result as $vrstica) {
      $id = $vrstica['id'];
      $ime = $vrstica['ime'];
      $lat = $vrstica['latinsko'];

      echo "<li>$ime <i>(lat.: $lat)</i> <a href='./izbris.php?id=$id'>🗑️</a></li>";
    }
    echo "</ul>";

  } catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  }





  $conn = null;

?>

</body>
</html>