<?php
  $ime = '';
  $priimek = '';
  $geslo = '';
  $email = '';

  if ( isset($_POST) && isset($_POST['ime']) ) {
    $ime = $_POST['ime'];
  }
  if ( isset($_POST) && isset($_POST['priimek']) ) {
    $priimek = $_POST['priimek'];
  }
  if ( isset($_POST) && isset($_POST['geslo']) ) {
    $geslo = $_POST['geslo'];
  }
  if ( isset($_POST) && isset($_POST['email']) ) {
    $email = $_POST['email'];
  }

  $napake = [];
  if (isset($_POST)) {
    if (strlen($_POST['ime']) <= 2) {
      array_push($napake, ['tip' => 'ime', 'sporocilo' => 'Ime je prekratko.']);
    }
    if (strlen($_POST['priimek']) <= 2) {
      array_push($napake, ['tip' => 'priimek', 'sporocilo' => 'Priimek je prekratek.']);
    }

    $nedovoljene_domene  = ['gmail.com', 'email.si', 'yahoo.com'];
    foreach ($nedovoljene_domene as $domena) {
      if ( strpos($_POST['email'], $domena) > 0 ) {
        array_push($napake, ['tip' => 'email', 'sporocilo' => $domena.' ni dovoljen.']);
      }
    }
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Obrazec</title>
  <style>
    label {
      display: block;
      margin-top: 10px;
    }
    input {
      width: 300px;
    }
    .napake {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>

<?php if (count($napake) >= 1) { ?>
  <div class="napake">Imate napako v obrazcu.
    <ul>
      <?php foreach ($napake as $napaka) { ?>
        <li><?php echo $napaka['sporocilo']; ?></li>
      <?php } ?>
    </ul>
  </div>
<?php } ?>

<form action="obrazci.php" method="POST">
  <label for="ime">
    Ime: <input type="text" name="ime" id="ime" value="<?php echo $ime; ?>">
  </label>

  <label for="priimek">
    Priimek: <input type="text" name="priimek" id="priimek" value="<?php echo $priimek; ?>">
  </label>

  <label for="geslo">
    Geslo: <input type="password" name="geslo" id="geslo" value="<?php echo $geslo; ?>">
  </label>

  <label for="email">
    Email: <input type="email" name="email" id="email" value="<?php echo $email; ?>">
  </label>

  <hr>

  <input type="submit" value="Pošlji">
</form>
</body>
</html>