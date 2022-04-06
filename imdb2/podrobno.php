

<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb2_osebe LEFT JOIN udelezenec02.imdb2_kraji ON imdb2_osebe.kraj=imdb2_kraji.kraj_id WHERE id = :id AND status = 1 LIMIT 1" );
    $sql->execute( array( ':id' => intval( $_GET['id'] ) ) );
    $en = $sql->fetch();

    if ( empty( $en ) ) {
      $_SESSION['message'] = array(
        'text' => 'Ni podatkov',
        'type' => 'error'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/seznam' );
    }

  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>

<h2>Samo en igralec/igralka</h2>

<a class="btn btn-outline-primary btn-sm" href="<?= getvar( 'APP_URL' ); ?>/uredi/<?= $en['id']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>

<a class="btn btn-outline-danger btn-sm" href="<?= getvar( 'APP_URL' ); ?>/izbrisi/<?= $en['id']; ?>">
  <i class="fa fa-trash" aria-hidden="true"></i>
</a>

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
    <td><?= $en['kraj_ime']; ?></td>
  </tr>
</table>
