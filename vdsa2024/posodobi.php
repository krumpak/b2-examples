<?php

  include_once 'helper.php';

  $gostitelj       = getVar( 'HOST' );
  $podatkovna_baza = getVar( 'DB' );
  $uporabnik       = getVar( 'USER' );
  $geslo           = getVar( 'PASSWORD' );

  try {
    $conn = new PDO( "mysql:host=$gostitelj;dbname=$podatkovna_baza", $uporabnik, $geslo, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ) );
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch ( PDOException $e ) {
    echo "Connection failed: " . $e->getMessage();
  }

  if (isset($_POST) && !empty($_POST)) {

    try {
      $select = $conn->prepare( "UPDATE zuzelke SET ime = :ime, latinsko = :latinsko WHERE id = :id LIMIT 1" );
      $select->execute( [
        ':id' => $_POST['id'],
        ':ime' => $_POST['ime'],
        ':latinsko' => $_POST['latinsko']
      ] );

      $conn = null;

      header("Location: baza.php");

    } catch ( PDOException $e ) {
      echo "Connection failed: " . $e->getMessage();
    }

  } elseif (isset($_GET) && isset($_GET['id'])) {

    try {
      $select = $conn->prepare( "SELECT * FROM zuzelke WHERE id = :id LIMIT 1" );
      $select->execute( [
        ':id' => $_GET['id']
      ] );
      $result = $select->fetch();

      $conn = null;
    } catch ( PDOException $e ) {
      echo "Connection failed: " . $e->getMessage();
    }

  } else {
    header("Location: baza.php");
  }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Posodobi žuželko</title>
</head>
<body>
<a href="./baza.php">Seznam žuželk</a>

<form action="" method="post">
  <label for="ime">Ime* <input type="text" name="ime" id="ime" value="<?php echo $result['ime']; ?>" required></label><br>
  <label for="lat">Latinsko* <input type="text" name="latinsko" id="latinsko" value="<?php echo $result['latinsko']; ?>" required></label><br>
  <input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>" required>
  * obvezno polje<br>
  <input type="submit" value="Posodobi">
</form>
</body>
</html>
