

<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb2_osebe WHERE id = :id AND status = 1 LIMIT 1" );
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

<table class="table table-striped table-hover">
  <tr>
    <td>Ime:</td>
    <td><?= $en['ime']; ?></td>
  </tr>
  <tr>
    <td>Priimek:</td>
    <td><?= $en['priimek']; ?></td>
  </tr>
</table>
