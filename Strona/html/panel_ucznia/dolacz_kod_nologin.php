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
  <div class="container" id="con">

    <div class="sidebar" id="menu">
      
      <ul>
        <h2>Menu</h2>
        <li><a href="../../index.php">Strona główna</a></li>
        <li ><a href="dolacz_kod_nologin.php" class="aktualna-strona">Dołącz do testu</a></li>
      </ul>


      <ul>
        <li><a href="../kontakt.php" >Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
      <div class="haslo">
        <p>Dołącz do testu</p>
        <br>
                <form method="GET" action="../test.php">
                    <label class="full-width" for="kod">Kod testu</label>
                    <input class="full-width" type="text" name="kod" id="kod" required>
                    <div style="display: flex;padding-left:10%;align-items: center;"><label style="padding-left:10%;" for="zaloguj" ><a href="../kontakt.php">Problem z dołączeniem?</a></label></div>
                    <input type="submit" value="Zatwierdź">
                </form>
        </div>
        <p><a href="../test.php">Przykładowy test (Link Roboczy)</a></p>
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
$("#main").css('min-height', "calc(100vh - " + H + "px)");
var T = $('#head').height();
  $(".sidebar").css('top', T+ "px");

</script>
</body>
</html>
