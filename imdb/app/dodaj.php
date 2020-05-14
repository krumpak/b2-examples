<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :
    $valid        = true;
    $validMessage = array();

    if ( ! isset( $_POST['kraj'] ) || ! preg_match( '/^\d+$/', $_POST['kraj'] ) ) {
      $valid = false;
      array_push( $validMessage, 'kraj' );
    }

    if ( ! isset( $_POST['ocena'] ) || ! preg_match( '/^\d+$/', $_POST['ocena'] ) ) {
      $valid = false;
      array_push( $validMessage, 'ocena' );
    }

    if ( $valid ) :

      $insert = $conn->prepare( "INSERT INTO udelezenec02.imdb_osebe (ime, priimek, kraj_id, zanri, ocena, filmi, nagrade) VALUES (:ime, :priimek, :kraj, :zanri, :ocena, :filmi, :nagrade);" );
      $insert->execute( array(
        ':ime'     => $_POST['ime'],
        ':priimek' => $_POST['priimek'],
        ':kraj'    => intval( $_POST['kraj'] ),
        ':zanri'   => $_POST['zanri'],
        ':ocena'   => intval( $_POST['ocena'] ),
        ':filmi'   => $_POST['filmi'],
        ':nagrade' => $_POST['nagrade']
      ) );

      $_SESSION['message'] = array(
        'text' => 'Uspešno vnešeni podatki',
        'type' => 'success'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/app/seznam' );

    else :

      $_SESSION['message'] = array(
        'text' => 'Napačni podatki: (' . join( ', ', $validMessage ) . ')',
        'type' => 'error'
      );

    endif;

  endif;

  $kraji = $conn->query( "SELECT * FROM udelezenec02.imdb_kraji ORDER BY kraj ASC" )->fetchAll();

?>

<h2>Vnos nove osebe</h2>

<form method="POST">
  <input type="hidden" name="zeton" id="zeton" value="">

  <div class="form-group row">
    <label for="ime" class="col-sm-2 col-form-label">Ime:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="ime" id="ime" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="priimek" class="col-sm-2 col-form-label">Priimek:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="priimek" id="priimek" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="kraj" class="col-sm-2 col-form-label">Kraj:</label>
    <div class="col-sm-10">
      <select class="form-control" name="kraj" id="kraj">
        <option value="" selected disabled required>--- izberi kraj ---</option>
        <?php foreach ( $kraji as $kraj ) : ?>
          <option value="<?= $kraj['kraj_id']; ?>"><?= $kraj['kraj']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="zanri" class="col-sm-2 col-form-label">Žanri:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="zanri" id="zanri" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="priimek" class="col-sm-2 col-form-label">Ocena:</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="ocena" id="ocena" min="0" max="10">
    </div>
  </div>

  <div class="form-group row">
    <label for="filmi" class="col-sm-2 col-form-label">Filmi:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="filmi" id="filmi" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="nagrade" class="col-sm-2 col-form-label">Nagrade:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="nagrade" id="nagrade" required>
    </div>
  </div>
  <br>
  <input class="btn btn-primary btn-block btn-lg" type="submit" value="Dodaj">
</form>

