<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    try {
      $update = $conn->prepare( "UPDATE udelezenec02.imdb2_osebe SET ime=:ime, priimek=:priimek, updated_at=now() WHERE id = :id AND status = 1" );
      $update->execute( array(
        ":id"      => intval( $_POST['id'] ),
        ":ime"     => $_POST['ime'],
        ":priimek" => $_POST['priimek']
      ) );

      $_SESSION['message'] = array(
        'text' => 'Uspešno posodobljeni podatki',
        'type' => 'success'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/oseba/' . intval( $_POST['id'] ) );
    } catch ( PDOException $e ) {
      $_SESSION['message'] = array(
        'text' => $e->getMessage(),
        'type' => 'error'
      );
    }

  endif;

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb2_osebe WHERE id = :id AND status = 1 LIMIT 1" );
    $sql->execute( array( ':id' => intval( $_GET['id'] ) ) );
    $en = $sql->fetch();

    if ( empty( $en ) ) {
      $_SESSION['message'] = array(
        'text' => 'Ni podatkov',
        'type' => 'error'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/seznam' );
    }
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }
?>

<form method="POST">
  <input type="hidden" name="zeton" id="zeton" value="">
  <input type="hidden" name="id" id="id" value="<?= $en['id']; ?>">

  <div class="form-group row">
    <label for="ime" class="col-sm-2 col-form-label">Ime:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="ime" id="ime" value="<?= $en['ime']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="priimek" class="col-sm-2 col-form-label">Priimek:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="priimek" id="priimek" value="<?= $en['priimek']; ?>" required>
    </div>
  </div>
  <br>
  <input class="btn btn-primary btn-block btn-lg" type="submit" value="Posodobi">
</form>