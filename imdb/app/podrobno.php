<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb_osebe INNER JOIN udelezenec02.imdb_kraji ON imdb_osebe.kraj_id=imdb_kraji.kraj_id WHERE id = :id AND status = 1 LIMIT 1" );
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
<h2>Samo en igralec/igralka</h2>
<a class="btn btn-outline-primary btn-sm" href="<?= getvar( 'APP_URL' ); ?>/app/edit/<?= $en['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<button class="btn btn-outline-danger btn-sm" id="izbrisi"><i class="fa fa-trash" aria-hidden="true"></i></button>
<a class="btn btn-danger btn-sm" id="izbrisi-ok" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/delete/<?= $en['id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
<button class="btn btn-primary btn-sm" id="izbrisi-cancel" style="display: none;"><i class="fa fa-times" aria-hidden="true"></i></button>
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

<table class="table table-striped table-hover">
  <tr>
    <td>Ime:</td>
    <td><?= $en['ime']; ?></td>
  </tr>
  <tr>
    <td>Priimek:</td>
    <td><?= $en['priimek']; ?></td>
  </tr>
  <tr>
    <td>Kraj:</td>
    <td><?= $en['kraj']; ?></td>
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