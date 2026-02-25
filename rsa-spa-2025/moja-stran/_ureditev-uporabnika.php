<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_POST['aktivnost'] = ($_POST['aktivnost'] ?? '') === 'on' ? 1 : 0;

  $id = $_POST['id'];
  $ime = trim($_POST['ime']);
  $email = trim($_POST['email']);
  $vloga = $_POST['vloga'];
  $aktivnost = $_POST['aktivnost'];
  $datum = $_POST['datum'];

  $password = $_POST['password'] ?? '';
  $password_2 = $_POST['password_2'] ?? '';

  if ($id === '' || $ime === '' || $email === '' || $vloga === '' || $aktivnost === '' || $datum === '') {
    $_SESSION['form'] = $_POST;

    $_SESSION['obvestilo'] = '<span class="error">Prazna polja niso dovoljena.</span>';
    header('Location: ./uredi-uporabnika/'.$id);
    exit();
  }

  if ($password !== '' && $password !== $password_2) {
    $_SESSION['obvestilo'] = '<span class="error">Gesli se ne ujemata.</span>';
    header('Location: ./registracija');
    exit();
  }

  $parametri = [
    ':id' => $id,
    ':ime' => $ime,
    ':email' => $email,
    ':vloga' => $vloga,
    ':aktivnost' => $aktivnost,
    ':timestamp' => date('Y-m-d H:i:s'),
  ];

  $sql_string = 'UPDATE uporabniki 
    SET ime = :ime,
        email = :email,
        vloga = :vloga,
        aktivnost = :aktivnost,
        timestamp = :timestamp';

  if ($password !== '') {
    $sql_string .= ', geslo = :geslo';
    $parametri[':geslo'] = password_hash($password, PASSWORD_DEFAULT);
  }

  $sql_string .= ' WHERE id = :id LIMIT 1';

  $sql = $conn->prepare($sql_string);
  $success = $sql->execute( $parametri );
  $conn = NULL;

  if ($success && $sql->rowCount() === 1) {
    $_SESSION['obvestilo'] = '<span class="success">Uporabnik uspešno posodobljen.</span>';

    header('Location: ./uporabniki');
    exit();
  } else {
    $_SESSION['obvestilo'] = '<span class="error">Posodobitev uporabnika ni uspela.</span>';

    header('Location: ./uredi-uporabnika/'.$id);
    exit();
  }
}

$_SESSION['obvestilo'] = '<span class="error">Ni članka za posodobitev.</span>';
header('Location: ./clanki');
exit();
