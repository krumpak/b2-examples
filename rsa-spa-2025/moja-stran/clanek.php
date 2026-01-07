<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$clanek = null;

foreach ( $vsebina as $vrstica ) {
  if ( $vrstica['id'] == $id ) {
    $clanek = $vrstica;
    break;
  }
} 

?>

<figure>
    <img src="./slike/<?php echo $clanek['slika']; ?>" alt="<?php echo $clanek['naslov']; ?>">
    <figcaption><?php echo $clanek['naslov']; ?></figcaption>
</figure>
<section>
    <h2><?php echo $clanek['naslov']; ?></h2>
    <time datetime="2025-12-03"><?php echo $clanek['datum']; ?></time>
    <p><?php echo $clanek['clanek']; ?></p>
    <a href="./">Nazaj</a>
</section>