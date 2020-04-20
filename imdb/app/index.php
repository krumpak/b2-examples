<?php
  define( 'varovalka', true );

  include_once './shared.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seznam filmskih igralcev</title>
</head>
<body>
<a href="<?= getvar('APP_URL'); ?>/app/">Seznam</a><hr><br>
<?php
  if ( isset( $_GET['vec'] ) && $_GET['vec'] >= 0 ) :

    $raw = file_get_contents( getvar('APP_URL') . '/api/?igralec=' . intval( $_GET['vec'] ) );

    $en = json_decode( $raw, true );

    ?>
    <!-- Več o posamezneme igralcu ali igralki -->
    Samo en igralec/igralka
    <table>
      <tr>
        <td>Ime:</td>
        <td><?= $en['ime']; ?></td>
      </tr>
      <tr>
        <td>Priimek:</td>
        <td><?= $en['priimek']; ?></td>
      </tr>
      <tr>
        <td>Žanri:</td>
        <td><?= implode( ', ', $en['zanri'] ); ?></td>
      </tr>
      <tr>
        <td>Filmi:</td>
        <td>
          <?php // alternativa vrstici 36
            foreach ($en['filmi'] as $index => $film) {
              echo ($index === 0 ? '' : ', ') . $film;
            }
          ?>
        </td>
      </tr>
    </table>

  <?php else :

    // pokličemo surove podatke
    $raw = file_get_contents( getvar('APP_URL') . '/api/' );

    // surove podatke pretvorimo v asociativni array
    $array = json_decode( $raw, true );

    ?>

    <!-- Cel seznam vseh igralcev -->
    Cel seznam
    <table>
      <?php foreach ( $array as $index => $igralec ) : ?>
        <tr>
          <td><?= $index + 1; ?></td>
          <td><?= $igralec['ime'] ?></td>
          <td><?= $igralec['priimek'] ?></td>
          <td><a href="<?= getvar('APP_URL'); ?>/app/?vec=<?= $index; ?>">Preberi več</a></td>
        </tr>
      <?php endforeach; ?>
    </table>

  <?php endif; ?>

</body>
</html>
