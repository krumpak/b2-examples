<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$sql = $conn->prepare('SELECT 
  clanki.*, 
  celine.ime AS celina_ime 
  FROM clanki 
  LEFT JOIN celine ON clanki.celina_id = celine.id 
  WHERE clanki.id = :id LIMIT 1');
$sql->execute( [
  ':id' => $id
] );
$clanek = $sql->fetch() ?: NULL;
$conn = NULL;

if ($clanek === NULL) {
  header('Location: ../clanki');
  exit();
}

$title = $clanek['naslov'] . ' .::. ' . $naslov;

$aktivnost = 'clanki';

ob_start();

?>

<figure class="posamezna-slika">
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
      🗓️ <?php echo YMD_to_DMY($clanek['datum']); ?>
    </time>
    <?php if ($clanek['celina_id'] !== NULL) : ?>
    <p>
      🌍 <?php echo $clanek['celina_ime']; ?>
    </p>
    <?php endif; ?>
    <p>
      <?php echo $clanek['clanek']; ?>
    </p>
    <a href="./clanki">
      Nazaj
    </a>
    <?php if (($_SESSION['auth'] ?? false) === true) : ?>
    <br>
    <br>
    <a href="./uredi-clanek/<?php echo $clanek['id']; ?>" class="gumb">
      Uredi
    </a>
    <a href="./izbrisi-clanek/<?php echo $clanek['id']; ?>" class="gumb">
      Izbriši
    </a>
    <?php endif; ?>
</section>

<?php $html = ob_get_clean();