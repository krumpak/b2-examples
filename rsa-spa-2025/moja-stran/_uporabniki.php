<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

$sql = $conn->prepare('SELECT * FROM uporabniki');
$sql->execute();
$uporabniki = $sql->fetchAll();
$conn = NULL;

$title = 'Uporabniki .::. ' . $naslov;

$aktivnost = 'uporabniki';

ob_start();

if ( count($uporabniki) === 0 ) :

  echo "ni uporabnikov";

else : ?>

  <div>
    <h2>Uporabniki</h2>
    
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Ime</th>
          <th>Email</th>
          <th>Vloga</th>
          <th>Aktivnost</th>
          <th colspan="2">Datum</th>
        </tr>
      </thead>
      <tbody>

    <?php foreach ( $uporabniki as $uporabnik ) : ?>

      <tr>
        <td><?php echo $uporabnik['id']; ?></td>
        <td><?php echo $uporabnik['ime']; ?></td>
        <td><?php echo $uporabnik['email']; ?></td>
        <td><?php echo $uporabnik['vloga']; ?></td>
        <td><input type="checkbox" <?php echo $uporabnik['aktivnost'] == 1 ? 'checked' : ''; ?> disabled></td>
        <td><?php echo $uporabnik['timestamp']; ?></td>
        <td>
          <a href="./uredi-uporabnika/<?php echo $uporabnik['id']; ?>" class="gumb">
            Uredi
          </a>
          <a href="./izbrisi-uporabnika/<?php echo $uporabnik['id']; ?>" class="gumb">
            Izbriši
          </a>
        </td>
      </tr>

    <?php endforeach; ?>

    </tbody>
  </table>
</div>

<?php endif;

if (($_SESSION['auth'] ?? false) === true) : ?>

  <a class="gumb" href="./registracija">
    Dodaj novega uporabnika
  </a>

<?php endif;

$html = ob_get_clean();
