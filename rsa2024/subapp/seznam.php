<?php

  if ( ! defined('varovalka') ) {
    header('Location: index.php');
    die('Stran ni dosegljiva direktno.');
  }

?>

<h1><?php echo $title; ?></h1>

<?php

  $clani = [
    [
      'ime'  => 'Albert',
      'teza' => 99,
      'visina' => 1.80
    ],
    [
      'ime'  => 'Bine',
      'teza' => 75,
      'visina' => 1.75
    ],
    [
      'ime'  => 'Cene',
      'teza' => 72,
      'visina' => 1.73
    ],
    [
      'ime'  => 'Črt',
      'teza' => 95,
      'visina' => 1.89
    ],
    [
      'ime'  => 'Dani',
      'teza' => 55,
      'visina' => 1.77
    ],
    [
      'ime'  => 'Evgen',
      'teza' => 66,
      'visina' => 1.99
    ]
  ];

  for ($i = 0; $i < count($clani); $i++) {
    $podatki = $clani[$i];
    $teza = $podatki['teza'];
    $visina = $podatki['visina'];

    $itm = izracun_ITM($teza, $visina);
    $skala = skala($itm);

    $clani[$i]['itm'] = $itm;
    $clani[$i]['skala'] = $skala;
  }

?>

<ol>
<?php foreach ($clani as $clan) { ?>
  <li>
    <strong><?php echo $clan['ime']; ?></strong> - <?php echo $clan['itm']; ?> (<?php echo $clan['skala']; ?>)
  </li>
  <?php }; ?>
</ol>