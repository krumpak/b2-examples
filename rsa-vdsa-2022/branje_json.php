<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<table border="1">
  <thead>
  <tr>
    <th>Ime</th>
    <th>Priimek</th>
    <th>Naslov</th>
    <th>Nazadnje prijavljen</th>
    <th>Registriran ob</th>
    <th>Trenutni datum in čas</th>
  </tr>
  </thead>
  <tbody>
  <?php

    function pretvoriStevilkoVDanVTednu($dan, $krajsi_format = false, $velika_zacetnika = false) {
//      if ($dan == 1) {
//        $danVtednu = 'ponedeljek';
//      } elseif ($dan == 2) {
//        $danVtednu = 'torek';
//      } elseif ($dan == 3) {
//        $danVtednu = 'sreda';
//      } elseif ($dan == 4) {
//        $danVtednu = 'četrtek';
//      } elseif ($dan == 5) {
//        $danVtednu = 'petek';
//      } elseif ($dan == 6) {
//        $danVtednu = 'sobota';
//      } else {
//        $danVtednu = 'nedelja';
//      }

      switch ($dan) {
        case 1:
          $danVtednu = "ponedeljek";
          break;
        case 2:
          $danVtednu = "torek";
          break;
        case 3:
          $danVtednu = "sreda";
          break;
        case 4:
          $danVtednu = "četrtek";
          break;
        case 5:
          $danVtednu = "petek";
          break;
        case 6:
          $danVtednu = "sobota";
          break;
        case 7:
          $danVtednu = "nedelja";
          break;
        default:
          $danVtednu = "";
      }

      if ($krajsi_format) {
        $danVtednu = substr($danVtednu, 0, 3);
      }

      if ($velika_zacetnika) {
        $danVtednu = ucfirst($danVtednu);
      }

      return $danVtednu;
    }

    $json = file_get_contents('http://students.b2.eu/udelezenec02/rsa-vdsa-2022/podatki.php');

    $obj = json_decode($json);

    //  print_r($json);
    foreach ($obj as $oseba) {
      echo "<tr>";
        echo "<td>" . $oseba->ime . "</td>";
        echo "<td>" . $oseba->priimek . "</td>";
        echo "<td>" . $oseba->naslov->ulica. " " . $oseba->naslov->stevilka . ", " . $oseba->naslov->posta . "</td>";
        echo "<td>" . $oseba->zadnja_prijava_ob . "</td>"; // YYYY-MM-DD HH:MM:SS
        echo "<td>" . pretvoriStevilkoVDanVTednu(date("N", strtotime($oseba->registriran_ob)), false, true) . date(", j. n. Y, H:i:s", strtotime($oseba->registriran_ob)) . "</td>"; // YYYY-MM-DD
      // HH:MM:SS
        echo "<td>" . pretvoriStevilkoVDanVTednu(date("N"), true, true) . date(", j. n. Y, H:i:s") . "</td>"; // YYYY-MM-DD HH:MM:SS
      echo "</tr>";
    }
  ?>
  </tbody>
</table>
</body>
</html>