<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$vloge = [
  'gost',
  'clan',
  'urednik',
  'administrator',
];

$title = 'Uredi uporabnika .::. ' . $naslov;

$aktivnost = 'uporabniki';

$sql = $conn->prepare('SELECT * FROM uporabniki WHERE id = :id LIMIT 1');
$sql->execute( [
  ':id' => $id
] );
$uporabnik = $sql->fetch() ?: NULL;

$conn = NULL;

if ($uporabnik === NULL) {
  header('Location: ../uporabniki');
  exit();
}

$id = $uporabnik['id'] ?? '';
$ime = $uporabnik['ime'] ?? '';
$email = $uporabnik['email'] ?? '';
$vloga = $uporabnik['vloga'] ?? '';
$aktivnost = $uporabnik['aktivnost'] ?? '';
$datum = $uporabnik['timestamp'] ?? '';

if (($_SESSION['form'] ?? NULL) !== NULL) {
  $form = $_SESSION['form'] ?? NULL;
  
  $_SESSION['form'] = NULL;
  $id = $form['id'] ?? '';
  $ime = $form['ime'] ?? '';
  $email = $form['email'] ?? '';
  $vloga = $form['vloga'] ?? '';
  $aktivnost = $form['aktivnost'] ?? '';
  $datum = $form['datum'] ?? '';
}

ob_start(); ?>

<h2>Uredi članke</h2>

<form action="./ureditev-uporabnika" method="POST">
  <input type="hidden" name="id" value="<?php echo $id; ?>" readonly>

  <div class="vrstica">
    <label for="ime">Ime:</label>
    <input type="text" name="ime" value="<?php echo $ime; ?>">
  </div>
  <div class="vrstica">
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="vrstica">
    <label for="password">Geslo</label>
    <input type="password" name="password" minlength="12" maxlength="255">
  </div>
  <div class="vrstica">
    <label for="password_2">Ponovitev gesla</label>
    <input type="password" name="password_2">
  </div>
  <div class="vrstica">
    <label for="vloga">Vloga:</label>
    <select name="vloga">
      <?php foreach ( $vloge as $item ) : ?>
        <option value="<?php echo $item; ?>" <?php echo $vloga == $item ? 'selected' : ''; ?>>
          <?php echo $item; ?>
        </option> 
      <?php endforeach; ?>
    </select>
  </div>
  <div class="vrstica">
    <label for="aktivnost">Aktivnost:</label>
    <input type="checkbox" name="aktivnost" <?php echo $aktivnost == 1 ? 'checked' : ''; ?>>
  </div>
  <div class="vrstica">
    <label for="datum">Datum:</label>
    <input type="datetime-local" name="datum" value="<?php echo $datum; ?>" readonly>
  </div>

  <input type="submit" value="Posodobi">

  <a class="gumb" href="./uporabniki">Nazaj</a>

</form>


<?php

$html = ob_get_clean();
