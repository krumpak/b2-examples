<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT id, ime, priimek FROM udelezenec02.imdb WHERE status = 1 ORDER BY priimek ASC" );
    $sql->execute();
    $array = $sql->fetchAll();
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>

  <!-- Cel seznam vseh igralcev -->
  Cel seznam

<?php

  if ( count( $array ) === 0 ) :

    echo "<br>Seznam je prazen!";

  else :

    ?>

    <table border="1">
      <tr>
        <th>#</th>
        <th>Ime</th>
        <th>Priimek</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      <?php
        $js = '';

        foreach ( $array as $index => $igralec ) : ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $igralec['ime'] ?></td>
            <td><?= $igralec['priimek'] ?></td>
            <td><a href="<?= getvar( 'APP_URL' ); ?>/app/view/<?= $igralec['id']; ?>">&#8689;</a></td>
            <td><a href="<?= getvar( 'APP_URL' ); ?>/app/edit/<?= $igralec['id']; ?>">&#9998;</a></td>
            <td>
              <button id="izbrisi-<?= $index; ?>">&#128465;</button>
              <a id="izbrisi-ok-<?= $index; ?>" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/delete/<?= $igralec['id']; ?>">&#10004;</a>
              <button id="izbrisi-cancel-<?= $index; ?>" style="display: none;">&#10006;</button>
            </td>
          </tr>
          <?php

          $js .= '
        $("#izbrisi-' . $index . '").click(function () {
          $("#izbrisi-' . $index . '").hide();
          $("#izbrisi-ok-' . $index . '").show();
          $("#izbrisi-cancel-' . $index . '").show();
        });
        $("#izbrisi-cancel-' . $index . '").click(function () {
          $("#izbrisi-' . $index . '").show();
          $("#izbrisi-ok-' . $index . '").hide();
          $("#izbrisi-cancel-' . $index . '").hide();
        });
        ';

        endforeach; ?>
    </table>
    <script>
      $(function () {
        <?= $js; ?>
      })
    </script>
  <?php endif; ?>