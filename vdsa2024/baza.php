<!doctype html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seznam žuželk</title>
  <style>
    .zuzelke > li {
      margin-bottom: 5px;
    }
    .drzave {
      margin: 0;
    }
  </style>
</head>
<body>
<a href="./baza.php">seznam žuželk</a> |
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

    echo "<h1>Seznam žuželk</h1><ul class='zuzelke'>";
    foreach ($result as $vrstica) {

      $id = $vrstica['id'];
      $ime = $vrstica['ime'];
      $lat = $vrstica['latinsko'];

      $sql2 = $conn->prepare("SELECT * FROM zuzelke_poselitev WHERE zuzelka_id = :id ORDER BY drzava ASC");
      $sql2->execute([ 'id' => $id ]);
      $drzave = $sql2->fetchAll();

      $seznamDrzav = "<ul class='drzave'>";
      if (count($drzave) > 0) {
        foreach ($drzave as $drzava) {
          $seznamDrzav .= "<li>" . $drzava['drzava'] . "</li>";
        }
      } else {
        $seznamDrzav .= "<li>ni podatkov</li>";
      }
      $seznamDrzav .= "</ul>";

      echo "<li>$ime <i>(lat.: $lat)</i> <a href='./posodobi.php?id=$id'>✏️️</a> | <a href='./izbris.php?id=$id'>🗑️</a> $seznamDrzav </li>";
    }
    echo "</ul>";

  } catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  }





  $conn = null;

?>

</body>
</html>