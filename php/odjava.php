<?php

  define( 'varovalka', true );

  session_start();

  include_once 'header.php';

  session_destroy();

  header('Location: http://students.b2.eu/udelezenec02/php/interaktivnost.php');

  ?>

<?php include_once 'footer.php'; ?>