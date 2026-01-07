<?php

define( 'varovalka', true );

// naslov spletne strani
$naslov = "Življenje v naravi";

// datum v nogi, upošteva slovenski časovni pas
date_default_timezone_set("Europe/Ljubljana");
$datumVnogi = danVtednu() . ", " . date("j. F Y H:i");

function danVtednu () {
  $slovarDnevov = [
    "nedelja",
    "ponedeljek",
    "torek",
    "sreda",
    "četrtek",
    "petek",
    "sobota",
  ];

  $indexDanasnjegaDne = date("w");

  $danasnjiDan = $slovarDnevov[$indexDanasnjegaDne];
  
  return $danasnjiDan;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $naslov; ?></title>
    <link rel="stylesheet" href="slogi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>

    <div class="okvir">
        <header>
            <img src="./slike/hp-white.svg" alt="Logo">
            <h1><?php echo $naslov; ?></h1>
        </header>
        <nav>
            <ul>
                <li><a href="./">Domov</a></li>
                <li><a class="active" href="./vsebina.html">Vsebina</a></li>
                <li><a href="./kontakt.html">Kontakt</a></li>
                <li><a href="./literatura.html">Literatura</a></li>
            </ul>
        </nav>
        <div class="vsebina">
            <main>

                <?php 

                $vsebina = [
                    [ 'id' => 1, 'naslov' => 'Medvedi', 'datum' => '3. december 2025', 'slika' => 'medved.jpg', 'clanek' => 'Medvedi (znanstveno ime Ursidae) so veliki sesalci iz reda zveri. Vsi so krepkega telesa, z veliko lobanjo, močnimi nogami in kratkim repom. Živijo v Evraziji in Severni Ameriki ter v delih Severne Afrike in Južne Amerike. Večinoma so gozdne živali. V nasprotju z večino zveri uživajo veliko rastlinske hrane. Medtem ko je polarni medved večinoma mesojedec, orjaški panda pa se hrani skoraj v celoti z bambusom, je preostalih šest vrst vsejedih z različnim prehranjevanjem. Z izjemo posameznikov, ki se parijo in materami s svojimi mladiči, so medvedi ponavadi samotarske živali. Lahko so dnevne ali nočne živali in imajo odličen voh. Kljub njihovi težki gradnji in nerodni hoji, so medvedi spretni tekači, plezalci in plavalci. Medvedi uporabljajo zatočišča, kot so jame in hlodi, za svoje brloge; večina vrst medvedov je v brlogu v zimskem času za daljše obdobje hibernacije do 100 dni.' ],
                    [ 'id' => 2, 'naslov' => 'Navadna lisica', 'datum' => '14. december 2025', 'slika' => 'lisica.jpg', 'clanek' => 'Navádna lisíca ali rdéča lisíca (znanstveno ime Vulpes vulpes) je zelo prilagodljiv sesalec iz družine psov (Canidae) saj naseljuje različne življenjske prostore. Naseljuje predele Evrope, Severne Amerike, Severne Afrike in večjega dela Azije. Navadna lisica ima okrog 50 podvrst, s številnimi barvnimi različicami kožuha. Ima podolgovato vitko telo, na glavi pa zelo gibljiva šilasta uhlja in ozek koničast smrček z redkimi dolgimi dlakami. Rep je dolg in košat, na koncu bel. Kožuh je rdeče-rjave barve, vrat in trebuh sta bela, spodnji del nog in konca uhljev pa temni. Telo je dolgo od 60 do 90 cm, rep od 35 do 50 cm; odrasli samci tehtajo do 10 kg. Živi v gozdnih predelih, ponekod v gorah. Zelo pogosto se zadržuje v bližini človeških naselij, tudi ob velikih mestih. Je zelo spretna in hitra. Okrog hodi v glavnem ponoči in lovi plen, išče odpadke in mrhovino. Hrani se z vsem, kar lahko ulovi, od majhnih sesalcev, žuželk, plazilcev, ptic, mrhovine, jagod ... Živi posamezno, redkeje v manjši skupini, in sicer v tleh v brlogu, do katerega izkoplje več izhodov. Pari se enkrat do dvakrat letno, navado pozimi. Brejost traja 52 dni, spomladi skoti od 4 do 8 mladičev (največ 12), ki se osamosvojijo po približno štirih mesecih. Ti tehtajo od 60 do 150 g. Lisjak pomaga pri vzreji.' ],
                    [ 'id' => 3, 'naslov' => 'Ris', 'datum' => '25. december 2025', 'slika' => 'ris.jpg', 'clanek' => 'Risi (znanstveno ime Lynx) spadajo v družino mačk. Spada med zveri, tako kot tudi medved in volk. To so kratkorepe mačke na visokih nogah. Na konici uhljev imajo čop dlak, katerega pri drugih mačkah ni. Poznamo več vrst risov, ki poseljujejo Severno Ameriko, Evrazijo in Afriko. Na Slovenskem živi le ena vrsta, to je (navadni) ris. Ris je izjemno redka žival, poseljuje pa precejšne dele našega planeta. Hkrati je izredno plah in le redki ga vidijo v naravi. Lovi pretežno ponoči, podnevi pa počiva.' ],
                    [ 'id' => 4, 'naslov' => 'Jelka', 'datum' => '5. januar 2026', 'slika' => 'jelka.jpg', 'clanek' => 'Jélka (znanstveno ime Abies) je rod v družini borovk. Obsega 45-55 vedno zelenih vrst iglastih dreves. Pogosto raste na apnenčasti podlagi, kjer je veliko zračne vlage. Storži so pokončni, iglice rastejo v obe smeri. Vsa odrasla drevesa dosežejo višino 10-80 m in obseg debla 0.5-4 m. Krošnja je pri odrasli jelki ovalna, v starosti pa sploščena. Iglice so dolge 15 - 30 mm, razporejene v dveh vrstah, ploske, zgoraj bleščeče temno zelene, spodaj z dvema belima progama. Storži so pokončni, dolgi 10 - 16 cm in razpadejo na drevesu. Skorja je belo siva, pri mlajših drevesih gladka, s smolnimi grčami, pri starejših primerkih razpokana in hrapava. Les je rdečkasto bele ali skoraj bele barve z modrikastim odtenkom. Branike so izrazite.' ],
                    [ 'id' => 5, 'naslov' => 'Goba', 'datum' => '7. januar 2026', 'slika' => 'gobe.jpg', 'clanek' => 'Goba je mesnato, od nekaj milimetrov do več 10 centimetrov veliko plodišče nekaterih vrst gliv (Mycophyta), v katerem nastajajo spore. Z izrazom goba lahko imenujemo tudi celotni organizem s takim plodiščem (Macromycetes). Gobe živijo kot gniloživke (saprofiti), zajedavke (paraziti) ali v sožitju (simbiozi) z drugimi organizmi. Gobe gniloživke si energijo in potrebne organske snovi priskrbijo tako, da razkrajajo odmrle organske ostanke. Gobe, kot skupina organizmov z makroskopskim plodiščem, niso sistematska kategorija, saj si niso vse v ožjem sorodu. Med gobe prištevamo nekatere zaprtotrosnice (Ascomycetes), npr. užitne smrčke in gomoljike, kot tudi nekatere prostotrosnice (Basidiomycetes), npr. jurčke, lisičke in mušnice. Vendar pa med gobe ne uvrščamo tistih zaprtotrosnic, ki ne tvorijo makroskopskih plodišč, kot so npr. pivski kvas (Saccharomyces cerevisiae) in črna krušna plesen (Rhizopus nigricans). Tudi nekatere prostotrosnice ne tvorijo makroskopskih plodišč in jih zato ne uvrščamo med gobe. Taka je npr. žitna rja (Puccinia graminis) in koruzna snet (Ustilago maydis).' ],
                ];
                
                $naloga = $_GET['naloga'] ?? NULL;
                $id = $_GET['id'] ?? NULL;

                if ($naloga === 'clanek' && $id !== NULL) {
                    include_once "clanek.php";
                } else {
                    include_once "vsebina.php";
                }
                
                ?>
                
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