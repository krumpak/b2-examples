<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT id, ime, priimek, created_at, updated_at FROM udelezenec02.imdb2_osebe WHERE status = 0 ORDER BY priimek ASC;" );
    $sql->execute();
    $array = $sql->fetchAll();
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>

  <h2>Smetnjak</h2>

<?php

  if ( count( $array ) === 0 ) :

    echo "<br>Smetnjak je prazen!";

  else :  ?>

    <table class="table table-striped table-hover">
      <tr>
        <th>#</th>
        <th>Ime</th>
        <th>Priimek</th>
        <th>Povrni</th>
        <th>Uniči</th>
        <th>Ustvarjeno</th>
        <th>Posodobljeno</th>
      </tr>

      <?php

        foreach ( $array as $index => $igralec ) : ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $igralec['ime'] ?></td>
            <td><?= $igralec['priimek'] ?></td>
            <td><?= date( 'j. n. Y, G:i:s', strtotime( $igralec['created_at'] ) ) ?></td>
            <td><?= $igralec['updated_at'] !== null ? date( 'j. n. Y, G:i:s', strtotime( $igralec['updated_at'] ) ) : '&nbps;' ?></td>
            <td>
              <a class="btn btn-outline-success btn-sm" href="<?= getvar( 'APP_URL' ); ?>/povrni/<?= $igralec['id']; ?>">
                <i class="fa fa-undo" aria-hidden="true"></i>
              </a>
            </td>
            <td>
              <a class="btn btn-outline-danger btn-sm" href="<?= getvar( 'APP_URL' ); ?>/unici/<?= $igralec['id']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
            </td>
          </tr>

          <?php endforeach; ?>
    </table>
  <?php endif; ?>