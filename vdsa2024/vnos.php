<!doctype html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dodaj žuželko</title>
</head>
<body>

<a href="./baza.php">seznam žuželk</a> |
<a href="./vnos.php">dodajanje žuželk</a>

<h1>Dodaj žuželko</h1>
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

    if(isset($_POST) && !empty($_POST) && isset($_POST['ime']) && isset($_POST['lat']) && isset($_POST['drzava'])) {

      $insert = $conn->prepare("INSERT INTO zuzelke (ime, latinsko) VALUES (:ime, :lat)");
      $insert->execute([
        'ime' => $_POST['ime'],
        'lat' => $_POST['lat']
      ]);

      $insertDrzava = $conn->prepare("INSERT INTO zuzelke_poselitev (zuzelka_id, drzava) VALUES (:id, :drzava)");
      $insertDrzava->execute([
        'id' => $conn->lastInsertId(),
        'drzava' => $_POST['drzava']
      ]);

      header('Location: baza.php');
    }

  } catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  }

  $conn = null;

?>

<form action="" method="post">
  <label for="ime">Ime* <input type="text" name="ime" id="ime" required></label><br>
  <label for="lat">Latinsko* <input type="text" name="lat" id="lat" required></label><br>
  * obvezno polje<br>
  <select name="drzava" id="drzava">
    <option value="" selected disabled>--  izberi državo  --</option>
    <option value="Slovenija">Slovenija</option>
    <option value="Avstrija">Avstrija</option>
    <option value="Italija">Italija</option>
    <option value="Hrvaška">Hrvaška</option>
    <option value="Madžarska">Madžarska</option>
  </select><br>
  <input type="submit" value="Dodaj">
</form>

</body>
</html>