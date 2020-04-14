<?php

  define( 'varovalka', true );

  session_start();

  include_once 'header.php';

  session_destroy();

  header('Location: ./interaktivnost.php');

  ?>

<?php include_once 'footer.php'; ?>