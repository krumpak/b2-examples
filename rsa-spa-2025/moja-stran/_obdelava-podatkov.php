<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$email = $_POST['email'];
$sporocilo = $_POST['sporocilo'];

if (strpos($email, '@') === false) {
  header('Location: ./kontakt');
  exit();
}

$title = 'Obdelava podatkov .::. ' . $naslov;

$aktivnost = 'obdelava-podatkov';

ob_start(); ?>

Obrazec uspšeno poslan.

Na naslov "<?php echo $email; ?>" vas bomo konktaktirali v zvezi z vašim vprašanjem:
<br>
<div style="border: 1px solid grey;"><?php echo $sporocilo; ?></div>

<?php $html = ob_get_clean();
