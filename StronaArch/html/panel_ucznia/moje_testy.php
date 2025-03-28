<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../jquery-3.7.1min.js"></script>
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
        <li><a href="../uczen/index.php">Strona główna</a></li>
        <li><a href="../uczen/dolacz_kod.php">Dołącz do testu</a></li>
        <li><a href="../moje_testy.php"  class="aktualna-strona">Moje testy</a></li>
        <li><a href="../../index.php">Panel nauczyciela</a></li>
      </ul>


      <ul>
        <li><a href="kontakt.php">Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
      <h2>Do wypełnienia</h2>
      &nbsp;
      <div class="do_wypelnienia">
      <table>
				<tbody><tr>
					<th class="szerokie">Nazwa</th>
					<th>Data wykonania</th>
					<th>Nauczyciel</th>
					<th>Przedmiot</th>
					<th>Waga</th>
					<th>Operacje</th>
				</tr>
				<tr>
							<td>Sprawdzian z nut - Klasa III</td>
							<td>02.04.2024</td>
							<td>Jan Kowalski</td>
							<td>Muzyka</td>
							<td>2</td>
							<td style="text-align:center;"><a style="width:100%; text-align:center;" href="test.php">Dołącz</a></td>

							</tr>
        <tr>
              <td>Budowa Pantofelka i laćka</td>
              <td>08.04.2024</td>
              <td>Anna Nowak</td>
              <td>Przyroda</td>
              <td>1</td>
							<td style="text-align:center;"><a style="width:100%; text-align:center;" href="test.php">Dołącz</a></td>
							</tr>

										</tbody></table>




      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <h2>Ukończone</h2>
      &nbsp;
            <div class="do_wypelnienia">
            <table>
              <tbody><tr>
                <th class="szerokie">Nazwa</th>
                <th>Data ukończenia</th>
                <th>Nauczyciel</th>
                <th>Przedmiot</th>
                <th>Waga</th>
                <th>Ocena</th>
                <th>Punkty</th>
              </tr>
              <tr>
                <td>Dział 3 - Polska 1944-1989</td>
                <td>28.03.2024</td>
                <td>Ewa Meisner</td>
                <td>Historia</td>
                <td>2</td>
                <td>5</td>
                <td>18/20</td>
      
                    </tr>
              <tr>
                    <td>Układy równań</td>
                    <td>01.04.2024</td>
                    <td>Grażyna Kopeć</td>
                    <td>Matematyka</td>
                    <td>5</td>
                    <td>1</td>
                    <td>12/30</td>
                    </tr>
      
                          </tbody></table>
                  </div>
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
$("#menu").css('height', "calc(100vh - " + H + "px)");

var T = $('#head').height();
  $(".sidebar").css('top', T+ "px");

</script>
</body>
</html>
