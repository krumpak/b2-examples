<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    if ( $_POST['geslo'] !== $_POST['geslo2'] ) {
      $_SESSION['message'] = array(
        'text' => 'Gesli se ne ujemata',
        'type' => 'error'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/registracija' );
      die();
    }

    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb2_uporabniki WHERE email = :email LIMIT 1" );
    $sql->execute( array( ':email' => $_POST['email'] ) );
    $obstaja = $sql->fetch();

    if ( !empty( $obstaja ) ) {
      $_SESSION['message'] = array(
        'text' => 'Uporabnik že obstaja',
        'type' => 'error'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/' );
      die();
    }

    try {

      $insert = $conn->prepare( "INSERT INTO udelezenec02.imdb2_uporabniki (uporabnik, email, geslo, status) VALUES (:uporabnik, :email, :geslo, :status);" );
      $insert->execute( array(
        ':uporabnik' => $_POST['uporabnik'],
        ':email'     => $_POST['email'],
        ':geslo'     => zaciniGeslo($_POST['geslo']),
        ':status'    => 1
      ) );

      $_SESSION['message'] = array(
        'text' => 'Uporabnik Uspešno vnešen',
        'type' => 'success'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/' );

    } catch ( PDOException $e ) {
      $_SESSION['message'] = array(
        'text' => $e->getMessage(),
        'type' => 'error'
      );
    }

  endif;
?>
<H1>Registracija</H1>
<form method="POST">
  <div class="form-group row">
    <label for="uporabnik" class="col-sm-2 col-form-label">Uporabnik:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="uporabnik" id="uporabnik" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input class="form-control" type="email" name="email" id="email" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="geslo" class="col-sm-2 col-form-label">Geslo:</label>
    <div class="col-sm-10">
      <input class="form-control" type="password" name="geslo" id="geslo" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="geslo2" class="col-sm-2 col-form-label">Ponovi geslo:</label>
    <div class="col-sm-10">
      <input class="form-control" type="password" name="geslo2" id="geslo2" required>
    </div>
  </div>
  <br>
  <a href="<?= getvar( 'APP_URL' ) ?>/prijava" class="btn btn-link">Prijava</a>
  <input class="btn btn-primary btn-block btn-lg" type="submit">
</form>