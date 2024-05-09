<?php

  if ( ! defined('varovalka') ) {
    header('Location: index.php');
    die('Stran ni dosegljiva direktno.');
  }

  if (isset($_SESSION['uporabnik']) && !empty($_SESSION['uporabnik'])) {
    unset($_SESSION['uporabnik']);
    header('Location: index.php');
  }

?>