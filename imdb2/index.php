<?php
  define( 'varovalka', true );

  if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
  }

  $clearMessage = false;

  include_once "shared.php";

  $host     = getVar( 'HOST' );
  $db       = getVar( 'DB' );
  $username = getVar( 'USERNAME' );
  $password = getVar( 'PASSWORD' );

  try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $username, $password, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ) );
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex, follow">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Seznam filmskih igralcev</title>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
      <?php if ( !validacija() ) : ?>
        <a class="navbar-brand" href="<?= getvar( 'APP_URL' ) ?>/">Domov</a>
      <?php endif; ?>
      <?php if ( validacija() ) : ?>
        <a class="navbar-brand" href="<?= getvar( 'APP_URL' ) ?>/seznam">Seznam</a>
        <a class="navbar-brand" href="<?= getvar( 'APP_URL' ) ?>/dodaj">Dodaj novo</a>
        <a class="navbar-brand" href="<?= getvar( 'APP_URL' ) ?>/smetnjak">Smetnjak</a>
        <a class="navbar-brand" href="<?= getvar( 'APP_URL' ) ?>/odjava">Odjava</a>
      <?php endif; ?>
    </nav>

  <?php

    if ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'oseba' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

      include_once 'podrobno.php';

      $clearMessage = true;

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'uredi' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

      include_once 'uredi.php';

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'izbrisi' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

      include_once 'izbrisi.php';

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'povrni' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

      include_once 'povrni.php';

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'unici' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

      include_once 'unici.php';

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'seznam' ) :

      include_once 'seznam.php';

      $clearMessage = true;

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'dodaj' ) :

      include_once 'dodaj.php';

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'smetnjak' ) :

      include_once 'smetnjak.php';

    elseif ( validacija() && isset( $_GET['task'] ) && $_GET['task'] === 'odjava' ) :

      include_once 'odjava.php';

    elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'registracija' ) :

      include_once 'registracija.php';

    else :

      include_once 'prijava.php';

    endif; ?>

    <?php if ( isset( $_SESSION['message'] ) ) : ?>
      <style>
        .alert {
          position:       fixed;
          top:            0;
          left:           0;
          right:          0;
          text-align:     center;
          pointer-events: none;
        }
        .alert span {
          margin:           0 auto;
          display:          inline-block;
          padding:          1em 2em;
          background-color: white;
          box-shadow:       1px 1px 3px 2px rgba(0, 0, 0, .3);
        }
        .alert.success { color: green; }
        .alert.error { color: red; }
      </style>
      <div class="alert <?= $_SESSION['message']['type'] ?>">
        <span>
          <?= $_SESSION['message']['text'] ?>
        </span>
      </div>
      <script>
        setTimeout(function () {
          $('.alert').hide()
        }, 5000)
      </script>
      <?php

      if ( $clearMessage ) {
        unset( $_SESSION['message'] );
      }
    endif; ?>

  </div>
</body>
</html>

<?php
  $conn = null;
?>
