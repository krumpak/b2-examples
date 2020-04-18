<?php

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $username = sha1($_POST['username']);
    $password = sha1($_POST['password']);

    $json = file_get_contents('http://students.b2.eu/udelezenec02/api/?task=prijava&username='.$username.'&password='.$password);

    $result = json_decode($json, true);
  } else {
    $username = '';
    $password = '';
  }


?>
<h1>Prijava</h1>

<form method="post">
  <input type="hidden" id="task" name="task" value="prijava"><br>
  Uporabniško ime: <input type="text" id="username" name="username" value="miha.se@gmail.com"><br>
  Geslo: <input type="password" id="password" name="password" value="geslo123"><br>
  <input type="submit" value="Prijava">
</form>
<?= $result['message']; ?>