<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  function getvar( $var ) {
    if ( file_exists( '.env' ) ) {
      $file = file_get_contents( '.env', true );
      $env  = explode( "\n", $file );

      foreach ( $env as $vars ) {
        if ( preg_match( '/^' . $var . '=/', $vars ) ) {
          $value = preg_replace( '/^' . $var . '=/', '', $vars );
          $clean = preg_replace( '/["|\'|`]/', '', $value );

          return $clean;
        }
      }
    }

    return null;
  }

  function getUserURL( $id ) {
    return getvar( 'APP_URL' ) . '/oseba/' . $id;
  }
?>
