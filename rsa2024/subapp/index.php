<?php

  define( 'varovalka', true );

  $title = '';
  $file = '';

if (isset($_GET['podstran']) && $_GET['podstran'] == 'kontakt') {
  $title = 'Kontakt';
  $file = 'kontakt.php';
} elseif (isset($_GET['podstran']) && $_GET['podstran'] == 'ponudba') {
  $title = 'Ponudba';
  $file = 'ponudba.php';
} elseif (isset($_GET['podstran']) && $_GET['podstran'] == 'seznam') {
  $title = 'Seznam';
  $file = 'seznam.php';
} else {
  $title = 'Domov';
  $file = 'domov.php';
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title; ?> @ mojapp.com</title>
  <style>
    body {
      margin: 0;
      padding: 50px;
      font-family: Arial, sans-serif;
    }
    nav {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
    }
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    nav li {
      float: left;
    }

    nav li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    nav li a:hover {
      background-color: #111;
    }
    .noga {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #555;
      color: white;
      text-align: center;
    }
  </style>
</head>
<body>

<nav><ul>
    <li><a href="./">Domov</a></li>
    <li><a href="./kontakt">Kontakt</a></li>
    <li><a href="./ponudba">Ponudba</a></li>
    <li><a href="./seznam">Seznam</a></li>
    <li><a href="./prijava">Prijava</a></li>
  </ul></nav>

<?php include $file; ?>

<div class="noga">
  <p>&copy; 2024</p>
</div>

</body>
</html>