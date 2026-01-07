<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Članki .::. ' . $naslov;

$aktivnost = 'clanki';

ob_start();

if ( count($vsebina) === 0 ) :

  echo "ni člankov";

else : 

  foreach ( $vsebina as $clanek ) : ?>

    <article>
        <figure>
            <img src="./slike/<?php echo $clanek['slika']; ?>" alt="<?php echo $clanek['naslov']; ?>">
            <figcaption><?php echo $clanek['naslov']; ?></figcaption>
        </figure>
        <section>
            <h2><?php echo $clanek['naslov']; ?></h2>
            <time datetime="2025-12-03"><?php echo $clanek['datum']; ?></time>
            <p><?php echo $clanek['clanek']; ?></p>
            <a href="./clanek/<?php echo $clanek['id']; ?>">Preberi več</a>
        </section>
    </article>

  <?php endforeach;

endif;

$html = ob_get_clean();
