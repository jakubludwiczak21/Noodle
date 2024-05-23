<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../../jquery-3.7.1min.js"></script>
	<title>Noodle™</title>
	<link rel="stylesheet" href="../../styles.css">
</head>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "baza";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>
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

						<li><a href="dodaj.php" class="aktualna-strona">Dodaj Pytanie</a></li>
						<li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
						<li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php">Utwórz test</a></li>
						<li><a href="zarz_testami.php">Zarządzaj testami</a></li>
					</ul>
				</div>
				<div class="haslo">
					
					&nbsp;&nbsp;&nbsp;&nbsp;
					<p>Dodaj pytanie lub edytuj istniejące:</p>

					<fieldset style="width: 80%;">
						<legend>Wypełnij formularz:</legend>
						<form action="dodaj.php" method="post" class="dodaj">
							<label for="tresc" class="full-width">Treść Pytania:</label>
							<textarea rows="5" id="tresc" name="tresc" cols="50" placeholder="Treść pytania" class="full-width" required></textarea>

							<hr class="full-width" style="width: 90%; margin: auto;">

							<p class="mid-width" style="grid-column: 1 / 3;">Ogólne</p>
							<p class="mid-width" style="grid-column: 4 / 7;">Właściwości</p>

							<label for="typ">Typ Pytania:</label>
							<select id="typ" name="typ" style="grid-column: 2 / 4;"required>
								<option value="zamkniete">Zamknięte</option>
								<option value="zamkniete_wiele">Zamknięte (Wielokrotny wybór)</option>
								<option value="otwarte" disabled>Otwarte </option>
							</select>

							<label for="przedmiot">Przedmiot:</label>
							<select id="przedmiot" name="przedmiot" style="grid-column: 5 / 7;" required>
								<?php
									$selected = isset($_GET['przedmiot']) ? $_GET['przedmiot'] : '0'; 
									$sql = "SELECT * FROM przedmioty";
									$result = $conn->query($sql);

									echo '<option value="0" ' . ($selected == '0' ? 'selected' : '') . '>Brak</option>'; 
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo '<option value="' . $row['nazwa'] . '" ' . ($selected == $row['nazwa'] ? 'selected' : '') . '>' . $row['nazwa'] . '</option>';
										}
									} else {
										echo '<option value="">Brak przedmiotów</option>';
									}
								?>
							</select>
							<label for="liczba">Liczba wariantów:</label>
							<input type="number" id="liczba" name="liczba" style="grid-column: 2 / 4;" placeholder="Liczba wariantów" value="3" min="2" max="5"required >

							<label for="kategoria">Kategoria:</label>
							<select id="kategoria" name="kategoria" style="grid-column: 5 / 7;" required>
								<?php
									$selected = isset($_GET['kategoria']) ? $_GET['kategoria'] : '0'; 
									$sql = "SELECT * FROM kategoria";
									$result = $conn->query($sql);

									echo '<option value="0" ' . ($selected == '0' ? 'selected' : '') . '>Brak</option>'; 
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo '<option value="' . $row['nazwa'] . '" ' . ($selected == $row['nazwa'] ? 'selected' : '') . '>' . $row['nazwa'] . '</option>';
										}
									} else {
										echo '<option value="">Brak przedmiotów</option>';
									}
								?>
							</select>

							<label for="poziom">Trudność:</label>
							<select id="poziom" name="poziom" style="grid-column: 2 / 4;"required>
								<option value="latwe">Łatwe</option>
								<option value="srednie">Średnie</option>
								<option value="trudne">Trudne</option>
							</select>

							<label for="prywatnosc">Widoczość pytania:</label>
							<select id="prywatnosc" name="prywatnosc" style="grid-column: 5 / 7;"required>
								<option value="tylkoja">Tylko dla mnie</option>
								<option value="wszyscy">Dla wszystkich</option>
							</select>

							<hr class="full-width" style="width: 90%; margin: auto;">

							<label for="wariant" style="grid-column: 1 / 5;">Wariant:</label>
							<label for="wariant" style="grid-column: 6 / 7;text-align: center;">Poprawność:</label>
							<div class="warianty full-width" id="warianty-container">
								<!-- Tu będą dynamicznie dodawane pola wariantów -->
							</div>
							
							<hr class="full-width" style="width: 90%; margin: auto;">

							<label for="zdjecie">Dodaj zdjęcie:</label>
							<input type="file" id="zdjecie" name="zdjecie" style="grid-column: 2 / 4;resize: none;">
							<input type="submit" name="submit" style="grid-column: 5 / 7;" value="Zapisz">
						</form>
					</fieldset>
					<br>
				</div>
			</div>
    		</div>
		<div class="footer" id="stopka">
			<p>&copy; Strona testowa. Wszelkie prawa zastrzeżone.</p>
		</div>
	</div>
  	<script>
