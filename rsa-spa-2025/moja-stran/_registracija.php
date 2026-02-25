<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Registracija .::. ' . $naslov;
$aktivnost = 'prijava';

if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $ime = $_POST['ime'] ?? '';
  $vloga = $_POST['vloga'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $password_2 = $_POST['password_2'] ?? '';

  if ($email !== '' && strpos($email, '@') === false) {
    $_SESSION['obvestilo'] = '<span class="error">Neustrezen email.</span>';
    header('Location: ./registracija');
    exit();
  }

  $unikaten = $conn->prepare('SELECT * FROM uporabniki WHERE email = :email LIMIT 1');
  $unikaten->execute( [
    ':email' => $email
  ] );
  $unikatni_uporabnik = $unikaten->fetch() ?: NULL;
  $conn = NULL;

  if ($unikatni_uporabnik !== NULL) {
    $_SESSION['obvestilo'] = '<span class="error">Uporabnik/email že obstaja.</span>';
    header('Location: ./registracija');
    exit();
  }

  if ($password !== $password_2) {
    $_SESSION['obvestilo'] = '<span class="error">Gesli se ne ujemata.</span>';
    header('Location: ./registracija');
    exit();
  }

  if (strlen($password) < 12 || strlen($password) > 255) {
    $_SESSION['obvestilo'] = '<span class="error">Gesli mora biti dolgo med 12 in 255 znakov.</span>';
    header('Location: ./registracija');
    exit();
  }
  
  $sql = $conn->prepare('INSERT INTO uporabniki (email, geslo, ime, vloga, aktivnost) VALUES (:email, :geslo, :ime, :vloga, :aktivnost)');
  $success = $sql->execute( [
    ':email' => $email,
    ':geslo' => password_hash($password, PASSWORD_DEFAULT),
    ':ime' => $ime,
    ':vloga' => $vloga,
    ':aktivnost' => 0,
  ] );
  $conn = NULL;

  if ($success && $sql->rowCount() === 1) {
    $_SESSION['obvestilo'] = '<span class="success">Uporabnik uspešno vnešen.</span>';
    header('Location: ./prijava');
    exit();
  } else {
    $_SESSION['obvestilo'] = '<span class="error">Vnos uporabnika je neuspel.</span>';
  }
}

ob_start(); ?>

<h2>Registracija</h2>
<form action="./registracija" method="POST">
  <div class="vrstica">
    <label for="ime">Ime</label>
    <input type="text" name="ime">
  </div>
  <div class="vrstica">
    <label for="email">Email</label>
    <input type="email" name="email">
  </div>
  <div class="vrstica">
    <label for="password">Geslo</label>
    <input type="password" name="password" minlength="12" maxlength="255">
  </div>
  <div class="vrstica">
    <label for="password_2">Ponovitev gesla</label>
    <input type="password" name="password_2">
  </div>
  <div class="vrstica">
    <label for="vloga">Vloga</label>
    <select name="vloga">
      <option value="gost" selected>Gost</option>
      <option value="clan">Član</option>
      <option value="urednik">urednik</option>
      <option value="administrator">Administrator</option>
    </select>
  </div>
  <input type="submit" value="Registracija">
</form>
<a class="gumb" href="./prijava">Nazaj na prijava</a>

<?php $html = ob_get_clean();
