<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$uporabniki = [
  [ 'email' => 'test@test.si', 'password' => 'test', 'ime' => 'Admin' ],
  [ 'email' => 'miha@test.si', 'password' => 'test', 'ime' => 'Miha' ],
  [ 'email' => 'marjeta@test.si', 'password' => 'test', 'ime' => 'Marjeta' ],
];

$title = 'Prijava .::. ' . $naslov;
$aktivnost = 'prijava';

$opozorilo = '';

if (isset($_POST)) {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $najdeni_uporabnik = NULL;

  if ($email !== '' && strpos($email, '@') === false) {
    $opozorilo = 'Email neustrezen';
  }

  foreach ( $uporabniki as $uporabnik ) {
    if ($uporabnik['email'] === $email && $uporabnik['password'] === $password) {
      $najdeni_uporabnik = $uporabnik;
    }
  }

  if ($najdeni_uporabnik) {
    $_SESSION['email'] = $email;
    $_SESSION['ime'] = $najdeni_uporabnik['ime'];
    $_SESSION['auth'] = true;
    
    header('Location: ./clanki');
    exit();
  }

}


ob_start(); ?>

<div><?php echo $opozorilo; ?></div>
<br>
<form action="./prijava" method="POST">
  <label for="email">Email</label>
  <input type="email" name="email">
  <br>
  <label for="password">Geslo</label>
  <input type="password" name="password">
  <br>
  <input type="submit" value="Prijava">
  <br>
</form>

<?php $html = ob_get_clean();
