<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../panel_nauczyciela/panel_nauczyciela.php");
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
	<link rel="stylesheet" href="../../styles.css">
</head>
<body>
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
				<li><a href="../moje_testy.php" class="dropdown-btn">Moje testy</a></li>
				<li><a href="../panel_nauczyciela/panel_nauczyciela.php" class="aktualna-strona">Panel nauczyciela</a></li>
        		</ul>
			<ul>

				<li>
    				<a href="../logowanie/logout.php">Wyloguj</a>
				</li>

				<li>
					<a href="../kontakt.php">Kontakt</a>
				</li>
			</ul>
      		</div>

			<div class="main-content" id="main">
				<div class="innermenu" id="">
					<ul style="display: flex;justify-content: space-evenly;">
						<li><a href="dodaj.php">Dodaj Pytanie</a></li>
						<li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
						<li><a href="zarz_pyt.php" class="aktualna-strona">Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php">Utwórz test</a></li>
						<li><a href="zarz_testami.php">Zarządzaj testami</a></li>
					</ul>
				</div>
				<div class="haslo" style="justify-content: flex-start;">

					&nbsp;&nbsp;&nbsp;&nbsp;
					<p>Zarządzaj pytaniami</p>
					<br><br>
					<fieldset style="width: 80%;margin-bottom:1em;">
						<legend>Wypełnij formularz:</legend>
						<form action="" method="GET" class="zarzadzaj">


							<p class="mid-width" style="grid-column: 1 / 3;">Filtruj</p>
							<p class="mid-width" style="grid-column: 4 / 6;"></p>

						
							<label for="przedmiot">Przedmiot:</label>
							<label for="kategoria">Kategoria:</label>
							<label for="typ">Typ Pytania:</label>
							<label for="poziom">Trudność:</label>
							<label for="prywatnosc">Widoczość pytania:</label>
					
							
							<select id="przedmiot" name="przedmiot">
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

							
							<select id="kategoria" name="kategoria">
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

							<select id="typ" name="typ">
								<?php
									$selected = isset($_GET['typ']) ? $_GET['typ'] : '0';
									$sql = "SELECT * FROM typ_pytania";
									$result = $conn->query($sql);

									echo '<option value="0" ' . ($selected == '0' ? 'selected' : '') . '>Brak</option>'; 
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo '<option value="' . $row['nazwa_typu'] . '" ' . ($selected == $row['nazwa_typu'] ? 'selected' : '') . '>' . $row['nazwa_typu'] . '</option>';
										}
									} else {
										echo '<option value="">Brak przedmiotów</option>';
									}
								?>
							</select>

							<select id="poziom" name="poziom">
								<?php
									$selected = isset($_GET['poziom']) ? $_GET['poziom'] : '0';
									$sql = "SELECT * FROM poziom";
									$result = $conn->query($sql);

									echo '<option value="0" ' . ($selected == '0' ? 'selected' : '') . '>Brak</option>'; 
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo '<option value="' . $row['trudnosc_nazwa'] . '" ' . ($selected == $row['trudnosc_nazwa'] ? 'selected' : '') . '>' . $row['trudnosc_nazwa'] . '</option>';
										}
									} else {
										echo '<option value="">Brak przedmiotów</option>';
									}
								?>
							</select>

							
							<select id="prywatnosc" name="prywatnosc">
								<option value="0">Brak</option>
								<option value="tylkoja">Tylko dla mnie</option>
								<option value="wszyscy">Dla wszystkich</option>
							</select>

							<hr class="full-width" style="width: 90%; margin: auto;">

							<label for="tresc" style="align-self: center;">Szukaj</label>
							<?php
								$selected = isset($_GET['tresc']) ? $_GET['tresc'] : ''; 
								echo '<input type="text" id="tresc" name="tresc" placeholder="Wyszukaj pytanie po nazwie" value="' . $selected . '" style="grid-column: 2 / 5;" >';
							?>
							
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
									<th colspan="2">Operacje</th>
								</tr>

                                <?php
                                    $sql = "SELECT pytania.id, pytania.tresc, przedmioty.nazwa AS przedmiot, kategoria.nazwa AS kategoria, typ_pytania.nazwa_typu AS typ, poziom.trudnosc_nazwa AS trudnosc, pytania.prywatnosc AS widocznosc 
									FROM Pytania 
									INNER JOIN Przedmioty ON pytania.przedmiot_id = przedmioty.id 
									INNER JOIN Kategoria ON pytania.kategoria_id = kategoria.id 
									INNER JOIN Typ_pytania ON pytania.typ_pytania = typ_pytania.id 
									INNER JOIN Poziom ON pytania.poziom_id = poziom.id";
							
									
									if (isset($_GET['przedmiot']) && $_GET['przedmiot'] != '0') {
										$sql .= " WHERE przedmioty.nazwa LIKE '%" . $_GET['przedmiot'] . "%'";
									}
									if (isset($_GET['kategoria']) && $_GET['kategoria'] != '0') {
										$sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
										$sql .= " kategoria.nazwa LIKE '%" . $_GET['kategoria'] . "%'";
									}
									if (isset($_GET['typ']) && $_GET['typ'] != '0') {
										$sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
										$sql .= " typ_pytania.nazwa_typu = '" . $_GET['typ'] . "'";
									}
									if (isset($_GET['poziom']) && $_GET['poziom'] != '0') {
										$sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
										$sql .= " poziom.trudnosc_nazwa = '" . $_GET['poziom'] . "'";
									}
									if (isset($_GET['prywatnosc']) && $_GET['prywatnosc'] != '0') {
										$sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
										$sql .= " pytania.prywatnosc = '" . $_GET['prywatnosc'] . "'";
									}
									if (isset($_GET['tresc']) && $_GET['tresc'] != '') {
										$sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
										$sql .= " pytania.tresc = '" . $_GET['tresc'] . "'";
									}


                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '
                                            <tr>
                                                <td>' . $row['tresc'] . '</td>
                                                <td>' . $row['przedmiot'] . '</td>
                                                <td>' . $row['kategoria'] . '</td>
                                                <td>' . $row['typ'] . '</td>
                                                <td>' . $row['trudnosc'] . '</td>
                                                <td>' . ($row['widocznosc'] === '1' ? 'Tylko dla mnie' : 'Dla wszystkich') . '</td>
                                                <td style="text-align:center;">
													<a href="dodaj.php?id=' . $row['id'] . '">Edytuj</a>
												</td>
												<form method="POST" class="zarzadzaj">
													<input type="hidden" name="question_id" value="'.$row['id'].'">
													<td style="text-align:center;">
														<button type="submit" name="delete_question" class="delete" style="color: red;">Usuń</button>
													</td>
												</form>

                                      
                                            </form></td>    
                                            </tr>';
                                        }
                                    }
                                    else {
                                        echo '<tr><td colspan="7">Brak pytań do wyświetlenia.</td></tr>';
                                    }

                                ?>

								
								
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
    	</div>
		<div class="footer" id="stopka">
			<p>&copy; Strona testowa. Wszelkie prawa zastrzeżone.</p>
		</div>
	</div>
  	<script>
$(document).ready(function() {
    $('table').on('click', 'delete', function(e) { // gdy sie wykonuje ten js to sie nie wykonuje php XD wiec trzeba postawic .delete zeby dzialal js
        e.preventDefault();

        // Wyświetl komunikat potwierdzający
        var confirmDelete = confirm('Czy na pewno chcesz usunąć ten rząd?');
        if (confirmDelete) {
            // Usuń rząd
            $(this).closest('tr').remove();
        }
    });
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
if (isset($_POST['delete_question'])) {
        $record_id = $_POST['question_id'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM odpowiedzi WHERE id_pytania = $record_id";

        if ($conn->query($sql)) {
            echo "Answers deleted successfully";
			echo "<meta http-equiv='refresh' content='0'>";

			if($conn->query("DELETE FROM pytania WHERE id = $record_id")) {
				echo "Question deleted successfully";
			}
        } 
		else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    } 
	else {
        //echo "No record ID provided";
    }
?>