<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    $geslo = zaciniGeslo($_POST['geslo']);

    try {
      $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb2_uporabniki WHERE email = :email AND  geslo = :geslo AND status = 1 LIMIT 1" );
      $sql->execute( array(
        ':email' => $_POST['email'],
        ':geslo' => $geslo
      ) );
      $uporabnik = $sql->fetch();

      if ( empty( $uporabnik ) ) {
        unset( $_SESSION['token'] );

        $_SESSION['message'] = array(
          'text' => 'Prijava ni uspela (napačen email/geslo)',
          'type' => 'error'
        );

        header( 'Location: ' . getvar( 'APP_URL' ) . '/' );
      } else {
        $_SESSION['token'] = sha1( date( DATE_RFC2822 ) . $uporabnik['created_at'] );

        $_SESSION['message'] = array(
          'text' => 'Pozdravljen ' . $uporabnik['uporabnik'],
          'type' => 'success'
        );

        header( 'Location: ' . getvar( 'APP_URL' ) . '/seznam' );
      }

    } catch ( PDOException $e ) {
      unset( $_SESSION['token'] );

      $_SESSION['message'] = array(
        'text' => $e->getMessage(),
        'type' => 'error'
      );
    }

  endif;
?>
<H1>Prijava</H1>
<form method="POST">
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
  <a href="<?= getvar( 'APP_URL' ) ?>/registracija" class="btn btn-link">Registracija</a>
  <br>
  <input class="btn btn-primary btn-block btn-lg" type="submit">
</form>