<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $naslov = $_POST['naslov'];
  $datum = $_POST['datum'];
  $slika = $_POST['slika'];
  $clanek = $_POST['clanek'];
  $celina_id = $_POST['celina_id'];

  if ($id === '' || $naslov === '' || $datum === '' || $slika === '' || $celina_id === '' || $clanek === '') {
    $_SESSION['form'] = $_POST;

    $_SESSION['obvestilo'] = '<span class="error">Prazna polja niso dovoljena.</span>';
    header('Location: ./uredi-clanek/'.$id);
    exit();
  }

  $sql = $conn->prepare('UPDATE clanki SET naslov = :naslov, datum = :datum, slika = :slika, celina_id = :celina_id, clanek = :clanek WHERE id = :id LIMIT 1');
  $success = $sql->execute( [
    ':id' => $id,
    ':naslov' => $naslov,
    ':datum' => $datum,
    ':slika' => $slika,
    ':clanek' => $clanek,
    ':celina_id' => $celina_id
  ] );
  $conn = NULL;

  if ($success && $sql->rowCount() === 1) {
    $_SESSION['obvestilo'] = '<span class="success">Članek uspešno posodobljen.</span>';

    header('Location: ./clanek/'.$id);
    exit();
  } else {
    $_SESSION['obvestilo'] = '<span class="error">Posodobitev članka ni uspela.</span>';
    
    header('Location: ./uredi-clanek/'.$id);
    exit();
  }

}

$_SESSION['obvestilo'] = '<span class="error">Ni članka za posodobitev.</span>';
header('Location: ./clanki');
exit();
