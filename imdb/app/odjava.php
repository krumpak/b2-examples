<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  unset( $_SESSION['token'] );

  header( 'Location: ' . getvar( 'APP_URL' ) . '/app/' );
?>