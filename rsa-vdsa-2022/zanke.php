<?php
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

  for ($x = 0; $x < 3; $x++) {
    echo($osebe[$x]['ime'] . " je stara: " . $osebe[$x]['starost'] . "<br>");
  }

  foreach ($osebe as $oseba) {
    echo($oseba['ime'] . " je stara: " . $oseba['starost'] );

      echo ' ' . $oseba['naslov']['ulica'];
      echo ' ' . $oseba['naslov']['h_stevilka'];
      echo ' ' . $oseba['naslov']['posta'];

    echo("<br>");
  }

?>