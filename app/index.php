<?php
  define( 'varovalka', true );

  session_start();

  include_once 'shared.php';

  if ( isset( $_GET['task'] ) && isset( $_GET['param'] ) && $_GET['task'] === 'oseba' && preg_match( '/^\d+$/', $_GET['param'] ) ) {
    include_once 'izpisOsebe.php';
  } else if ( isset( $_GET['task'] ) && ! isset( $_GET['param'] ) && $_GET['task'] === 'podjetje' ) {
    include_once 'oPodjetju.php';
  } else if (!isset( $_GET['task'] ) && ! isset( $_GET['param'] )) {
    include_once 'izpisVsehOseb.php';
  } else {
    include_once 'error.php';
  }


?>

