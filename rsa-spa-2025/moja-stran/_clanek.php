<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$id = $_GET['id'];

$clanek = null;

foreach ( $vsebina as $vrstica ) {
  if ( $vrstica['id'] == $id ) {
    $clanek = $vrstica;
    break;
  }
}

if ($clanek === null) {
  header('Location: ../clanki');
  exit();
}

$title = $clanek['naslov'] . ' .::. ' . $naslov;

$aktivnost = 'clanki';

ob_start();

?>

<figure>
    <img src="./slike/<?php echo $clanek['slika']; ?>" alt="<?php echo $clanek['naslov']; ?>">
    <figcaption><?php echo $clanek['naslov']; ?></figcaption>
</figure>
<section>
    <h2><?php echo $clanek['naslov']; ?></h2>
    <time datetime="2025-12-03"><?php echo $clanek['datum']; ?></time>
    <p><?php echo $clanek['clanek']; ?></p>
    <a href="./clanki">Nazaj</a>
</section>

<?php $html = ob_get_clean();