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

      header( 'Location: ' . getvar( 'APP_URL' ) . '/app/' );

    else :

      $_SESSION['message'] = array(
        'text' => 'Napačni podatki: (' . join( ', ', $validMessage ) . ')',
        'type' => 'error'
      );

    endif;

  endif;

  $kraji = $conn->query( "SELECT * FROM udelezenec02.imdb_kraji ORDER BY kraj ASC" )->fetchAll();

?>

obrazec za vnos nove osebe
<form method="POST">
  <input type="hidden" name="zeton" id="zeton" value="">
  ime: <input type="text" name="ime" id="ime" required><br>
  priimek: <input type="text" name="priimek" id="priimek" required><br>
  kraj: <select name="kraj" id="kraj">
    <option value="" selected disabled required>--- izberi kraj ---</option>
    <?php foreach ( $kraji as $kraj ) : ?>
      <option value="<?= $kraj['kraj_id']; ?>"><?= $kraj['kraj']; ?></option>
    <?php endforeach; ?>
  </select><br>
  zanri: <input type="text" name="zanri" id="zanri" required><br>
  ocena: <input type="number" name="ocena" id="ocena" min="0" max="10"><br>
  filmi: <input type="text" name="filmi" id="filmi" required><br>
  nagrade: <input type="text" name="nagrade" id="nagrade" required><br>
  <br>
  <input type="submit" value="Dodaj">
</form>

