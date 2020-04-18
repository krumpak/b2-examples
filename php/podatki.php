<?php

  // ime, priimek, email, naslov, pošta, kreditna



  $kupci = array(
    array(
      'ime' => 'Miha',
      'priimek' => 'Kopač',
      'email' => 'miha.se@gmail.com',
      'naslov' => array(
        'ulica' => 'Slovenska cesta',
        'hisna_st' => '3',
        'postna_st' => '1000',
        'posta' => 'Ljubljana'
      ),
      'kreditna' => 'mastercard',
      'kreditna_st' => '0123 6547 7896'
    ),
    array(
      'ime' => 'Metka',
      'priimek' => 'Novak',
      'email' => 'metka.novak@gmail.com',
      'naslov' => array(
        'ulica' => 'Slovenska ulica',
        'hisna_st' => '13',
        'postna_st' => '2000',
        'posta' => 'Maribor'
      ),
      'kreditna' => 'Visa',
      'kreditna_st' => '0654 7891 3578'
    )
  );

  $nov_kupec = array(
    'ime' => 'Peter',
    'priimek' => 'Sabotin',
    'email' => 'peter123@gmail.com',
    'naslov' => array(
      'ulica' => 'Primorska ulica',
      'hisna_st' => '44',
      'postna_st' => '5000',
      'posta' => 'Nova Gorica'
    ),
    'kreditna' => 'American Express',
    'kreditna_st' => '6548 9815 3578'
  );

  $se_en_kupec = array(
    'ime' => 'Saša',
    'priimek' => 'Potočnik',
    'email' => 'sasa5@gmail.com',
    'naslov' => array(
      'ulica' => 'Južna cesta',
      'hisna_st' => '8',
      'postna_st' => '6000',
      'posta' => 'Nov mest'
    ),
    'kreditna' => 'American Express',
    'kreditna_st' => '6548 9815 3578'
  );

  array_push($kupci, $se_en_kupec, $nov_kupec);

//  $kupci[] = $se_en_kupec;
//  $kupci[] = $nov_kupec;

  // uporabite for zanko za izpis imena in priimka osebe na zaslonu.
  // izpišite obe osebi,
  // vsako v svoji vrstici

//  for ($i = 0; $i < count($kupci); $i++) {
//    echo ($i + 1) . '. ' . $kupci[$i]['ime'] . ' ' . $kupci[$i]['priimek'] . '<br>';
//  }
//
//  foreach($kupci as $index => $stranka) {
//    echo ($index + 1) . '. ' . $stranka['ime'] . ' ' . $stranka['priimek'] . '<br>';
//  }

?>
<!doctype html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <title>Seznam strank</title>
  <style>
    table { border-collapse: collapse; }
    th, td {
      border: 1px solid grey;
      padding: 5px;
      text-align: left;
    }
  </style>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Ime Priimek</th>
        <th>Naslov</th>
        <th>Pošta</th>
        <th>Kreditna kartica</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($kupci as $index => $stranka) : ?>
      <tr>
        <td><?= ($index + 1); ?></td>
        <td><?= $stranka['ime']; ?> <?= $stranka['priimek']; ?></td>
        <td><?= $stranka['naslov']['ulica']; ?> <?= $stranka['naslov']['hisna_st']; ?></td>
        <td><?= $stranka['naslov']['postna_st']; ?> <?= $stranka['naslov']['posta']; ?></td>
        <td><?= $stranka['kreditna']; ?> [<?= $stranka['kreditna_st']; ?>]</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
