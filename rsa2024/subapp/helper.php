<?php

  function izracun_ITM($teza, $visina) {
    $itm = $teza / ($visina * $visina);

    return round($itm, 2);
  }

  function skala($itm) {
    if ( $itm < 18.5 ) {
      return 'Podhranjenost';
    } elseif ( $itm < 24.9 ) {
      return 'Normalna teža';
    } elseif ( $itm < 29.9 ) {
      return 'Prekomerna teža';
    } else {
      return 'Debelost';
    }

  }

?>