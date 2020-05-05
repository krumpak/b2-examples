<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    try {
      $update = $conn->prepare("UPDATE udelezenec02.imdb SET ime=:ime, priimek=:priimek, kraj=:kraj, zanri=:zanri, ocena=:ocena, filmi=:filmi, nagrade=:nagrade, updated_at=now() WHERE id = :id");
      $update->bindValue(":id", intval($_POST['id']));
      $update->bindValue(":ime", $_POST['ime']);
      $update->bindValue(":priimek", $_POST['priimek']);
      $update->bindValue(":kraj", $_POST['kraj']);
      $update->bindValue(":zanri", $_POST['zanri']);
      $update->bindValue(":ocena", intval($_POST['ocena']));
      $update->bindValue(":filmi", $_POST['filmi']);
      $update->bindValue(":nagrade", $_POST['nagrade']);
      $update->bindValue(":updated_at", date('Y-m-d H:i:s'));
      $update->execute();
    } catch (PDOException $e ) {
      echo "Napaka pri tabeli: " . $e->getMessage();
    }

  endif;

  try {
    $sql = $conn->prepare("SELECT * FROM udelezenec02.imdb WHERE id = :id LIMIT 1");
    $sql->execute(array(':id' => intval($_GET['id'])));
    $en = $sql->fetch();
  } catch (PDOException $e ) {
    echo "Napaka pri tabeli: " . $e->getMessage();
  }
?>
Uredi podatke igralca/igrallke
<form method="POST">
  <input type="hidden" name="zeton" id="zeton" value="">
  <input type="hidden" name="id" id="id" value="<?= $en['id']; ?>">
  ime: <input type="text" name="ime" id="ime" value="<?= $en['ime']; ?>" required><br>
  priimek: <input type="text" name="priimek" id="priimek" value="<?= $en['priimek']; ?>" required><br>
  kraj: <input type="text" name="kraj" id="kraj" value="<?= $en['kraj']; ?>" required><br>
  zanri: <input type="text" name="zanri" id="zanri" value="<?= $en['zanri']; ?>" required><br>
  ocena: <input type="number" name="ocena" id="ocena" min="0" max="10" value="<?= $en['ocena']; ?>"><br>
  filmi: <input type="text" name="filmi" id="filmi" value="<?= $en['filmi']; ?>" required><br>
  nagrade: <input type="text" name="nagrade" id="nagrade" value="<?= $en['nagrade']; ?>" required><br>
  <br>
  <br>
  <input type="submit" value="Posodobi">
</form>
