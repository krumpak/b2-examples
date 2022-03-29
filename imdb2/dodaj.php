<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    $insert = $conn->prepare( "INSERT INTO udelezenec02.imdb2_osebe (ime, priimek) VALUES (:ime, :priimek);" );
    $insert->execute( array(
      ':ime'     => $_POST['ime'],
      ':priimek' => $_POST['priimek']
    ) );

    $_SESSION['message'] = array(
      'text' => 'Uspešno vnešeni podatki',
      'type' => 'success'
    );

    header( 'Location: ' . getvar( 'APP_URL' ) . '/seznam' );

  endif;

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
  <br>
  <input class="btn btn-primary btn-block btn-lg" type="submit" value="Dodaj">
</form>