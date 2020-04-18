<?php

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $json = file_get_contents( 'http://students.b2.eu/udelezenec02/api/?task=prijava&username=' . sha1( $username ) . '&password=' . sha1( $password ) );

    $result = json_decode( $json, true );
  } else {
    $username = '';
    $password = '';
  }
?>
<h1>Prijava</h1>

<form method="post">
  <input type="hidden" id="task" name="task" value="prijava"><br>
  Uporabniško ime: <input type="text" id="username" name="username" value="<?= $username; ?>"><br>
  Geslo: <input type="password" id="password" name="password" value="<?= $password; ?>"><br>
  <input type="submit" value="Prijava">
</form>

<?php if ( isset( $result ) ) : ?>
  <span style="color:<?= $result['status'] === 'error' ? 'red' : 'green'; ?>;">
    <?= $result['message']; ?>
  </span>
<?php endif; ?>
