<?php

  $kupci = array(
    array(
      'id'          => 954,
      'ime'         => 'Miha',
      'priimek'     => 'Kopač',
      'email'       => 'miha.se@gmail.com',
      'geslo'       => sha1( 'geslo123' ),
      'naslov'      => array(
        'ulica'     => 'Slovenska cesta',
        'hisna_st'  => '3',
        'postna_st' => '1000',
        'posta'     => 'Ljubljana'
      ),
      'kreditna'    => 'mastercard',
      'kreditna_st' => '0123 6547 7896'
    ),
    array(
      'id'          => 44,
      'ime'         => 'Metka',
      'priimek'     => 'Novak',
      'email'       => 'metka.novak@gmail.com',
      'geslo'       => sha1( 'password1' ),
      'naslov'      => array(
        'ulica'     => 'Slovenska ulica',
        'hisna_st'  => '13',
        'postna_st' => '2000',
        'posta'     => 'Maribor'
      ),
      'kreditna'    => 'Visa',
      'kreditna_st' => '0654 7891 3578'
    )
  );

  if ( isset( $_GET['kupec'] ) && isset( $_GET['id'] ) && $_GET['kupec'] === 'kupec' && preg_match( '/^\d+$/', $_GET['id'] ) ) {
    //students.b2.eu/udelezenec02/api/kupec/1
    $id = (int) $_GET['id'];

    $data = array( 'status' => 'error', 'code' => 404, 'data' => null, 'message' => 'No data' );

    foreach ( $kupci as $kupec ) {
      if ( $kupec['id'] === $id ) {
        $data = array( 'status' => 'success', 'code' => 200, 'data' => $kupec, 'message' => null );
      }
    }

  } else if ( isset( $_GET['task'] ) && isset( $_GET['username'] ) && isset( $_GET['password'] ) ) {
    //students.b2.eu/undelezenec02/api/prijava/ime@email.com/geslo

    $data = array( 'status' => 'error', 'code' => 404, 'data' => null, 'message' => 'Uporabnik ne obstaja' );

    foreach ( $kupci as $kupec ) {
      if ( sha1( $kupec['email'] ) === $_GET['username'] && $_GET['password'] === $kupec['geslo'] ) {
        $data = array( 'status' => 'success', 'code' => 200, 'data' => $kupec, 'message' => 'uspešno ste se prijavili' );
      } else if ( sha1( $kupec['email'] ) === $_GET['username'] && $_GET['password'] !== $kupec['geslo'] ) {
        $data = array( 'status' => 'error', 'code' => 404, 'data' => null, 'message' => 'Geslo ni pravilno' );
      }
    }
  } else {
    //students.b2.eu/udelezenec02/api/
    $data = $kupci;
  }

  header( 'Content-Type: application/json' );

  echo json_encode( $data );

?>