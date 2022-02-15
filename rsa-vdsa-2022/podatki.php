<?php
$podatki = [
  [
    "ime" => "Gašper",
    "priimek" => "Novak",
    "naslov" => [
      "ulica" => "Slovenska",
      "stevilka" => rand(20,100),
      "posta" => "1000 Ljubljana"
    ],
    "registriran_ob" => "2021-11-17 17:25:57",
    "zadnja_prijava_ob" => "2022-01-07 17:25:57"
  ],
  [
    "ime" => "Miša",
    "priimek" => "Prešeren",
    "naslov" => [
      "ulica" => "Gorenjska ulica",
      "stevilka" => rand(20,100),
      "posta" => "4000 Kranj"
    ],
    "registriran_ob" => "2021-11-17 17:25:57",
    "zadnja_prijava_ob" => "2022-02-14 18:10:19"
  ],
  [
    "ime" => "Peter",
    "priimek" => "Kovač",
    "naslov" => [
      "ulica" => "Primorska ulica",
      "stevilka" => rand(20,100),
      "posta" => "6000 Koper"
    ],
    "registriran_ob" => "2021-11-17 17:25:57",
    "zadnja_prijava_ob" => "2022-01-15 17:01:15"
  ],
  [
    "ime" => "Simona",
    "priimek" => "Nared",
    "naslov" => [
      "ulica" => "Madžarska ulica",
      "stevilka" => rand(20,100),
      "posta" => "7000 Murska Sobota"
    ],
    "registriran_ob" => "2021-11-17 17:25:57",
    "zadnja_prijava_ob" => "2022-01-18 19:55:05"
  ]
];

  header("Content-Type: application/json; charset=UTF-8");

  echo json_encode($podatki);

?>