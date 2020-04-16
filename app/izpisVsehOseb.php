<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  $rawData = file_get_contents( 'http://students.b2.eu/api/osebe' );

  $vseOsebe = json_decode( $rawData, true );
?>
<h1>Seznam zaposlenih</h1>
<table>
  <?php foreach ( $vseOsebe as $i => $oseba ) : ?>
    <tr>
      <td><?= $i + 1; ?></td>
      <td><?= $oseba['ime']; ?></td>
      <td><?= $oseba['priimek']; ?></td>
      <td><a href="<?= getUserURL($oseba['id']); ?>">odpri več</a></td>
    </tr>
  <?php endforeach; ?>
</table>
