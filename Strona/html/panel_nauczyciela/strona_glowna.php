<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

//echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../../jquery-3.7.1min.js"></script>
<title>Noodle™</title>
<link rel="stylesheet" href="../styles.css">
</head>

<body>
<div class="wrapper">
  <div class="header-content" id="head">
    <h1>Noodle™ - Twoje testy Online</h1>
  </div>
  <div class="container">

    <div class="sidebar" id="menu">
      
      <ul>
        <h2>Menu</h2>
        <li><a href="strona_glowna.php" class="aktualna-strona">Strona główna</a></li>
        <li><a href="dodaj.php">Dodaj Pytanie</a></li>
        <li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
        <li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
        <li><a href="utworz_test.php">Utwórz test</a></li>
        <li><a href="zarz_testami.php">Zarządzaj testami</a></li>
      </ul>


      <ul>
        <li><a href="../logowanie/logout.php">Wyloguj</a></li>
        <li><a href="../kontakt.php">Kontakt</a></li>
      </ul>
    </div>

      <div class="main-content" id="head">
        <div style="margin-bottom: 1em;">
          <h1>Witaj w aplikacji Noodle™ </h1> 
        </div>
        <div>
          <p>Twoim centrum do tworzenia i zarządzania testami online.</p>
          <p> Noodle™ oferuje prosty i intuicyjny interfejs, który umożliwia nauczycielom, uczniom oraz profesjonalistom łatwe tworzenie, przeprowadzanie i zarządzanie testami edukacyjnymi.</p>
        </div>
      </div>

    </div>
  <div class="footer" id="stopka">
    <p>&copy; Strona testowa. Wszelkie prawa zastrzeżone.</p>
  </div>

</div>



<script>
var headHeight = $('#head').height() + parseInt($('#head').css('padding-top')) + parseInt($('#head').css('padding-bottom'));
var stopkaHeight = $('#stopka').height() + parseInt($('#stopka').css('padding-top')) + parseInt($('#stopka').css('padding-bottom'));
var menuMargin = parseInt($('#menu').css('margin-top')) + parseInt($('#menu').css('margin-bottom'));



var H = headHeight + stopkaHeight + menuMargin;
$("#menu").css('min-height', "calc(100vh - " + H + "px)");


var T = $('#head').height();
  $(".sidebar").css('top', T+ "px");
</script>
</body>
</html>
