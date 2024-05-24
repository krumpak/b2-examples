<?php

  if ( ! defined('varovalka') ) {
    header('Location: index.php');
    die('Stran ni dosegljiva direktno.');
  }

  if (isset($_POST) && !empty($_POST)) {
    $uporabnik = [
      'email' => 'test@test.com',
      'geslo' => '12345678',
      'ime' => 'Miha Test',
    ];

    if ($_POST['email'] == $uporabnik['email'] && $_POST['geslo'] == $uporabnik['geslo']) {
      $_SESSION['uporabnik'] = $uporabnik;
      header('Location: index.php');
    } else {
      $_SESSION['sporocilo'] = 'Napačni podatki';
    }
  }

?>
<h1><?php echo $title; ?></h1>

<form action="./prijava" method="post">
  <label for="email">Email: </label><input type="email" name="email" id="email" placeholder="Email"><br>
  <label for="email">Geslo: </label><input type="password" name="geslo" id="geslo" placeholder="Geslo"><br>
  <input type="submit" value="Prijava">
</form>
<a href="./pozabljeno-geslo">Pozabljeno geslo</a>