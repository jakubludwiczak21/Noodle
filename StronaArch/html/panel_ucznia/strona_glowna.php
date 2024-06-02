<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../../jquery-3.7.1min.js"></script>
<title>Noodle™</title>
<link rel="stylesheet" href="../../styles.css">
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
        <li><a href="index.php" class="aktualna-strona">Strona główna</a></li>
        <li><a href="html/dolacz_kod.php">Dołącz do testu</a></li>
        <li><a href="html/moje_testy.php" >Moje testy</a></li>
        <li><a href="html/panel_nauczyciela/panel_nauczyciela.php">Panel nauczyciela</a></li>
      </ul>


      <ul>
        <li><a href="html/kontakt.php">Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
      <h2>Najnowsze testy</h2>
      &nbsp;
      <div class="do_wypelnienia">
        
      <table>
				<tbody><tr>
					<th class="szerokie">Nazwa</th>
					<th>Data wykonania</th>
					<th>Nauczyciel</th>
					<th>Przedmiot</th>
					<th>Waga</th>
          <th>Czy kod jest wymagany?</th>
					<th>Operacje</th>
				</tr>
				<tr>
							<td>Sprawdzian z nut - Klasa III</td>
							<td>02.04.2024</td>
							<td>Jan Kowalski</td>
							<td>Muzyka</td>
							<td>2</td>
              <td>Tak</td>
							<td style="text-align:center;"><a style="width:100%; text-align:center;" href="html/kontakt.php">Poproś o dostęp</a></td>
							</tr>
        <tr>
              <td>Budowa Pantofelka i laćka</td>
              <td>08.04.2024</td>
              <td>Anna Nowak</td>
              <td>Przyroda</td>
              <td>1</td>
              <td>Nie</td>
							<td style="text-align:center;"><a style="width:100%; text-align:center;" href="html/moje_testy.php">Dołącz</a></td>
							</tr>
              <tr>
                <td>Sprawdzian z nut - Klasa III</td>
                <td>02.04.2024</td>
                <td>Jan Kowalski</td>
                <td>Muzyka</td>
                <td>2</td>
                <td>Tak</td>
                <td style="text-align:center;"><a style="width:100%; text-align:center;" href="html/kontakt.php">Poproś o dostęp</a></td>
                </tr>
          <tr>
                <td>Budowa Pantofelka i laćka</td>
                <td>08.04.2024</td>
                <td>Anna Nowak</td>
                <td>Przyroda</td>
                <td>1</td>
                <td>Nie</td>
                <td style="text-align:center;"><a style="width:100%; text-align:center;" href="html/moje_testy.php">Dołącz</a></td>
                </tr>

										</tbody></table>




      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
      &nbsp;
      <div class="dol">
      <div class="do_wypelnienia" style="width: 50%;">
        <div> 
          <h2>Twoje Komunikaty</h2>
          
          </div>
        
      </div>
              <div class="do_wypelnienia" style="width: 50%;">
              <h2>Najwyższe wyniki</h2>
              <table style="width: 80%;">
              <tbody><tr>
                <th class="szerokie">Użytkownik</th>
                <th>Test</th>
                <th>Wynik</th>
              </tr>
              <tr>
                <td>Kamil W.</td>
                <td>Algebra - Rozbójnik</td>
                <td>2/10</td>
                    </tr>
              <tr>
                <td>Ala S.</td>
                <td>Kwadratura koła</td>
                <td>21/25</td>
                    </tr>
                    <tr>
                      <td>Kamil W.</td>
                      <td>Algebra - Rozbójnik</td>
                      <td>2/10</td>
                          </tr>
                    <tr>
                      <td>Ala S.</td>
                      <td>Kwadratura koła</td>
                      <td>21/25</td>
                          </tr>
      
                          </tbody></table>
                  </div></div>
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
