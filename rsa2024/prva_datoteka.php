<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Prva PHP datoteka</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      color: <?php echo rand(0,1) ? "red" : "blue"; ?>;
    }
    p {
      color: green;
    }
  </style>
</head>
<body>
<?php

  echo "<h1>Pozdravljen svet!</h1>";

  echo "<p>Prva datoteka vsebuje <br>samo eno vrstico.</p>";

?>
</body>
</html>

