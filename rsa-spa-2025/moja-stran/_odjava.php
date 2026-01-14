<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

session_destroy();

header('Location: ./prijava');
exit();