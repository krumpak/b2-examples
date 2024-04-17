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

?>
</body>
</html>