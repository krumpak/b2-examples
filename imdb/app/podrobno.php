<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }


  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb WHERE id = :id LIMIT 1" );
    $sql->execute( array( ':id' => intval( $_GET['vec'] ) ) );
    $en = $sql->fetch();
  } catch ( PDOException $e ) {
    echo "Napaka pri tabeli: " . $e->getMessage();
  }

?>
<!-- Več o posamezneme igralcu ali igralki -->
Samo en igralec/igralka [<a href="<?= getvar('APP_URL'); ?>/app/?task=edit&id=<?= $en['id']; ?>">uredi</a>]
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