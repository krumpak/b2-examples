<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$title = 'Nov članek .::. ' . $naslov;

$aktivnost = 'clanki';

$form = $_SESSION['form'] ?? NULL;
$_SESSION['form'] = NULL;

$naslov = $form['naslov'] ?? '';
$datum = $form['datum'] ?? '';
$slika = $form['slika'] ?? '';
$clanek = $form['clanek'] ?? '';
$celina_id = $form['celina_id'] ?? '';

$sql = $conn->prepare('SELECT * FROM celine ORDER BY ime ASC');
$sql->execute();
$celine_seznam = $sql->fetchAll();
$conn = NULL;

ob_start(); ?>

<h2>Nov članek</h2>

<form action="./vnos-clanka" method="POST">
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
  <input type="submit" value="Pošlji">

</form>


<?php

$html = ob_get_clean();
