<?php
  // zagon seje
  session_start();

//  session_unset();
//  echo "prej:<pre>";
//  print_r($_SESSION);
//  echo "</pre>";

  // teačajna lista valur
  $tecajnica = [
    [
      "id" => "1569635",
      "drzava" => "ZDA",
      "oznaka" => "USD",
      "valuta" => "Ameriški dolar",
      "tecaj" => "1,0460",
    ], [
      "id" => "9834535",
      "drzava" => "Srbija",
      "oznaka" => "RSD",
      "valuta" => "Srbski dinar",
      "tecaj" => "112,4900",
    ], [
      "id" => "98356835",
      "drzava" => "Norveška",
      "oznaka" => "NOK",
      "valuta" => "Norveška krona",
      "tecaj" => "11,5240",
    ], [
      "id" => "123564",
      "drzava" => "Japonska",
      "oznaka" => "JPY",
      "valuta" => "Japonski jen",
      "tecaj" => "162,7800",
    ], [
      "id" => "98745632",
      "drzava" => "Velika Britanija",
      "oznaka" => "GBP",
      "valuta" => "Angleški funt",
      "tecaj" => "0,8400",
    ], [
      "id" => "456123",
      "drzava" => "Švica",
      "oznaka" => "CHF",
      "valuta" => "Švicarski frank",
      "tecaj" => "0,9580",
    ]
  ];

  // ob zagonu napolnimo sejo s podatki
  if (isset($_SESSION) && !isset($_SESSION["tecajnica"])) {
    $_SESSION["tecajnica"] = $tecajnica;
  }

  if (isset($_POST) && isset($_POST["drzava"]) && isset($_POST["oznaka"]) && isset($_POST["valuta"]) && isset($_POST["tecaj"])) {
    array_push($_SESSION["tecajnica"], $_POST);
  }

  if (isset($_GET) && isset($_GET['naloga']) && $_GET['naloga'] === 'izbris' && $_GET['id'] !== '') {
    foreach($_SESSION["tecajnica"] as $index => $valuta) {
      if ($valuta['id'] === $_GET['id']) {
        unset($_SESSION["tecajnica"][$index]);
      }
    }
  }

  if (isset($_GET) && isset($_GET['naloga']) && $_GET['naloga'] === 'reset') {
    session_unset();

    $page = str_replace('.php', '', $_SERVER['PHP_SELF']);
    header("Refresh: 0; url=$page");
    die();
  }

  // Izpis tabele na zaslonu

  echo "<table border='1'>"; ?>

  <tr>
    <th>ID</th>
    <th>Država</th>
    <th>Oznaka</th>
    <th>Valuta</th>
    <th>Tečaj</th>
    <th>#</th>
  </tr>

  <?php foreach ($_SESSION["tecajnica"] as $index => $valuta) {
    echo "<tr>";
      echo "<td>" . ($index + 1) . "</td>";
      echo "<td>" . $valuta["drzava"] . "</td>";
      echo "<td>" . $valuta["oznaka"] . "</td>";
      echo "<td>" . $valuta["valuta"] . "</td>";
      echo "<td style='text-align:right'>" . $valuta["tecaj"] . "</td>";
      echo "<td><a href='./tecajnica?naloga=izbris&id=".$valuta["id"]."' target='_self'>🗑️</a></td>";
    echo "</tr>";
  } ?>

  <form action="./tecajnica" method="post">
    <tr>
      <td><input type="hidden" name="id" id="id" value="<?php echo rand(9999,9999999) ?>" readonly>Nov vnos:</td>
      <td><input type="text" name="drzava" id="drzava"></td>
      <td><input type="text" name="oznaka" id="oznaka"></td>
      <td><input type="text" name="valuta" id="valuta"></td>
      <td><input type="text" name="tecaj" id="tecaj"></td>
      <td></td>
    </tr>
    <tr>
      <td colspan="4"><input type="submit" value="Dodaj valuto" style="width:100%"></td>
      <td colspan="2"><a href="./tecajnica?naloga=reset" target="_self">Reset</a></td>
    </tr>
  </form>

  <?php echo "</table>"; ?>
