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

function YMD_to_DMY ($datum) {
  return date('j. n. Y', strtotime($datum));
}
