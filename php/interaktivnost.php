<?php
$errors = array();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  $ime = $_POST['ime'];
  if (strlen($ime) <= 2) {
    $errors[] = array('name' => 'ime', 'msg' => 'Ime ni dovolj dolgo');
  }
  $priimek = $_POST['priimek'];
  if (strlen($priimek) <= 2) {
    $errors[] = array('name' => 'priimek', 'msg' => 'Priimek ni dovolj dolg');
  }
  $email = $_POST['email'];
  if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = array('name' => 'email', 'msg' => 'Email ni pravilne oblike');
  }
  $geslo = $_POST['geslo'];
  if (! preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{20,}$/', $geslo)) {
    $errors[] = array('name' => 'geslo', 'msg' => 'Geslo ni pravilne oblike');
  }
  $ulica = $_POST['ulica'];
  if (strlen($ulica) <= 2) {
    $errors[] = array('name' => 'ulica', 'msg' => 'Ime ulice ni dovolj dolgo');
  }
  $hisna_st = $_POST['hisna_st'];
  if (strlen($hisna_st) <= 1) {
    $errors[] = array('name' => 'hisna_st', 'msg' => 'Hišna številka ni dovolj dolga');
  }
  $posta = $_POST['posta'];
  if (strlen($posta) <= 2) {
    $errors[] = array('name' => 'posta', 'msg' => 'Ime pošte ni dovolj dolgo');
  }
  $postna_st = $_POST['postna_st'];
  if (! preg_match('/^\d{4}$/i', $postna_st)) {
    $errors[] = array('name' => 'postna_st', 'msg' => 'Poštna številka ni pravilne oblike');
  }
  $kreditna = $_POST['kreditna'];
  if (strlen($kreditna) <= 2) {
    $errors[] = array('name' => 'kreditna', 'msg' => 'Ime kreditne kartice ni dovolj dolgo');
  }
  $kreditna_st = $_POST['kreditna_st'];
  if (! preg_match('/(\d{4})[\s\-](\d{4})[\s\-](\d{4})/i', $kreditna_st)) {
    $errors[] = array('name' => 'kreditna_st', 'msg' => 'Kreditna številka ni pravilne oblike');
  }
} else {
  $ime = '';
  $priimek = '';
  $email = '';
  $geslo = '';
  $ulica = '';
  $hisna_st = '';
  $posta = '';
  $postna_st = '';
  $kreditna = '';
  $kreditna_st = '';
}

function vrniNapako($errors, $tip) {
  foreach($errors as $err){
    if ($err['name'] == $tip) {
      return '<small style="color:red;">' . $err['msg'] . '</small><br>';
    }
  }
}
?>

<?php if (count($errors) > 0) : ?>
  <div style="color:red;">Obrazec ni pravilno izpolnjen</div>
<?php endif; ?>

<form method="post">
  ime: <input type="text" name="ime" placeholder="Vpišite ime" value="<?= $ime; ?>" required><br>
  <?= vrniNapako($errors, 'ime'); ?>
  priimek: <input type="text" name="priimek" placeholder="Vpišite priimek" value="<?= $priimek; ?>" required><br>
  <?= vrniNapako($errors, 'priimek'); ?>
  email: <input type="email" name="email" placeholder="Vpišite email" value="<?= $email; ?>" required><br>
  <?= vrniNapako($errors, 'email'); ?>
  geslo: <input type="password" name="geslo" placeholder="Vpišite geslo" value="<?= $geslo; ?>" required><br>
  <?= vrniNapako($errors, 'geslo'); ?>
  ulica: <input type="text" name="ulica" placeholder="Vpišite ulico" value="<?= $ulica; ?>" required><br>
  <?= vrniNapako($errors, 'ulica'); ?>
  hišna številka: <input type="text" name="hisna_st" placeholder="Vpišite hišno številko" value="<?= $hisna_st; ?>" required><br>
  <?= vrniNapako($errors, 'hisna_st'); ?>
  pošta: <input type="text" name="posta" placeholder="Vpišite hišno pošto" value="<?= $posta; ?>" required><br>
  <?= vrniNapako($errors, 'posta'); ?>
  poštna številka: <input type="text" name="postna_st" placeholder="Vpišite poštno številko" value="<?= $postna_st; ?>" required><br>
  <?= vrniNapako($errors, 'postna_st'); ?>
  kreditna: <input type="text" name="kreditna" placeholder="Vpišite kreditno kartico" value="<?= $kreditna; ?>" required><br>
  <?= vrniNapako($errors, 'kreditna'); ?>
  kreditne številka: <input type="text" name="kreditna_st" placeholder="Vpišite kreditno številko" value="<?= $kreditna_st; ?>" required><br>
  <?= vrniNapako($errors, 'kreditna_st'); ?>
  <br>
  <input type="submit" value="Registriraj me">
</form>
<br>
<a href="http://students.b2.eu/udelezenec02/php/interaktivnost.php?kljuc=vrednost&status=ok&dan=sobota">get</a>

