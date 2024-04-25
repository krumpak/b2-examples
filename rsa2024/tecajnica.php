<?php
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
  }

  echo "</table>";



?>