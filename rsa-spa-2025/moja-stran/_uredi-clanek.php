<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Uredi članek .::. ' . $naslov;

$aktivnost = 'clanki';

$sql = $conn->prepare('SELECT * FROM clanki WHERE id = :id LIMIT 1');
$sql->execute( [
  ':id' => $id
] );
$clanek = $sql->fetch() ?: NULL;

$sql_ = $conn->prepare('SELECT * FROM celine ORDER BY ime ASC');
$sql_->execute();
$celine_seznam = $sql_->fetchAll();

$conn = NULL;

if ($clanek === NULL) {
  header('Location: ../clanki');
  exit();
}

$naslov = $clanek['naslov'] ?? '';
$datum = $clanek['datum'] ?? '';
$slika = $clanek['slika'] ?? '';
$celina_id = $clanek['celina_id'] ?? '';
$clanek = $clanek['clanek'] ?? '';

if (($_SESSION['form'] ?? NULL) !== NULL) {
  $form = $_SESSION['form'] ?? NULL;
  $_SESSION['form'] = NULL;

  $id = $form['id'] ?? '';
  $naslov = $form['naslov'] ?? '';
  $datum = $form['datum'] ?? '';
  $slika = $form['slika'] ?? '';
  $clanek = $form['clanek'] ?? '';
  $celina_id = $form['celina_id'] ?? '';
}

ob_start(); ?>

<h2>Uredi članke</h2>

<form action="./ureditev-clanka" method="POST">
  <input type="hidden" name="id" value="<?php echo $id; ?>" readonly>

  <div class="vrstica">
    <label for="naslov">Naslov:</label>
    <input type="text" name="naslov" value="<?php echo $naslov; ?>">
  </div>
  <div class="vrstica">
    <label for="datum">Datum:</label>
    <input type="date" name="datum" value="<?php echo $datum; ?>">
  </div>
  <div class="vrstica">
    <label for="slika">Slika:</label>
    <input type="text" name="slika" value="<?php echo $slika; ?>">
  </div>
  <div class="vrstica">
    <label for="celina_id">Celina:</label>
    <select name="celina_id">
      <option value="" selected disabled hidden>--- Izberi celino ---</option>
      <?php foreach ( $celine_seznam as $celina ) : ?>
        <option value="<?php echo $celina['id']; ?>" <?php echo $celina_id == $celina['id'] ? 'selected' : ''; ?>>
          <?php echo $celina['ime']; ?>
        </option> 
      <?php endforeach; ?>
    </select>
  </div>
  <div class="vrstica">
    <label for="clanek">Članek:</label>
    <textarea name="clanek"><?php echo $clanek; ?></textarea>
  </div>
  <input type="submit" value="Posodobi">

</form>


<?php

$html = ob_get_clean();
