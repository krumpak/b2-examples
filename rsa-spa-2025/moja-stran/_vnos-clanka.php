<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $naslov = $_POST['naslov'];
  $datum = $_POST['datum'];
  $slika = $_POST['slika'];
  $clanek = $_POST['clanek'];
  $celina_id = $_POST['celina_id'];

  if ($naslov === '' || $datum === '' || $slika === '' || $clanek === '') {
    $_SESSION['form'] = $_POST;

    $_SESSION['obvestilo'] = '<span class="error">Prazna polja niso dovoljena.</span>';
    header('Location: ./nov-clanek');
    exit();
  }

  $sql = $conn->prepare('INSERT INTO clanki (naslov, datum, slika, clanek, celina_id) VALUES (:naslov, :datum, :slika, :clanek, :celina_id)');
  $success = $sql->execute( [
    ':naslov' => $naslov,
    ':datum' => $datum,
    ':slika' => $slika,
    ':clanek' => $clanek,
    ':celina_id' => $celina_id,
  ] );
  $conn = NULL;

  if ($success && $sql->rowCount() === 1) {
    $_SESSION['obvestilo'] = '<span class="success">Članek uspešno vnešen.</span>';
  } else {
    $_SESSION['obvestilo'] = '<span class="error">Vnos članka je neuspel.</span>';
  }
  header('Location: ./clanki');
  exit();
}

$_SESSION['obvestilo'] = '<span class="error">Ni podatkov za vnos.</span>';
header('Location: ./clanki');
exit();
