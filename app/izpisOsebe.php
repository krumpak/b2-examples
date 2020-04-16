<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  $id = $_GET['param'];

  $rawData = file_get_contents( 'http://students.b2.eu/api/osebe/' . $id );

  $enaOseba = json_decode( $rawData, true );

?>
<h1><?= $enaOseba['ime']; ?> <?= $enaOseba['priimek']; ?></h1>
<p><?= $enaOseba['kontakt']['email']['email_naslov']; ?></p>
