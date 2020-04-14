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
    $izpis[] = '<a href="'.$e['url'].'">'.$e['label'].'</a>';
  }

  $navigavija = implode(' | ', $izpis);

  echo $navigavija;
?>