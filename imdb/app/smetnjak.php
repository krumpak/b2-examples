<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT id, ime, priimek, created_at, updated_at FROM udelezenec02.imdb_osebe WHERE status = 0 ORDER BY priimek ASC;" );
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

  else :

    ?>


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
        $js = '';

        foreach ( $array as $index => $igralec ) : ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $igralec['ime'] ?></td>
            <td><?= $igralec['priimek'] ?></td>
            <td><?= date( 'j. n. Y, G:i:s', strtotime( $igralec['created_at'] ) ) ?></td>
            <td><?= $igralec['updated_at'] !== null ? date( 'j. n. Y, G:i:s', strtotime( $igralec['updated_at'] ) ) : '&nbps;' ?></td>
            <td>
              <button class="btn btn-outline-success btn-sm" id="povrni-<?= $index; ?>">&#x27F2;</button>
              <a class="btn btn-success btn-sm" id="povrni-ok-<?= $index; ?>" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/revert/<?= $igralec['id']; ?>">&#10004;</a>
              <button class="btn btn-primary btn-sm" id="povrni-cancel-<?= $index; ?>" style="display: none;">&#10006;</button>
            </td>
            <td>
              <button class="btn btn-outline-danger btn-sm" id="unici-<?= $index; ?>">&#128465;</button>
              <a class="btn btn-danger btn-sm" id="unici-ok-<?= $index; ?>" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/destroy/<?= $igralec['id']; ?>">&#10004;</a>
              <button class="btn btn-primary btn-sm" id="unici-cancel-<?= $index; ?>" style="display: none;">&#10006;</button>
            </td>
          </tr>

          <?php

          $js .= '
        $("#povrni-' . $index . '").click(function () {
          $("#povrni-' . $index . '").hide();
          $("#povrni-ok-' . $index . '").show();
          $("#povrni-cancel-' . $index . '").show();
        });
        $("#povrni-cancel-' . $index . '").click(function () {
          $("#povrni-' . $index . '").show();
          $("#povrni-ok-' . $index . '").hide();
          $("#povrni-cancel-' . $index . '").hide();
        });
        $("#unici-' . $index . '").click(function () {
          $("#unici-' . $index . '").hide();
          $("#unici-ok-' . $index . '").show();
          $("#unici-cancel-' . $index . '").show();
        });
        $("#unici-cancel-' . $index . '").click(function () {
          $("#unici-' . $index . '").show();
          $("#unici-ok-' . $index . '").hide();
          $("#unici-cancel-' . $index . '").hide();
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
