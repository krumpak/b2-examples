<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :
    $insert = $conn->prepare( "INSERT INTO udelezenec02.imdb_osebe (ime, priimek, kraj, zanri, ocena, filmi, nagrade) VALUES (:ime, :priimek, :kraj, :zanri, :ocena, :filmi, :nagrade);" );

    $insert->execute( array(
      ':ime'     => $_POST['ime'],
      ':priimek' => $_POST['priimek'],
      ':kraj'    => $_POST['kraj'],
      ':zanri'   => $_POST['zanri'],
      ':ocena'   => intval( $_POST['ocena'] ),
      ':filmi'   => $_POST['filmi'],
      ':nagrade' => $_POST['nagrade']
    ) );

    $_SESSION['message'] = array(
      'text' => 'Uspešno vnešeni podatki',
      'type' => 'success'
    );

  endif; ?>

obrazec za vnos nove osebe
<form method="POST">
  <input type="hidden" name="zeton" id="zeton" value="">
  ime: <input type="text" name="ime" id="ime" required><br>
  priimek: <input type="text" name="priimek" id="priimek" required><br>
  kraj: <input type="text" name="kraj" id="kraj" required><br>
  zanri: <input type="text" name="zanri" id="zanri" required><br>
  ocena: <input type="number" name="ocena" id="ocena" min="0" max="10"><br>
  filmi: <input type="text" name="filmi" id="filmi" required><br>
  nagrade: <input type="text" name="nagrade" id="nagrade" required><br>
  <br>
  <br>
  <input type="submit" value="Dodaj">
</form>

