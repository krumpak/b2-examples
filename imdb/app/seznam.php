<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT id, ime, priimek FROM udelezenec02.imdb_osebe WHERE status = 1 ORDER BY priimek ASC" );
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

  else :

    ?>

    <table class="table table-striped table-hover">
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
            <td><a class="btn btn-outline-primary btn-sm" href="<?= getvar( 'APP_URL' ); ?>/app/view/<?= $igralec['id']; ?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
            <td><a class="btn btn-outline-primary btn-sm" href="<?= getvar( 'APP_URL' ); ?>/app/edit/<?= $igralec['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td>
              <button class="btn btn-outline-danger btn-sm" id="izbrisi-<?= $index; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
              <a class="btn btn-danger btn-sm" id="izbrisi-ok-<?= $index; ?>" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/delete/<?= $igralec['id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
              <button class="btn btn-primary btn-sm" id="izbrisi-cancel-<?= $index; ?>" style="display: none;"><i class="fa fa-times" aria-hidden="true"></i></button>
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