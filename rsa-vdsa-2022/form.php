<?php
  $ime = '';
  $imeValidacija = '';
  $priimek = '';
  $priimekValidacija = '';
  $geslo = '';
  $gesloValidacija = '';
  $email = '';
  $emailValidacija = '';

  if (isset($_POST['ime']) && $_POST['ime'] !== '') {
    $ime = $_POST['ime'];
  } else {
    $ime = '';
  }
  $imeValidacija = isset($_POST['ime']) && $_POST['ime'] !== '' ? 'success' : 'fail';

  $priimek = isset($_POST['priimek']) && $_POST['priimek'] !== '' ? $_POST['priimek'] : '';
  $priimekValidacija = isset($_POST['priimek']) && $_POST['priimek'] !== '' ? 'success' : 'fail';

  $geslo = isset($_POST['geslo']) && $_POST['geslo'] !== '' ? $_POST['geslo'] : '';
  $gesloValidacija = isset($_POST['geslo']) && $_POST['geslo'] !== '' ? 'success' : 'fail';

  $email = isset($_POST['email']) && $_POST['email'] !== '' ? $_POST['email'] : '';
  $emailValidacija = isset($_POST['email']) && $_POST['email'] !== '' && preg_match('/@/', $_POST['email']) ? 'success' : 'fail';

  $stevilka_indexa = isset($_GET['stevilka_indexa']) && $_GET['stevilka_indexa'] !== '' ? $_GET['stevilka_indexa'] : '';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Obrazec</title>
  <style>
    .success {
      color: green;
    }
    .fail {
      color: red;
    }
  </style>
</head>
<body>
<form action="" method="post">
  <label for="ime" class="<?php echo $imeValidacija; ?>">Ime
    <input type="text" name="ime" id="ime" value="<?php echo $ime; ?>">
  </label>
  <br>
  <label for="priimek" class="<?php echo $priimekValidacija; ?>">priimek
    <input type="text" name="priimek" id="priimek" value="<?php echo $priimek; ?>">
  </label>
  <br>
  <label for="geslo" class="<?php echo $gesloValidacija; ?>">geslo
    <input type="password" name="geslo" id="geslo" value="<?php echo $geslo; ?>">
  </label>
  <br>
  <label for="email" class="<?php echo $emailValidacija; ?>">email
    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
  </label>
  <?php if ($stevilka_indexa !== '') : ?>
    <input type="hidden" name="index" id="index" value="<?php echo $stevilka_indexa; ?>">
  <?php endif; ?>
  <hr>
  <input type="submit" value="Pošlji">
</form>

</body>
</html>