$(document).ready(function() {
    function aktualizujPolaWariantow() {
        var liczbaWariantow = parseInt($('#liczba').val());
        var container = $('#warianty-container');
        var typPytania = $('#typ').val();

        // Przechowaj aktualne wartości
        var currentValues = [];
        container.find('input[type="text"]').each(function() {
            currentValues.push($(this).val());
        });

        container.empty();

        for (var i = 1; i <= liczbaWariantow; i++) {
            var input = $('<input>').attr({
                type: 'text',
                name: 'wariant' + i,
                placeholder: 'Treść odpowiedzi dla wariantu ' + i,
                style: 'grid-column: 1 / 6;',
                required: true,
                value: currentValues[i - 1] || ''  // Przywróć wartość lub ustaw pustą wartość
            });
            var checkbox = $('<input>').attr({
                type: typPytania === 'zamkniete' ? 'radio' : 'checkbox',
                name: 'poprawnosc',  // Użyj tego samego atrybutu name dla wszystkich przycisków radio
				value: i,
                placeholder: 'Poprawność',
                class: 'check',
                style: 'grid-column: 6 / 7;justify-self: center;align-self: center;'
            });

            container.append(input, checkbox);
        }
    }

    // Wywołaj funkcję po zmianie liczby wariantów
    $('#liczba').on('change', aktualizujPolaWariantow);

    // Wywołaj funkcję po zmianie typu pytania
    $('#typ').on('change', aktualizujPolaWariantow);

    // Wywołaj funkcję na początku, aby wyświetlić pola wariantów zgodnie z wartością początkową
    aktualizujPolaWariantow();
});


$('#liczba').on('input', function() {
    var value = parseInt($(this).val());
    if (value < 2) {
        $(this).val(2);
    } else if (value > 5) {
        $(this).val(5);
    }
});


		var headHeight = $('#head').height() + parseInt($('#head').css('padding-top')) + parseInt($('#head').css('padding-bottom'));
		var stopkaHeight = $('#stopka').height() + parseInt($('#stopka').css('padding-top')) + parseInt($('#stopka').css('padding-bottom'));
		var menuMargin = parseInt($('#menu').css('margin-top')) + parseInt($('#menu').css('margin-bottom'));



		var H = headHeight + stopkaHeight + menuMargin;
		$("#menu").css('min-height', "calc(100vh - " + H + "px)");


		var T = $('#head').height();
		$(".sidebar").css('top', T + "px");
	</script>
</body>
</html>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "baza";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
    }

	if(isset($_POST["submit"])) {

		$_tresc = $_POST['tresc'];


		$get_przedmiot = $_POST['przedmiot'];
		$select_query = "SELECT id FROM Przedmioty WHERE nazwa = '$get_przedmiot'";
		$result = $conn->query($select_query);

		if ($result) {
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$_przedmiot_id = $row['id'];
			} else {
				$insert_query = "INSERT INTO `przedmioty` (`nazwa`) VALUES ('$get_przedmiot')";
				if ($conn->query($insert_query) === TRUE) {
					$_przedmiot_id = $conn->insert_id;
				} else {
					echo "Error: " . $conn->error;
				}
			}
		} else {
			echo "Error: " . $conn->error;
		}

		echo $_przedmiot_id;

		$get_kategoria = $_POST['kategoria'];
		$select_query2 = "SELECT id FROM kategoria WHERE nazwa = '$get_kategoria'";
		$result2 = $conn->query($select_query2);
		if ($result2) {
			if ($result2->num_rows > 0) {
				$row = $result2->fetch_assoc();
				$_kategoria_id = $row['id'];
			} else {
				$insert_query = "INSERT INTO `kategoria` (`nazwa`) VALUES ('$get_kategoria')";
				if ($conn->query($insert_query) === TRUE) {
					$_kategoria_id = $conn->insert_id;
				} else {
					echo "Error: " . $conn->error;
				}
			}
		} else {
			echo "Error: " . $conn->error;
		}
		
		echo $_kategoria_id;

		$_prywatnosc = ($_POST['prywatnosc'] == 'tylkoja') ? 1 : 0;
		
		//wersja robocza
		$_zdjecie = '';
		$_autor = '1';

		switch ($_POST['poziom']) {
			case "latwe":
				$_poziom = 1;
				break;
			case "srednie":
				$_poziom = 2;
				break;
			case "trudne":
				$_poziom = 3;
				break;

		}

		switch ($_POST['typ']) {
			case "zamkniete":
				$_typ = 4;
				break;
			case "zamkniete_wiele":
				$_typ = 3;
				break;
			case "otwarte":
				$_typ = 2;
				break;

		}

		$_liczba_odpowiedzi = $_POST['liczba'];

		$sql_add = "INSERT INTO `pytania` (`id`, `tresc`, `przedmiot_id`, `kategoria_id`, `poziom_id`, `zdjecie`, `autor`, `prywatnosc`, `typ_pytania`) VALUES (NULL, '$_tresc', '$_przedmiot_id', '$_kategoria_id', '$_poziom', '$_zdjecie', '$_autor', '$_prywatnosc', '$_typ')";
	

		if($result = $conn->query($sql_add)) {

			$question_id = $conn->insert_id;

			for($i = 1; $i <= $_liczba_odpowiedzi; $i++) {
				$wariant = $_POST["wariant$i"];
			
				if(isset($_POST["poprawnosc"]) && $_POST["poprawnosc"] == $i) {
					$poprawnosc = 1;
				} else {
					$poprawnosc = 0;
				}
			
				$sql_add_answer = "INSERT INTO `Odpowiedzi` (`id_pytania`, `tresc`, `poprawnosc`) VALUES ('$question_id', '$wariant', '$poprawnosc')";
			
				$conn->query($sql_add_answer);
			}

		}
		else echo "ERROR Pytanie nie zostało dodane";

		
	}




?>