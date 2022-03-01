<?php
  session_start();

  $izdelki = [
    ["id" => 0, "ime" => "ram&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "cena" => 25],
    ["id" => 1, "ime" => "procesor", "cena" => 53],
    ["id" => 2, "ime" => "trdi disk", "cena" => 75]
  ];

  $tecaji = json_decode(file_get_contents('http://students.b2.eu/udelezenec02/rsa-vdsa-2022/tecajnica.json'));
  $tecaj = $tecaji->USD;

  if(!isset($_SESSION['kosarica'])) {
    $_SESSION['kosarica'] = array();
  }

  // dodajanje izdelkov v košarico
  if(isset($_GET['naloga']) && $_GET['naloga'] === 'dodaj') {
    $id = $_GET['izdelek'];
    $izdelek = $izdelki[$id];

    if(!in_array($id, $_SESSION['kosarica'])) {
      echo "izdelek <b>".$izdelek["ime"]."</b> dodan v košarico";
      array_push($_SESSION['kosarica'], $id);
    } else {
      echo "izdelek <b>".$izdelek["ime"]."</b> že obstaja v košarici in ni bil dodan";
    }
  }

  // odstranjevanje izdelkov iz košarice
  if(isset($_GET['naloga']) && $_GET['naloga'] === 'odstrani') {
    $id = $_GET['izdelek'];
    $izdelek = $izdelki[$id];

    unset($_SESSION['kosarica'][array_search($id, $_SESSION['kosarica'])]);

    echo "izdelek <b>".$izdelek["ime"]."</b> odstranjen iz košarice";
  }

?>

<hr>

<h1>Katalog izdelkov</h1>

<?php foreach ($izdelki as $izdelek) : ?>
  <?php echo $izdelek['ime']; ?>:
  <?php echo $izdelek['cena']; ?> EUR |
  <?php echo $izdelek['cena']*$tecaj; ?> USD |
  <a href="?naloga=dodaj&izdelek=<?php echo $izdelek['id']; ?>">kupi</a>
  <br>

<?php endforeach; ?>

<hr>

<h1>Vsebina košarice</h1>

<?php
  $vsota = 0;
  foreach ($_SESSION['kosarica'] as $id) : ?>
  <?php
    $vsota += $izdelki[$id]['cena'];

    echo $izdelki[$id]['ime']; ?>:
  <?php echo $izdelki[$id]['cena']; ?> EUR |
  <a href="?naloga=odstrani&izdelek=<?php echo $izdelki[$id]['id']; ?>">odstrani</a>
  <br>

<?php endforeach; ?>
<hr>Vsota: <?php echo $vsota; ?> EUR

