<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$sql = $conn->prepare('SELECT * FROM clanki');
$sql->execute();
$vsebina = $sql->fetchAll();
$conn = NULL;

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
            <figcaption>
              <?php echo $clanek['naslov']; ?>
            </figcaption>
        </figure>
        <section>
            <h2>
              <?php echo $clanek['naslov']; ?>
            </h2>
            <time datetime="<?php echo $clanek['datum']; ?>">
              <?php echo YMD_to_DMY($clanek['datum']); ?>
            </time>
            <p>
              <?php echo $clanek['clanek']; ?>
            </p>
            <a href="./clanek/<?php echo $clanek['id']; ?>">
              Preberi več
            </a>
        </section>
    </article>

  <?php endforeach;

endif;

if (($_SESSION['auth'] ?? false) === true) : ?>
    <article>
        <section>
            <h2>
              +
            </h2>
            <a href="./nov-clanek">
              Dodaj članek
            </a>
        </section>
    </article>

<?php endif;

$html = ob_get_clean();
