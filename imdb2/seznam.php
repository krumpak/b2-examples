<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT id, ime, priimek FROM udelezenec02.imdb2_osebe WHERE status = 1 ORDER BY priimek ASC" );
    $sql->execute();
    $array = $sql->fetchAll();
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }
?>

<h2>Seznam igralcev/igralk</h2>

<?php

  if ( count( $array ) === 0 ) :

    echo "<br>Seznam je prazen!";

  else : ?>

    <table class="table table-striped table-hover">
      <tr>
        <td>#</td>
        <td>Ime</td>
        <td>Priimek</td>
        <td></td>
      </tr>

      <?php foreach ( $array as $index => $igralec ) : ?>
        <tr>
          <td><?= $index + 1; ?></td>
          <td><?= $igralec['ime'] ?></td>
          <td><?= $igralec['priimek'] ?></td>
          <td>
            <a class="btn btn-primary btn-sm" href="<?= getvar( 'APP_URL' ) ?>/oseba/<?= $igralec['id'] ?>">
              <i class="fa fa-external-link" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>

  <?php endif; ?>