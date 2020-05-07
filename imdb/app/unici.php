<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $delete = $conn->prepare( "DELETE FROM udelezenec02.imdb WHERE id = :id AND status = 0" );
    $delete->execute( array( ":id" => intval( $_GET['id'] ) ) );

    // Po uspšenem izbrisu me premakni ne seznam vseh
    header( 'Location: ' . getvar( 'APP_URL' ) . '/app/?task=bin' );

  } catch ( PDOException $e ) {
    echo "Napaka pri tabeli: " . $e->getMessage();
  }

?>