<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$uporabniki = [
  [ 'email' => 'test@test.si',    'geslo' => password_hash('test', PASSWORD_DEFAULT), 'ime' => 'Admin' ],
  [ 'email' => 'miha@test.si',    'geslo' => password_hash('test', PASSWORD_DEFAULT), 'ime' => 'Miha' ],
  [ 'email' => 'marjeta@test.si', 'geslo' => password_hash('test', PASSWORD_DEFAULT), 'ime' => 'Marjeta' ],
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
    if ($uporabnik['email'] === $email) {
      $najdeni_uporabnik = $uporabnik;
    }
  }

  if ($najdeni_uporabnik && password_verify($password, $najdeni_uporabnik['geslo'])) {
    $_SESSION['email'] = $email;
    $_SESSION['ime'] = $najdeni_uporabnik['ime'];
    $_SESSION['auth'] = true;
    
    header('Location: ./clanki');
    exit();
  }

}


ob_start(); ?>

<div><?php echo $opozorilo; ?></div>
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

<?php $html = ob_get_clean();
