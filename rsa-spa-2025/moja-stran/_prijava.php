<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Prijava .::. ' . $naslov;
$aktivnost = 'prijava';

if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($email !== '' && strpos($email, '@') === false) {
    $_SESSION['obvestilo'] = '<span class="error">Neustrezen email.</span>';
    header('Location: ./prijava');
    exit();
  }
    
  $sql = $conn->prepare('SELECT * FROM uporabniki WHERE email = :email AND aktivnost = 1 LIMIT 1');
  $sql->execute( [
    ':email' => $email
  ] );
  $najdeni_uporabnik = $sql->fetch() ?: NULL;
  $conn = NULL;

  if ($email !== '' && $password !== '' && $najdeni_uporabnik === NULL) {
    $_SESSION['obvestilo'] = '<span class="error">Uporabnik ne obstaja.</span>';
    header('Location: ./prijava');
    exit();
  }

  if ($najdeni_uporabnik && password_verify($password, $najdeni_uporabnik['geslo'])) {
    $_SESSION['email'] = $email;
    $_SESSION['ime'] = $najdeni_uporabnik['ime'];
    $_SESSION['auth'] = true;
    
    $_SESSION['obvestilo'] = '<span class="success">Prijava uspešna.</span>';
    header('Location: ./clanki');
    exit();
  } else {
    $_SESSION['obvestilo'] = '<span class="error">Napačen email ali geslo.</span>';
    header('Location: ./prijava');
    exit();
  }

}

ob_start(); ?>

<h2>Prijavni obrazec</h2>
<form action="./prijava" method="POST">
  <div class="vrstica">
    <label for="email">Email</label>
    <input type="email" name="email">
  </div>
  <div class="vrstica">
    <label for="password">Geslo</label>
    <input type="password" name="password">
  </div>
  <input type="submit" value="Prijava">
</form>
<a class="gumb" href="./registracija">Registracija</a>

<?php $html = ob_get_clean();
