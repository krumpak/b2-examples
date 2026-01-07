<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Kontakt .::. ' . $naslov;
$aktivnost = 'kontakt';


ob_start(); ?>

<form action="">
  <label for="email">Email</label>
  <input type="email" name="email">
  <br>
  <label for="sporocilo">Naslov</label>
  <textarea name="sporocilo"></textarea>
  <br>
  <input type="submit" value="Pošlji">
  <br>
</form>

<?php $html = ob_get_clean();
