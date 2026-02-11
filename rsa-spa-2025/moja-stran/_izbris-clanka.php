<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$sql = $conn->prepare('DELETE FROM clanki WHERE id = :id LIMIT 1');
$success = $sql->execute( [
  ':id' => $id,
] );
$conn = NULL;

if ($success && $sql->rowCount() === 1) {
  $_SESSION['obvestilo'] = '<span class="success">Članek uspešno izbrisan.</span>';
} else {
  $_SESSION['obvestilo'] = '<span class="error">Izbris članka ni uspel.</span>';
}

header('Location: ../clanki');
exit();