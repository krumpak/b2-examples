<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }


  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb WHERE id = :id AND status = 1 LIMIT 1" );
    $sql->execute( array( ':id' => intval( $_GET['id'] ) ) );
    $en = $sql->fetch();

    if ( empty( $en ) ) {
      $_SESSION['message'] = array(
        'text' => 'Ni podatkov',
        'type' => 'error'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/app/' );
    }

  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>
<!-- Več o posamezneme igralcu ali igralki -->
Samo en igralec/igralka
|
<a href="<?= getvar( 'APP_URL' ); ?>/app/edit/<?= $en['id']; ?>">&#9998;</a>
|
<button id="izbrisi">&#128465;</button>
<a id="izbrisi-ok" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/delete/<?= $en['id']; ?>">&#10004;</a>
<button id="izbrisi-cancel" style="display: none;">&#10006;</button>
<script>
  $(function () {
    $('#izbrisi').click(function () {
      $('#izbrisi').hide();
      $('#izbrisi-ok').show();
      $('#izbrisi-cancel').show();
    })
    $('#izbrisi-cancel').click(function () {
      $('#izbrisi').show();
      $('#izbrisi-ok').hide();
      $('#izbrisi-cancel').hide();
    })
  })
</script>

<table>
  <tr>
    <td>Ime:</td>
    <td><?= $en['ime']; ?></td>
  </tr>
  <tr>
    <td>Priimek:</td>
    <td><?= $en['priimek']; ?></td>
  </tr>
  <tr>
    <td>Žanri:</td>
    <td><?= $en['zanri']; ?></td>
  </tr>
  <tr>
    <td>Filmi:</td>
    <td><?= $en['filmi']; ?></td>
  </tr>
</table>