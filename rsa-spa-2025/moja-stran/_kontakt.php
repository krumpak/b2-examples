<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Kontakt .::. ' . $naslov;
$aktivnost = 'kontakt';

ob_start(); ?>
<h2>Kontaktni obrazec</h2>
<form action="./obdelava-podatkov" method="POST">
  <div class="vrstica">
    <label for="email">Email</label>
    <input type="email" name="email">
  </div>
  <div class="vrstica">
    <label for="sporocilo">Naslov</label>
    <textarea name="sporocilo"></textarea>
  </div>
  <input type="submit" value="Pošlji">
</form>

<?php $html = ob_get_clean();
