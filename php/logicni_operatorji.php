<?php

  $temperature = 3;
  $temperature_od = 0;
  $temperature_do = 4;

  if ($temperature >= $temperature_od && $temperature <= $temperature_do) {
    echo 'Nevarnost pozebe.';
  } else {
    echo 'Temperatura ugodna za sadje in zelenjavo.';
  }










  $temperature = -13;
  $temperature_min = 0;
  $temperature_max = 4;

  if ($temperature > $temperature_max || $temperature < $temperature_min) {
    echo '<br>Ni nevarnosti pozebe.';
  } else {
    echo '<br>Temperatura NI ugodna za sadje in zelenjavo.';
  }

  /*
  true && true && true && true && true = true
  false && true = false
  true && fasle = false
  false && false = false

  true || true = true
  true || false || false || false || false = true
  false || false = false

  ! false = true
  ! true = false
  */



















?>