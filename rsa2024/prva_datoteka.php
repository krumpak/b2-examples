<?php

  $naslov = "Moja prva PHP datoteka";

  $ime_uporabnika = "Jana";

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $naslov; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      color: <?php echo rand(0,1) ? "red" : "blue"; ?>;
    }
    p {
      color: green;
    }
  </style>
</head>
<body>

<h1><?php echo $naslov; ?></h1>

<?php

  echo "<h2>Pozdravljena " . $ime_uporabnika . ".</h2>";

  echo "<h2>Pozdravljena $ime_uporabnika.</h2>";

  echo "<p>Prva datoteka vsebuje <br>samo eno vrstico.</p>";

  echo '1' . '2' . '3' . '4' . '5';

  echo "<br>";
  echo '1' + '2' + '3' + '4' + '5';
  echo "<br>";
  echo 1 + 2 + 3 + 4 + 5;
  echo "<hr>";

  /*  komentar  */

  $vsota = 1;
  $vsota *= 3;
  echo $vsota;

  echo "<hr>";

  $vsota = 0;

  $vsota++;
  $vsota = $vsota + 1;
  $vsota += 1;

  echo $vsota;

  echo "<hr>";

  $vsota = 0;

  echo ++$vsota;

  echo "<hr>";

  $boolean = false;

  echo "Boolean: $boolean";

  echo "<hr>";

  $datum = date('d. m. Y H:i:s');

  echo "Datum: $datum";

  echo "<pre>";
  print_r($datum);
  echo "</pre>";

  $niz_1 = [1,2,3,4,5];
  $niz_2 = array(1,2,3,4,5);

  echo "<pre>";
  print_r($niz_1);
  echo "</pre>";

  echo "<pre>";
  print_r($niz_2);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];
  $object = (object) [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<pre>";
  print_r($object);
  echo "</pre>";

  echo $array[1];
  echo "<br>";
  echo $object->{1};

  echo "<hr>";

  $starost_arr = [
    'Gregor' => 30,
    'Gašper' => 31,
    'Gorazd' => 33
  ];
  $starost_obj = (object) [
    'Gregor' => 30,
    'Gašper' => 31,
    'Gorazd' => 33
  ];

  echo "Oseba " . array_keys($starost_arr)[1] . " je stara " . $starost_arr['Gašper'] . " let.<br>";
//  echo "Oseba " . get_object_vars($starost_obj)[1] . " je stara " . $starost_obj->Gašper . " let.<br>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array[] = 'Goran';

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array[1] = 'Goran';

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  unset($array[1]);

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array = array_values($array);

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array = array_keys($array);

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array = array_flip($array);

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array = array_reverse($array);

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array = array_map('strtoupper', $array);

  echo "<pre>";
  print_r($array);
  echo "</pre>";

  echo "<hr>";

  $array = [
    'Gregor',
    'Gašper',
    'Gorazd'
  ];

  $array = array_map(function($ime) {
    return strtoupper($ime);
  }, $array);

  echo "<hr>Večdeimenzionalni nizi<hr>";

  $imenik = [
    [
      "ime" => "Gregor",
      "priimek" => "Novak",
      "starost" => 30,
      "spol"  => "M",
      "naslov" => [
        "ulica" => "Ulica 1",
        "kraj" => "Ljubljana"
      ]
    ],
    [
      "ime" => "Gašper",
      "priimek" => "Kovač",
      "starost" => 31,
      "spol"  => "M",
      "naslov" => [
        "ulica" => "Cesta 1",
        "kraj" => "Domžale"
      ]
    ],
    [
      "ime" => "Gabriela",
      "priimek" => "Medved",
      "starost" => 33,
      "spol"  => "Ž",
      "naslov" => [
        "ulica" => "Avenija 1",
        "kraj" => "Medvode"
      ]
    ],
    [
      "ime" => "Goran",
      "priimek" => "Kos",
      "starost" => 43,
      "spol"  => "M",
      "naslov" => [
        "ulica" => "Drevored 1",
        "kraj" => "Grosuplje"
      ]
    ]
  ];

  $id_osebe = 0;
  echo "Oseba ".$imenik[$id_osebe]['ime']." ".$imenik[$id_osebe]['priimek']." (".$imenik[$id_osebe]['spol'].") je stara ".$imenik[$id_osebe]['starost']." let in živi na naslovu ".$imenik[$id_osebe]['naslov']['ulica'].", ".$imenik[$id_osebe]['naslov']['kraj'].".";
  echo "<br><br><br><br><hr>";

  $stevec = 1;
  foreach ($imenik as $oseba) {
    echo $stevec++ . ". Oseba ".$oseba['ime']." ".$oseba['priimek']." (".$oseba['spol'].") je stara ".$oseba['starost']." let in živi na naslovu ".$oseba['naslov']['ulica'].", ".$oseba['naslov']['kraj'].".<br>";
  }
  echo "<hr>";
  for ($id = 0; $id < count($imenik); $id++) {
    echo ($id + 1) . ". Oseba ".$imenik[$id]['ime']." ".$imenik[$id]['priimek']." (".$imenik[$id]['spol'].") je stara ".$imenik[$id]['starost']." let in živi na naslovu ".$imenik[$id]['naslov']['ulica'].", ".$imenik[$id]['naslov']['kraj'].".<br>";
  }

    echo "<br><br><br><br><br><br><br><br><br><br><br>";
?>
</body>
</html>