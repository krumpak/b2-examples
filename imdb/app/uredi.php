<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    try {
      $update = $conn->prepare( "UPDATE udelezenec02.imdb SET ime=:ime, priimek=:priimek, kraj=:kraj, zanri=:zanri, ocena=:ocena, filmi=:filmi, nagrade=:nagrade, updated_at=now() WHERE id = :id AND status = 1" );
      $update->execute( array(
        ":id"      => intval( $_POST['id'] ),
        ":ime"     => $_POST['ime'],
        ":priimek" => $_POST['priimek'],
        ":kraj"    => $_POST['kraj'],
        ":zanri"   => $_POST['zanri'],
        ":ocena"   => intval( $_POST['ocena'] ),
        ":filmi"   => $_POST['filmi'],
        ":nagrade" => $_POST['nagrade']
      ) );
    } catch ( PDOException $e ) {
      echo "Napaka pri tabeli: " . $e->getMessage();
    }

  endif;

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb WHERE id = :id AND status = 1 LIMIT 1" );
    $sql->execute( array( ':id' => intval( $_GET['id'] ) ) );
    $en = $sql->fetch();

    if ( empty( $en ) ) {
      header( 'Location: ' . getvar( 'APP_URL' ) . '/app/' );
    }
  } catch ( PDOException $e ) {
    echo "Napaka pri tabeli: " . $e->getMessage();
  }
?>
Uredi podatke igralca/igrallke
|
<a href="<?= getvar( 'APP_URL' ); ?>/app/?task=view&id=<?= intval( $_GET['id'] ); ?>">&#8689;</a>
|
<button id="izbrisi">&#128465;</button>
<a id="izbrisi-ok" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/?task=delete&id=<?= intval( $_GET['id'] ); ?>">&#10004;</a>
<button id="izbrisi-cancel" style="display: none;">&#10006;</button>
<script>
  $(function () {
    $('#izbrisi').click(function () {
      $('#izbrisi').hide();
      $('#izbrisi-ok').show();
      $('#izbrisi-cancel').show();
    })
    $('#izbrisi-cancel').click(function () {
      $('#izbrisi').show();
      $('#izbrisi-ok').hide();
      $('#izbrisi-cancel').hide();
    })
  })
</script>

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
