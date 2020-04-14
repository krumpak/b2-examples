<?php
  if( ! defined('varovalka') ){
    die('403');
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= getvar('TITLE'); ?></title>
  <style>
    .nav {
      list-style-type: none;
      display: flex;
      margin: 5px auto;
      align-items: center;
    }
    .nav li {
      padding: 5px 10px;
    }
    .nav li:hover {
      background-color: #ccc;
    }
  </style>
</head>
<body>
<?php
  $nav = array();
  $nav[] = array( 'url' => './izpis.php', 'label' => 'izpis' );

  if ( isset( $_SESSION['login'] ) && $_SESSION['login'] ) {
    $nav[] = array( 'url' => './domov.php', 'label' => 'domov' );
    $nav[] = array( 'url' => './odjava.php', 'label' => 'odjava' );
    $nav[] = array( 'url' => '#', 'label' => $_SESSION['vzdevek'] );
  } else {
    $nav[] = array( 'url' => './interaktivnost.php', 'label' => 'prijava' );
  }

  $izpis = array();
  foreach ($nav as $e) {
    $izpis[] = '<li><a href="'.$e['url'].'">'.$e['label'].'</a></li>';
  }

  $navigacija = implode(' | ', $izpis);

  echo '<ul class="nav">' . $navigacija . '</ul>';
?>