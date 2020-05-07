<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb WHERE status = 0 ORDER BY priimek ASC;" );
    $sql->execute();
    $array = $sql->fetchAll();
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>
Smetnjak

<?php

  if ( count( $array ) === 0 ) :

    echo "<br>Smetnjak je prazen!";

  else :

    ?>


    <table border="1">
      <tr>
        <th>#</th>
        <th>Ime</th>
        <th>Priimek</th>
        <th>Povrni</th>
        <th>Uniči</th>
      </tr>

      <?php
        $js = '';

        foreach ( $array as $index => $igralec ) : ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $igralec['ime'] ?></td>
            <td><?= $igralec['priimek'] ?></td>
            <td>
              <button id="povrni-<?= $index; ?>">&#x27F2;</button>
              <a id="povrni-ok-<?= $index; ?>" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/revert/<?= $igralec['id']; ?>">&#10004;</a>
              <button id="povrni-cancel-<?= $index; ?>" style="display: none;">&#10006;</button>
            </td>
            <td>
              <button id="unici-<?= $index; ?>">&#128465;</button>
              <a id="unici-ok-<?= $index; ?>" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/destroy/<?= $igralec['id']; ?>">&#10004;</a>
              <button id="unici-cancel-<?= $index; ?>" style="display: none;">&#10006;</button>
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
