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

  $ime = 'Gregor';    // string
  $priimek = "Kovač"; // string
  $starost = 33;      // integer
  $spol = true;       // boolean
  $spol = false;      // boolean
  $spol = true;       // boolean
  $stevilkaCevlja = 42.5;  // float
  $array = array(1, 2, 3, 4);   // array
  $imena = [
    "Gregor",
    "Gašper",
    "Gorazd"
  ];        // array
  $object = (object)[];         // object

  $slika = "<img src=\"URL\">";
  $slika = '<img src="URL">';

  define("spol", 'moški');

  echo "<hr>Sem $ime $priimek. Star sem " . $starost . " let. Številko čevljev nosim $stevilkaCevlja! $ime sem že od rojstva. " . spol . ".";

  echo "<hr>";

  echo($imena[2]);

  echo "<hr> Array";

  $starost = [
    "Gregor" => 33,
    "Gašper" => 43,
    "Gorazd" => 53
  ];

  echo("$ime je star: " . $starost[$ime]);

  echo "<hr> Object";

  $starost = (object)[
    "Gregor" => 33,
    "Gašper" => 43,
    "Gorazd" => 53
  ];

  echo("$ime je star: " . $starost->$ime);

  echo "<hr>";

  echo "Multidimensional Array<hr>";

  $osebe = [
    [
      "ime" => 'Gregor',
      "priimek" => 'Novak',
      "starost" => 33,
      "spol" => "M",
      "naslov" => [
        "ulica" => "Slovenska",
        "h_stevilka" => 11,
        "posta" => "Ljubljana"
      ]
    ],
    [
      "ime" => 'Gabrijela',
      "priimek" => 'Kovač',
      "starost" => 43,
      "spol" => "Ž",
      "naslov" => [
        "ulica" => "Slovenska",
        "h_stevilka" => 11,
        "posta" => "Ljubljana"
      ]
    ],
    [
      "ime" => 'Gašper',
      "priimek" => 'Medved',
      "starost" => 23,
      "spol" => "M",
      "naslov" => [
        "ulica" => "Slovenska",
        "h_stevilka" => 11,
        "posta" => "Ljubljana"
      ]
    ]
  ];

  echo($osebe[1]['ime'] . " je stara: " . $osebe[1]['starost']);

  echo "<hr>";

  print_r($osebe);
?>
