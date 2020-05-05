<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
//    $delete = $conn->prepare( "DELETE FROM udelezenec02.imdb WHERE id = :id" );
//    $delete->execute( array( ":id" => intval( $_GET['id'] ) ) );

    $delete = $conn->prepare( "UPDATE udelezenec02.imdb SET status=0, deleted_at=now() WHERE id = :id AND status = 1" );
    $delete->execute( array( ":id" => intval( $_GET['id'] ) ) );

    // Po uspšenem izbrisu me premakni ne seznam vseh
    header( 'Location: ' . getvar( 'APP_URL' ) . '/app/' );

  } catch ( PDOException $e ) {
    echo "Napaka pri tabeli: " . $e->getMessage();
  }

?>