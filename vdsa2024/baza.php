<!doctype html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

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
    $sql = $conn->prepare("SELECT * FROM zuzelke");
    $sql->execute();
    $result = $sql->fetchAll();

    echo "<h1>Seznam žuželk</h1><ul></ul>";
    foreach ($result as $vrstica) {
      echo "<li>" . $vrstica['ime'] . "</li>";
    }
    echo "</ul>";

  } catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  }





  $conn = null;

?>

</body>
</html>