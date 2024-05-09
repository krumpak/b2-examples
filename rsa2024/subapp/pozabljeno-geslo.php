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

    if ($_POST['email'] == $uporabnik['email']) {
      $_SESSION['sporocilo'] = 'Geslo je bilo poslano na vaš email.';
    } else {
      $_SESSION['sporocilo'] = 'Napačni podatki';
    }
  }

?>
<h1><?php echo $title; ?></h1>

<form action="./pozabljeno-geslo" method="post">
  <label for="email">Email: </label><input type="email" name="email" id="email" placeholder="Email"><br>
  <input type="submit" value="Pošlji">
</form>