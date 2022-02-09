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
  </tr>
  </thead>
  <tbody>
  <?php

    $json = file_get_contents('http://students.b2.eu/udelezenec02/rsa-vdsa-2022/podatki.php');

    $obj = json_decode($json);

    //  print_r($json);
    foreach ($obj as $oseba) {
      echo "<tr>";
        echo "<td>" . $oseba->ime . "</td>";
        echo "<td>" . $oseba->priimek . "</td>";
        echo "<td>" . $oseba->naslov->ulica. " " . $oseba->naslov->stevilka . ", " . $oseba->naslov->posta . "</td>";
      echo "</tr>";
    }
  ?>
  </tbody>
</table>
</body>
</html>