<?php
  if ( ! defined( 'varovalka' ) ) {
    die( '403' );
  }

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) :

    try {
      $update = $conn->prepare( "UPDATE udelezenec02.imdb_osebe SET ime=:ime, priimek=:priimek, kraj_id=:kraj, zanri=:zanri, ocena=:ocena, filmi=:filmi, nagrade=:nagrade, updated_at=now() WHERE id = :id AND status = 1" );
      $update->execute( array(
        ":id"      => intval( $_POST['id'] ),
        ":ime"     => $_POST['ime'],
        ":priimek" => $_POST['priimek'],
        ":kraj"    => intval( $_POST['kraj'] ),
        ":zanri"   => $_POST['zanri'],
        ":ocena"   => intval( $_POST['ocena'] ),
        ":filmi"   => $_POST['filmi'],
        ":nagrade" => $_POST['nagrade']
      ) );

      $_SESSION['message'] = array(
        'text' => 'Uspešno posodobljeni podatki',
        'type' => 'success'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/app/view/' . intval( $_POST['id'] ) );
    } catch ( PDOException $e ) {
      $_SESSION['message'] = array(
        'text' => $e->getMessage(),
        'type' => 'error'
      );
    }

  endif;

  try {
    $sql = $conn->prepare( "SELECT * FROM udelezenec02.imdb_osebe WHERE id = :id AND status = 1 LIMIT 1" );
    $sql->execute( array( ':id' => intval( $_GET['id'] ) ) );
    $en = $sql->fetch();

    $kraji = $conn->query( "SELECT * FROM udelezenec02.imdb_kraji ORDER BY kraj ASC" )->fetchAll();

    if ( empty( $en ) || empty( $kraji ) ) {
      $_SESSION['message'] = array(
        'text' => 'Ni podatkov',
        'type' => 'error'
      );

      header( 'Location: ' . getvar( 'APP_URL' ) . '/app/' );
    }
  } catch ( PDOException $e ) {
    $_SESSION['message'] = array(
      'text' => $e->getMessage(),
      'type' => 'error'
    );
  }
?>
<h2>Uredi podatke igralca/igrallke</h2>
<a class="btn btn-outline-primary btn-sm" href="<?= getvar( 'APP_URL' ); ?>/app/view/<?= intval( $_GET['id'] ); ?>"><i class="fa fa-external-link" aria-hidden="true"></i></a>
<button class="btn btn-outline-danger btn-sm" id="izbrisi"><i class="fa fa-trash" aria-hidden="true"></i></button>
<a class="btn btn-danger btn-sm" id="izbrisi-ok" style="display: none;" href="<?= getvar( 'APP_URL' ); ?>/app/delete/<?= intval( $_GET['id'] ); ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
<button class="btn btn-primary btn-sm" id="izbrisi-cancel" style="display: none;"><i class="fa fa-times" aria-hidden="true"></i></button>
<script>
  $(function () {
    $('#izbrisi').click(function () {
      $('#izbrisi').hide();
      $('#izbrisi-ok').show();
      $('#izbrisi-cancel').show();
    })
    $('#izbrisi-cancel').click(function () {
      $('#izbrisi').show();
      $('#izbrisi-ok').hide();
      $('#izbrisi-cancel').hide();
    })
  })
</script>

<form method="POST">
  <input type="hidden" name="zeton" id="zeton" value="">
  <input type="hidden" name="id" id="id" value="<?= $en['id']; ?>">

  <div class="form-group row">
    <label for="ime" class="col-sm-2 col-form-label">Ime:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="ime" id="ime" value="<?= $en['ime']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="priimek" class="col-sm-2 col-form-label">Priimek:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="priimek" id="priimek" value="<?= $en['priimek']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="kraj" class="col-sm-2 col-form-label">Kraj:</label>
    <div class="col-sm-10">
      <select class="form-control" name="kraj" id="kraj">
        <?php foreach ( $kraji as $kraj ) : ?>
          <option value="<?= $kraj['kraj_id'] ?>" <?= $en['kraj_id'] == $kraj['kraj_id'] ? 'selected' : ''; ?>><?= $kraj['kraj'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="zanri" class="col-sm-2 col-form-label">Žanri:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="zanri" id="zanri" value="<?= $en['zanri']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="ocena" class="col-sm-2 col-form-label">Ocena:</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="ocena" id="ocena" min="0" max="10" value="<?= $en['ocena']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="filmi" class="col-sm-2 col-form-label">Filmi:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="filmi" id="filmi" value="<?= $en['filmi']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="nagrade" class="col-sm-2 col-form-label">Nagrade:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="nagrade" id="nagrade" value="<?= $en['nagrade']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="created_at" class="col-sm-2 col-form-label">Ustvarjeno:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="created_at" id="created_at" value="<?= date( 'j. n. Y, G:i:s', strtotime( $en['created_at'] ) ); ?>" disabled>
    </div>
  </div>

  <div class="form-group row">
    <label for="updated_at" class="col-sm-2 col-form-label">Posodobljeno:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="updated_at" id="updated_at" value="<?= date( 'j. n. Y, G:i:s', strtotime( $en['updated_at'] ) ); ?>" disabled>
    </div>
  </div>
  <br>
  <input class="btn btn-primary btn-block btn-lg" type="submit" value="Posodobi">
</form>
