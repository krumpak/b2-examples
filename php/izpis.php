<?php

  define( 'varovalka', true );

  session_start();

  include_once 'header.php';

echo "Moje ime je Gorazd.";

echo "<br>";

echo 1 + 2; // 3
echo "<br>";
echo 10 - 7; // 3
echo "<br>";
echo 3 * 4; // 12
echo "<br>";
echo 100 / 25; /* 4 */
echo "<br>";
echo 99 % 2; // 1
echo "<br>Star sem " . 11 . "!"; // Star sem 11

$ime = 'Gregor'; // string
$priimek = "Krumpak"; // string
$starost = 11; // integer
$spol = true; // boolean
$spol = false; // boolean
$spol = true; // boolean
$cevlja = 42.5; // float
$array = array();
$object = (object)[];

$slika = "<img src=\"URL\">"; // <img src="URL">
$slika = "<img src='URL'>"; // <img src='URL'>

echo "Sem $ime $priimek. Star sem " . $starost . " let. Številko čevljev nosim $cevlja! $ime že od rojstva. $spol";


















?>












