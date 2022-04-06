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

          return trim( $clean );
        }
      }
    }

    return null;
  }

  function validacija() {
    if ( isset( $_SESSION['token'] ) && strlen( $_SESSION['token'] ) > 0  ) {
      return true;
    }

    return false;
  }

  function zaciniGeslo($geslo) {
    return sha1( $geslo . getvar( 'SOL' ) ) . getvar( 'POPER' );
  }