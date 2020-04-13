<?php
// zanke
/*
  $i = $i + 1
  $i += 10
  $i++
  $i = $i - 1
  $i -= 1
  $i--
  $i = $i . 1
  $i .= 1
*/
//$prestopno_leto += 4;  // 2001, 2005

  function danTedna ($datum) {

    $formatiranDatum = date_create_from_format('j. n. Y', $datum);

    $danVtednu = $formatiranDatum->format('l');//date('j. n. Y H:i:s', $datum);

    $koledarcek = array(
      'Monday'    => 'pon',
      'Tuesday'   => 'tor',
      'Wednesday' => 'sre',
      'Thursday'  => 'čet',
      'Friday'    => 'pet',
      'Saturday'  => 'sob',
      'Sunday'    => 'ned'
    );
    
    $koledarcek = array('pon', 'tor', 'sre', 'čet', 'pet', 'sob', 'ned');

    $imeDneva = $koledarcek[$danVtednu];

    return $imeDneva . '., ' . $datum;
  }

function mojeLeto ($leto, $dnevniVtednu = false) {
  for ($mesec = 1; $mesec <= 12; $mesec++) {

    $st_dni = 31;
    if ($mesec == 4 || $mesec == 6 || $mesec == 9 || $mesec == 11) {
      $st_dni = 30;
    } elseif ($mesec == 2 && ($leto % 4) != 0) {
      $st_dni = 28;
    } elseif ($mesec == 2 && ($leto % 4) == 0) {
      $st_dni = 29;
    }

    for ($dnevi = 1; $dnevi <= $st_dni; $dnevi++) {
      echo danTedna ($dnevi . '. ' . $mesec . '. ' . $leto) . '<br>';
    }
  }
}

  mojeLeto(2020);
  mojeLeto(2021);









?>