<?php
$podatki = [
  [
    "ime" => "Gašper",
    "priimek" => "Novak",
    "naslov" => [
      "ulica" => "Slovenska",
      "stevilka" => rand(20,100),
      "posta" => "1000 Ljubljana"
    ]
  ],
  [
    "ime" => "Miša",
    "priimek" => "Prešeren",
    "naslov" => [
      "ulica" => "Gorenjska ulica",
      "stevilka" => rand(20,100),
      "posta" => "4000 Kranj"
    ]
  ],
  [
    "ime" => "Peter",
    "priimek" => "Kovač",
    "naslov" => [
      "ulica" => "Primorska ulica",
      "stevilka" => rand(20,100),
      "posta" => "6000 Koper"
    ]
  ],
  [
    "ime" => "Simona",
    "priimek" => "Nared",
    "naslov" => [
      "ulica" => "Madžarska ulica",
      "stevilka" => rand(20,100),
      "posta" => "7000 Murska Sobota"
    ]
  ]
];

  header("Content-Type: application/json; charset=UTF-8");

  echo json_encode($podatki);

?>