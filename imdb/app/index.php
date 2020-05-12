<?php
  define( 'varovalka', true );

  if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
  }

  $clearMessage = false;

  include_once './shared.php';

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
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seznam filmskih igralcev</title>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
<a href="<?= getvar( 'APP_URL' ); ?>/app/">Seznam</a>
|
<a href="<?= getvar( 'APP_URL' ); ?>/app/bin">Smetnjak</a>
|
<a href="<?= getvar( 'APP_URL' ); ?>/app/add">Dodaj novega igralca/igralko</a>
<hr>
<br>
<?php
  if ( isset( $_GET['task'] ) && $_GET['task'] === 'view' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

    include_once 'podrobno.php';

    $clearMessage = true;

  elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'edit' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

    include_once 'uredi.php';

  elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'delete' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

    include_once 'izbrisi.php';

  elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'revert' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

    include_once 'povrni.php';

  elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'destroy' && isset( $_GET['id'] ) && preg_match( '/^\d+$/', $_GET['id'] ) ) :

    include_once 'unici.php';

  elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'add' ) :

    include_once 'dodaj.php';

    $clearMessage = true;

  elseif ( isset( $_GET['task'] ) && $_GET['task'] === 'bin' ) :

    include_once 'smetnjak.php';

    $clearMessage = true;

  else :

    include_once 'seznam.php';

    $clearMessage = true;

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
endif;
?>

</body>
</html>

<?php
  $conn = null;
?>
