<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  try {
    $delete = $conn->prepare( "DELETE FROM udelezenec02.imdb_osebe WHERE id = :id AND status = 0" );
    $delete->execute( array( ":id" => intval( $_GET['id'] ) ) );

    $_SESSION['message'] = array(
      'text' => 'Uspešno uničeni podatki',
      'type' => 'success'
    );

    // Po uspšenem izbrisu me premakni ne seznam vseh
    header( 'Location: ' . getvar( 'APP_URL' ) . '/app/bin' );

  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }

?>