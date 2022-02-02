<?php
  // komentar v PHPju: tukaj se izvede vsa koda

  echo "Prikazano na zaslonu!";

  echo "<br>";
  echo 1 + 2; // 3
  echo "<br>";
  echo 10 - 7; // 3
  echo "<br>";
  echo 3 * 4; // 12
  echo "<br>";
  echo 100 / 25; // 4
  echo "<br>";
  echo 99 % 2; // 1
  echo "<br>";
  echo 98 % 2; // 0
  echo "<br>Star sem " . 33 . "!";

  $ime = 'Gašper';    // string
  $priimek = "Kovač"; // string
  $starost = 33;      // integer
  $spol = true;       // boolean
  $spol = false;      // boolean
  $spol = true;       // boolean
  $stevilkaCevlja = 42.5;  // float
  $array = array(1, 2, 3, 4);   // array
  $array = [1, 2, 3, 4];        // array
  $object = (object)[];         // object

  $slika = "<img src=\"URL\">";
  $slika = '<img src="URL">';

  echo "<hr>Sem $ime $priimek. Star sem " . $starost . " let. Številko čevljev nosim $stevilkaCevlja! $ime sem že od rojstva. $spol.";

?>
