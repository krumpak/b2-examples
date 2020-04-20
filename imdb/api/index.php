<?php

  $id = null;

  if ( isset( $_GET['igralec'] ) ) {
    $id = intval($_GET['igralec']);
  }

  /* Filmski irgralci
   *
   * ime
   * priimek
   * kraj
   * žanri
   * ocena
   * filmi
   * nagrade
   *
   * */

  $igralci = array(
    array(
      'ime'     => 'Scarlett',
      'priimek' => 'Johansson',
      'kraj'    => 'Los Angeles',
      'zanri'   => array( 'Akcija', 'Sci-Fi', 'Romantična komedija' ),
      'ocena'   => 2,
      'filmi'   => array( 'Sam doma 3', 'Irona man 2', 'Stotnik Amerika' ),
      'nagrade' => array( 'Zlati globus', 'BAFTA' )
    ),
    array(
      'ime'     => 'Johnny',
      'priimek' => 'Depp',
      'kraj'    => 'Los Angeles',
      'zanri'   => array( 'Akcija', 'Sci-Fi' ),
      'ocena'   => 8,
      'filmi'   => array( 'Pirati s Karibov', 'Edvard Škarje', 'Alica v čudežni deželi' ),
      'nagrade' => array( 'MTV Movie Awards', 'Zlati globus' )
    )
  );

  if ( $id !== null && $id >= 0 ) {
    // samo en igralec
    $podatki = $igralci[$id];
  } else {
    // vsi igralci
    $podatki = $igralci;
  }

  // vrnemo točno določeno vrsto datoteke -> JSON
  header( 'Content-Type: application/json' );

  echo json_encode( $podatki );
?>