<?php

  define( 'varovalka', true );

  include_once 'header.php';

  session_destroy();

  header('Location: ./interaktivnost.php');

  ?>

<?php include_once 'footer.php'; ?>