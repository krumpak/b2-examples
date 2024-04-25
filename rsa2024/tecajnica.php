<?php
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";

  // teačajna lista valur
  $tecajnica = [
    [
      "drzava" => "ZDA",
      "oznaka" => "USD",
      "valuta" => "Ameriški dolar",
      "tecaj" => "1,0460",
    ], [
      "drzava" => "Srbija",
      "oznaka" => "RSD",
      "valuta" => "Srbski dinar",
      "tecaj" => "112,4900",
    ], [
      "drzava" => "Norveška",
      "oznaka" => "NOK",
      "valuta" => "Norveška krona",
      "tecaj" => "11,5240",
    ], [
      "drzava" => "Japonska",
      "oznaka" => "JPY",
      "valuta" => "Japonski jen",
      "tecaj" => "162,7800",
    ], [
      "drzava" => "Velika Britanija",
      "oznaka" => "GBP",
      "valuta" => "Angleški funt",
      "tecaj" => "0,8400",
    ], [
      "drzava" => "Švica",
      "oznaka" => "CHF",
      "valuta" => "Švicarski frank",
      "tecaj" => "0,9580",
    ]
  ];

  array_push($tecajnica, $_POST);

  // Izpis tabele na zaslonu

  echo "<table border='1'>"; ?>

  <tr>
    <th>Država</th>
    <th>Oznaka</th>
    <th>Valuta</th>
    <th>Tečaj</th>
  </tr>

  <?php foreach ($tecajnica as $valuta) {
    echo "<tr>";
      echo "<td>" . $valuta["drzava"] . "</td>";
      echo "<td>" . $valuta["oznaka"] . "</td>";
      echo "<td>" . $valuta["valuta"] . "</td>";
      echo "<td style='text-align:right'>" . $valuta["tecaj"] . "</td>";
    echo "</tr>";
  } ?>

  <form action="./tecajnica.php" method="post">
    <tr>
      <td><input type="text" name="drzava" id="drzava"></td>
      <td><input type="text" name="oznaka" id="oznaka"></td>
      <td><input type="text" name="valuta" id="valuta"></td>
      <td><input type="text" name="tecaj" id="tecaj"></td>
    </tr>
    <tr>
      <td colspan="4"><input type="submit" value="Dodaj valuto" style="width:100%"></td>
    </tr>
  </form>

  <?php echo "</table>";



?>