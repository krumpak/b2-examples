<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Literatura .::. ' . $naslov;

$aktivnost = 'literatura';

ob_start(); ?>

<ul>
  <li>Knjiga 1</li>
  <li>Knjiga 2</li>
  <li><a href="https://en.wikipedia.org/wiki/Wikipedia" target="_blank">Wikipedia</a></li>
</ul>

<?php $html = ob_get_clean();
