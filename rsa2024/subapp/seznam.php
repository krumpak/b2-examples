<?php

  if ( ! defined('varovalka') ) {
    header('Location: index.php');
    die('Stran ni dosegljiva direktno.');
  }

?>

<h1><?php echo $title; ?></h1>

<ol>
  <li>Prvi</li>
  <li>Drugi</li>
  <li>Tretji</li>
  <li>Četrti</li>
  <li>Peti</li>
</ol>