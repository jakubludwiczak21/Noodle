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
				<li><a href="../../index.php">Strona główna</a></li>
				<li><a href="../dolacz_kod.php">Dołącz do testu</a></li>
				<li><a href="../moje_testy.php">Moje testy</a></li>
				<li><a href="../panel_nauczyciela.php" class="aktualna-strona">Panel nauczyciela</a></li>
        		</ul>
			<ul>
				<li>
					<a href="../kontakt.php">Kontakt</a>
				</li>
			</ul>
      		</div>

			<div class="main-content" id="main">
				<div class="innermenu" id="">
					<ul style="display: flex;justify-content: space-evenly;">
						<li><a href="dodaj.php">Dodaj Pytanie</a></li>
						<li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php" class="aktualna-strona">Utwórz test</a></li>
						<li><a href="zarz_testami.php">Zarządzaj testami</a></li>
					</ul>
				</div>
				<div class="haslo">

					<h2 class="new-test-header">Utwórz nowy test</h2>
					<form id="new-test-form" class="zarzadzaj" style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 10px; align-items: center; width: 80%; margin: auto;">
						<label for="test-name" style="grid-column: 1 / 3;">Nazwa testu:</label>
						<input type="text" id="test-name" name="test_name" required style="grid-column: 3 / 7;">

						<label for="test-subject" style="grid-column: 1 / 3;">Przedmiot:</label>
						<input type="text" id="test-subject" name="test_subject" required style="grid-column: 3 / 7;">

						<label for="test-privacy" style="grid-column: 1 / 3;">Prywatność:</label>
						<select id="test-privacy" name="test_privacy" required style="grid-column: 3 / 7;">
							<option value="private">Prywatny</option>
							<option value="public">Publiczny</option>
						</select>

						<label for="creation-date" style="grid-column: 1 / 3;">Data utworzenia:</label>
						<input type="date" id="creation-date" name="creation_date" style="grid-column: 3 / 7;">

					</form>

					&nbsp;&nbsp;&nbsp;&nbsp;
					<p>wybierz pytania:</p>
					<br><br>
					<fieldset style="width: 80%;">
						<legend>Wypełnij formularz:</legend>
						<form action="" method="" class="zarzadzaj">


							<p class="mid-width" style="grid-column: 1 / 3;">Filtruj</p>
							<p class="mid-width" style="grid-column: 4 / 6;"></p>

						
							<label for="przedmiot">Przedmiot:</label>
							<label for="kategoria">Kategoria:</label>
							<label for="typ">Typ Pytania:</label>
							<label for="poziom">Trudność:</label>
							<label for="prywatnosc">Widoczość pytania:</label>
					
							
							<input type="text" id="przedmiot" name="przedmiot" placeholder="Przedmiot" value="" required >


							
							<input type="text" id="kategoria" name="kategoria" placeholder="Kategoria" value="" required >

							<select id="typ" name="typ" required>
								<option value="zamkniete">Zamknięte</option>
								<option value="zamkniete_wiele">Zamknięte (Wielokrotny wybór)</option>
								<option value="otwarte" disabled>Otwarte </option>
							</select>

							<select id="poziom" name="poziom" required>
								<option value="latwe">Łatwe</option>
								<option value="srednie">Średnie</option>
								<option value="trudne">Trudne</option>
							</select>

							
							<select id="prywatnosc" name="prywatnosc" required>
								<option value="tylkoja">Tylko dla mnie</option>
								<option value="wszyscy">Dla wszystkich</option>
							</select>

							<hr class="full-width" style="width: 90%; margin: auto;">

							<label for="tresc" style="align-self: center;">Szukaj</label>
							<input type="text" id="tresc" name="tresc" placeholder="Wyszukaj pytanie po nazwie" value="" style="grid-column: 2 / 5;" >
							<input type="submit" style="grid-column: 5 / 6;" value="Filtruj">
						</form>
					</fieldset>
					<br>
					<div class="pytania">
						<table>
							<tbody>
								<tr>
									<th class="szerokie">Treść</th>
									<th>Przedmiot</th>
									<th>Kategoria</th>
									<th>Typ</th>
									<th>Trudność</th>
									<th>Widoczość</th>
									<th>Dodaj</th>
								</tr>
								<tr>
									<td>Kiedy urodził się Fryderyk Chopin</td>
									<td>Muzyka</td>
									<td>Historia muzyki</td>
									<td>Zamknięte</td>
									<td>Łatwe</td>
									<td>Tylko dla mnie</td>
									<td style="text-align:center;">
                                        <input type="checkbox" class="edit-checkbox" style="width:100%; text-align:center;">
                                    </td>
								</tr>
								<tr>
									<td>Jaki jest wzór funkcji kwadratowej?</td>
									<td>Matematyka</td>
									<td>Algebra</td>
									<td>Zamknięte</td>
									<td>Średnie</td>
									<td>Dla wszystkich</td>
									<td style="text-align:center;">
                                        <input type="checkbox" class="edit-checkbox" style="width:100%; text-align:center;">
                                    </td>
								</tr>
								<tr>
									<td>Kto napisał "Lalkę"?</td>
									<td>Polski</td>
									<td>Literatura</td>
									<td>Zamknięte</td>
									<td>Łatwe</td>
									<td>Dla wszystkich</td>
									<td style="text-align:center;">
                                        <input type="checkbox" class="edit-checkbox" style="width:100%; text-align:center;">
                                    </td>
								</tr>
								<tr>
									<td>Jakie są skutki efektu cieplarnianego?</td>
									<td>Geografia</td>
									<td>Środowisko</td>
									<td>Zamknięte (Wielokrotny wybór)</td>
									<td>Trudne</td>
									<td>Dla wszystkich</td>
									<td style="text-align:center;">
                                        <input type="checkbox" class="edit-checkbox" style="width:100%; text-align:center;">
                                    </td>
								</tr>
								
								
							</tbody>
						</table>
					</div>
                    <div id="UTWORZTEST-BUTTON" style="text-align:center;">
                        <button type="button" id="utworz-test">Utworz test!</button>
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
		$("#menu").css('min-height', "calc(100vh - " + H + "px)");

		var T = $('#head').height();
		$(".sidebar").css('top', T + "px");

		document.addEventListener('DOMContentLoaded', function () {
			document.getElementById('creation-date').valueAsDate = new Date();
		});


	</script>
</body>
</html>