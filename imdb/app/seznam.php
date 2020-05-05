<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare("SELECT * FROM udelezenec02.imdb");
    $sql->execute();
    $array = $sql->fetchAll();
  } catch (PDOException $e ) {
    echo "Napaka pri tabeli: " . $e->getMessage();
  }

?>

<!-- Cel seznam vseh igralcev -->
Cel seznam
<table>
  <?php foreach ( $array as $index => $igralec ) : ?>
    <tr>
      <td><?= $index + 1; ?></td>
      <td><?= $igralec['ime'] ?></td>
      <td><?= $igralec['priimek'] ?></td>
      <td><a href="<?= getvar( 'APP_URL' ); ?>/app/?vec=<?= $igralec['id']; ?>">Preberi več</a></td>
      <td><a href="<?= getvar('APP_URL'); ?>/app/?task=edit&id=<?= $igralec['id']; ?>">Uredi</a></td>
      <td><a href="<?= getvar( 'APP_URL' ); ?>/app/?task=delete&id=<?= $igralec['id']; ?>">Izbriši</a></td>
    </tr>
  <?php endforeach; ?>
</table>