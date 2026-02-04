<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Nov članek .::. ' . $naslov;

$aktivnost = 'clanki';

ob_start();

$form = $_SESSION['form'];
$_SESSION['form'] = NULL;

$naslov = $form['naslov'] ?? '';
$datum = $form['datum'] ?? '';
$slika = $form['slika'] ?? '';
$clanek = $form['clanek'] ?? '';

 ?>

<form action="./vnos-clanka" method="POST">
  <div class="vrstica">
    <label for="naslov">Naslov:</label>
    <input type="text" name="naslov" value="<?php echo $naslov; ?>">
  </div>
  <div class="vrstica">
  <label for="datum">Datum:</label>
  <input type="date" name="datum" value="<?php echo $datum; ?>">
  </div>
  <div class="vrstica">
  <label for="slika">Slika:</label>
  <input type="text" name="slika" value="<?php echo $slika; ?>">
  </div>
  <div class="vrstica">
  <label for="clanek">Članek:</label>
  <textarea name="clanek"><?php echo $clanek; ?></textarea>
  </div>
  <input type="submit" value="Pošlji">

</form>


<?php

$html = ob_get_clean();
