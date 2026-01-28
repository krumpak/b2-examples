<?php

if ( ! defined( 'varovalka' ) ) {
  exit( '403' );
}

function env ($polje, $default = NULL, $pot = __DIR__ . '/.env') {
  static $env = NULL;

  if ($env === NULL) {
    if ( !file_exists($pot) ) {
      return $default;
    }

    $env = [];
    $vrstice = file($pot, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($vrstice as $vrstica) {
      // ignoriraj komentarje
      // php v8+: if (str_starts_with(trim($line), '#')) {
      if (strpos(trim($vrstica), '#') === 0) {
        continue;
      }

      // razbij vrstico na polje in vrednost
      [$ime, $vrednost] = array_pad(explode('=', $vrstica, 2), 2, null);

      // počisti presledke spredaj in zadaj
      $ime = trim($ime);
      $vrednost = trim($vrednost);

      // odstrani komentarje
      $vrednost = trim($vrednost, "\"'");

      // shrani key/value par v $env niz
      $env[$ime] = $vrednost;
    }
  }

  // vrni vrednost (ali njen fallback) za točno določeno polje
  return $env[$polje] ?? $default;

}

$servername = env('DB_HOST', 'localhost');
$username = env('DB_USERNAME');
$password = env('DB_PASSWORD');
$dbname = env('DB_NAME');

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>