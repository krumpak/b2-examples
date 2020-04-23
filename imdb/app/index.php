<?php
  define( 'varovalka', true );

  include_once './shared.php';

  $host = getVar('HOST');
  $db = getVar('DB');
  $username = getVar('USERNAME');
  $password = getVar('PASSWORD');

  try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seznam filmskih igralcev</title>
</head>
<body>
<a href="<?= getvar('APP_URL'); ?>/app/">Seznam</a>
<a href="<?= getvar('APP_URL'); ?>/app/?task=add">Dodaj novega igralca/igralko</a>
<hr><br>
<?php
  if ( isset( $_GET['vec'] ) && $_GET['vec'] >= 1 ) :

    try {
      $sql = $conn->prepare("SELECT * FROM udelezenec02.imdb WHERE id = :id LIMIT 1");
      $sql->execute(array(':id' => intval($_GET['vec'])));
      $en = $sql->fetch();
    } catch (PDOException $e ) {
      echo "Napaka pri tabeli: " . $e->getMessage();
    }

    ?>
    <!-- Več o posamezneme igralcu ali igralki -->
    Samo en igralec/igralka
    <table>
      <tr>
        <td>Ime:</td>
        <td><?= $en['ime']; ?></td>
      </tr>
      <tr>
        <td>Priimek:</td>
        <td><?= $en['priimek']; ?></td>
      </tr>
      <tr>
        <td>Žanri:</td>
        <td><?= $en['zanri']; ?></td>
      </tr>
      <tr>
        <td>Filmi:</td>
        <td><?= $en['filmi']; ?></td>
      </tr>
    </table>

  <?php elseif ( isset($_GET['task']) && $_GET['task'] === 'add' ) :
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :
      $insert = $conn->prepare("INSERT INTO udelezenec02.imdb (ime, priimek, kraj, zanri, ocena, filmi, nagrade) VALUES (:ime, :priimek, :kraj, :zanri, :ocena, :filmi, :nagrade);");

      $insert->execute(array(
        ':ime' => $_POST['ime'],
        ':priimek' => $_POST['priimek'],
        ':kraj' => $_POST['kraj'],
        ':zanri' => $_POST['zanri'],
        ':ocena' => intval($_POST['ocena']),
        ':filmi' => $_POST['filmi'],
        ':nagrade' => $_POST['nagrade']
      ));

      echo "New record created successfully";
    else : ?>

obrazec za vnos nove osebe
    <form method="POST">
      ime: <input type="text" name="ime" id="ime"><br>
      priimek: <input type="text" name="priimek" id="priimek"><br>
      kraj: <input type="text" name="kraj" id="kraj"><br>
      zanri: <input type="text" name="zanri" id="zanri"><br>
      ocena: <input type="number" name="ocena" id="ocena" min="0" max="10"><br>
      filmi: <input type="text" name="filmi" id="filmi"><br>
      nagrade: <input type="text" name="nagrade" id="nagrade"><br>
      <br>
      <br>
      <input type="submit" value="Dodaj">
    </form>

  <?php
    endif;
  else :
    try {
      $sql = $conn->prepare("SELECT * FROM udelezenec02.imdb");
      $sql->execute();
      $array = $sql->fetchAll();
    } catch (PDOException $e ) {
      echo "Napaka pri tabeli: " . $e->getMessage();
    }

    ?>

    <!-- Cel seznam vseh igralcev -->
    Cel seznam
    <table>
      <?php foreach ( $array as $index => $igralec ) : ?>
        <tr>
          <td><?= $index + 1; ?></td>
          <td><?= $igralec['ime'] ?></td>
          <td><?= $igralec['priimek'] ?></td>
          <td><a href="<?= getvar('APP_URL'); ?>/app/?vec=<?= $igralec['id']; ?>">Preberi več</a></td>
        </tr>
      <?php endforeach; ?>
    </table>

  <?php endif; ?>

</body>
</html>

<?php
  $conn = NULL;
?>
