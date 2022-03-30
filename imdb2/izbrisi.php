<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $delete = $conn->prepare( "UPDATE udelezenec02.imdb2_osebe SET status=0, deleted_at=now() WHERE id = :id AND status = 1" );
    $delete->execute( array( ":id" => intval( $_GET['id'] ) ) );

    $_SESSION['message'] = array(
      'text' => 'Uspešno izbrisani podatki',
      'type' => 'success'
    );

    // Po uspšenem izbrisu me premakni ne seznam vseh
    header( 'Location: ' . getvar( 'APP_URL' ) . '/seznam' );

  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>