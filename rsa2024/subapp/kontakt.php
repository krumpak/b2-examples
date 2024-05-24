<?php

  if ( ! defined('varovalka') ) {
    header('Location: index.php');
    die('Stran ni dosegljiva direktno.');
  }

?>
<h1><?php echo $title; ?></h1>

<input type="text" id="ime" placeholder="Ime"><br>
<input type="text" id="priimek" placeholder="priimek"><br>
<input type="email" id="email" placeholder="email"><br>
<input type="submit" value="Pošlji">