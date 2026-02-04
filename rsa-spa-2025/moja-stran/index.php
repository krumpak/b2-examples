<?php

define( 'varovalka', true );

session_start();

include_once "library.php";
include_once "database.php";

// naslov spletne strani
$naslov = "Življenje v naravi";
$title = $naslov;
$aktivnost = "domov";
$html = "";

$obvestilo = $_SESSION['obvestilo'];
$_SESSION['obvestilo'] = NULL;

// datum v nogi, upošteva slovenski časovni pas
date_default_timezone_set("Europe/Ljubljana");
$datumVnogi = danVtednu() . ", " . date("j. F Y H:i");
                
$naloga = $_GET['naloga'] ?? NULL;
$id = $_GET['id'] ?? NULL;

if (! preg_match( '/^\d+$/', $id )) {
    $id = NULL;
}

if ($naloga === 'nov-clanek' && ($_SESSION['auth'] ?? false) === true) {
    include_once "_dodaj-clanek.php";
} else if ($naloga === 'vnos-clanka' && ($_SESSION['auth'] ?? false) === true) {
    include_once "_vnos-clanka.php";
} else if ($naloga === 'clanek' && $id !== NULL && ($_SESSION['auth'] ?? false) === true) {
    include_once "_clanek.php";
} else if ($naloga === 'clanki' && $id === NULL) {
    include_once "_clanki.php";
} else if ($naloga === 'kontakt' && $id === NULL) {
    include_once "_kontakt.php";
} else if ($naloga === 'obdelava-podatkov' && $id === NULL) {
    include_once "_obdelava-podatkov.php";
} else if ($naloga === 'literatura' && $id === NULL) {
    include_once "_literatura.php";
} else if ($naloga === 'prijava' && $id === NULL) {
    include_once "_prijava.php";
} else if ($naloga === 'odjava' && $id === NULL) {
    include_once "_odjava.php";
} else {
    include_once "_domov.php";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo env('APP_URL'); ?>">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="slogi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>

    <div class="obvestilo">
        <?php echo $obvestilo; ?>
    </div>
    
    <div class="okvir">
        <header>
            <img src="./slike/hp-white.svg" alt="Logo">
            <h1><?php echo $naslov; ?></h1>
        </header>
        <nav>
            <ul>
                <li><a class="<?php echo $aktivnost === 'domov' ? 'active' : ''; ?>" href="./">Domov</a></li>
                <li><a class="<?php echo $aktivnost === 'clanki' ? 'active' : ''; ?>" href="./clanki">Članki</a></li>
                <li><a class="<?php echo $aktivnost === 'kontakt' ? 'active' : ''; ?>" href="./kontakt">Kontakt</a></li>
                <li><a class="<?php echo $aktivnost === 'literatura' ? 'active' : ''; ?>" href="./literatura">Literatura</a></li>
                <li><a class="<?php echo $aktivnost === 'prijava' ? 'active' : ''; ?>" href="./prijava">Prijava</a></li>
                <li><a class="<?php echo $aktivnost === 'odjava' ? 'active' : ''; ?>" href="./odjava">Odjava</a></li>
                <li><a><?php echo $_SESSION['ime'] ?? ''; ?></a></li>
            </ul>
        </nav>
        <div class="vsebina">
            <main>

                <?php echo $html; ?>
                
            </main>
            <aside>
                <ul>
                    <li><a href="https://facebook.com" target="_blank">
                        <img src="./slike/facebook.png" alt="Facebook">
                        <b>Facebook</b>
                    </a></li>
                    <li><a href="https://x.com" target="_blank">
                        <img src="./slike/x.png" alt="X">
                        <b>X</b>
                    </a></li>
                    <li><a href="https://instagram.com" target="_blank">
                        <img src="./slike/instagram.webp" alt="Instagram">
                        <b>Instagram</b>
                    </a></li> 
                    <li><a href="https://youtube.com" target="_blank">
                        <img src="./slike/youtube.webp" alt="YouTube">
                        <b>YouTube</b>
                    </a></li>
                </ul>
            </aside>
        </div>
        <footer>
            &#169;
            <?php echo $datumVnogi; ?>
            <a href="./">www.moja-stran.si</a>
        </footer>
    </div>

</body>
</html>