<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utwórz test</title>
    <link rel="stylesheet" href="../../styles.css">
    <script src="../../jquery-3.7.1min.js"></script>
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
            <li><a href="../kontakt.php">Kontakt</a></li>
        </ul>
    </div>

        <div class="main-content" id="main">
            <div class="innermenu" id="">
                <ul style="display: flex; justify-content: space-evenly;">
                    <li><a href="dodaj.php">Dodaj Pytanie</a></li>
                    <li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
                    <li><a href="zarz_pyt.php" >Zarządzaj pytaniami</a></li>
                    <li><a href="utworz_test.php" class="aktualna-strona">Utwórz test</a></li>
                    <li><a href="zarz_testami.php">Zarządzaj testami</a></li>
                </ul>
            </div>
            <div class="haslo" style="justify-content: flex-start;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <p style="margin-bottom:1em">Utwórz Test</p>
                <br><br>
                <fieldset style="width: 80%;display:grid;gap:1em">
                    <label for="nazwa_testu" style="grid-column: 1 / 2;align-self:center;">Nazwa Testu:</label>
                    <input type="text" id="nazwa_testu" name="nazwa_testu" placeholder="Nazwa Testu" style="grid-column: 3 / 7;">

                    <label for="przedmiot_testu" style="grid-column: 1 / 2;align-self:center;">Przedmiot:</label>
                    <select id="przedmiot_testu" name="przedmiot_testu" style="grid-column: 3 / 7;" required>
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

                    <label for="prywatnosc_testu" style="grid-column: 1 / 2;align-self:center;">Prywatność:</label>
                    <select id="prywatnosc_testu" style="grid-column: 3/7" name="prywatnosc_testu">
                        <option value="1">Prywatny</option>
                        <option value="0">Publiczny</option>
                    </select>
                </fieldset>


                <p style="margin-top:2em;margin-bottom:1em">Filtruj i wybierz pytania</p>
					<br><br>
					<fieldset style="width: 80%;margin-bottom:1em">
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


                <br>
                <div class="pytania">
                    <form id="question-form"style="display: block;width:100%">
                        <table style="width: 100%;">
                            <thead>
                            <tr>
                                <th class="szerokie">Treść</th>
                                <th>Przedmiot</th>
                                <th>Kategoria</th>
                                <th>Typ</th>
                                <th>Trudność</th>
                                <th>Widoczność</th>
                                <th>Dodaj do testu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "baza";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT pytania.id, pytania.tresc, przedmioty.nazwa AS przedmiot, kategoria.nazwa AS kategoria, typ_pytania.nazwa_typu AS typ, poziom.trudnosc_nazwa AS trudnosc, pytania.prywatnosc AS widocznosc
                                    FROM Pytania
                                    INNER JOIN Przedmioty ON pytania.przedmiot_id = przedmioty.id
                                    INNER JOIN Kategoria ON pytania.kategoria_id = kategoria.id
                                    INNER JOIN Typ_pytania ON pytania.typ_pytania = typ_pytania.id
                                    INNER JOIN Poziom ON pytania.poziom_id = poziom.id
                                    WHERE 1=1";

                            if (!empty($_GET['przedmiot'])) {
                                $sql .= " AND przedmioty.nazwa LIKE '%" . $_GET['przedmiot'] . "%'";
                            }
                            if (!empty($_GET['kategoria'])) {
                                $sql .= " AND kategoria.nazwa LIKE '%" . $_GET['kategoria'] . "%'";
                            }
                            if (!empty($_GET['typ'])) {
                                $sql .= " AND typ_pytania.nazwa_typu = '" . $_GET['typ'] . "'";
                            }
                            if (!empty($_GET['poziom'])) {
                                $sql .= " AND poziom.trudnosc_nazwa = '" . $_GET['poziom'] . "'";
                            }
                            if (!empty($_GET['prywatnosc'])) {
                                $sql .= " AND pytania.prywatnosc = '" . $_GET['prywatnosc'] . "'";
                            }
                            if (isset($_GET['tresc']) && $_GET['tresc'] != '') {
                                $sql .= (strpos($sql, 'WHERE') === false) ? " WHERE" : " AND";
                                $sql .= " pytania.tresc = '" . $_GET['tresc'] . "'";
                            }

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr id="' . $row['id'] . '">
                                            <td>' . $row['tresc'] . '</td>
                                            <td>' . $row['przedmiot'] . '</td>
                                            <td>' . $row['kategoria'] . '</td>
                                            <td>' . $row['typ'] . '</td>
                                            <td>' . $row['trudnosc'] . '</td>
                                            <td>' . ($row['widocznosc'] === 'tylkoja' ? 'Tylko dla mnie' : 'Dla wszystkich') . '</td>
                                            <td style="text-align:center;"><input type="checkbox" name="question_ids[]" value="' . $row['id'] . '"></td>
                                          </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="7">Brak pytań do wyświetlenia.</td></tr>';
                            }

                            $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </form>
                </div>
                <br>
                <button id="add-test-button" style="padding: 1em;font-family: calibri;width: 30%;font-size: large;border: 1px solid #70707070;border-radius: 10px;">Dodaj Test</button>
            </div>
        </div>
    </div>
    <div class="footer" id="stopka">
        <p>&copy; Strona testowa. Wszelkie prawa zastrzeżone.</p>
    </div>
</div>
<script>
    document.getElementById('add-test-button').addEventListener('click', function () {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'utworz_test.php';

        var nazwaTestu = document.getElementById('nazwa_testu').value;
        var przedmiotTestu = document.getElementById('przedmiot_testu').value;
        var prywatnoscTestu = document.getElementById('prywatnosc_testu').value;

        form.appendChild(createInput('nazwa_testu', nazwaTestu));
        form.appendChild(createInput('przedmiot_testu', przedmiotTestu));
        form.appendChild(createInput('prywatnosc_testu', prywatnoscTestu));

        var questionCheckboxes = document.querySelectorAll('input[name="question_ids[]"]:checked');
        questionCheckboxes.forEach(function (checkbox) {
            form.appendChild(createInput('question_ids[]', checkbox.value));
        });

        document.body.appendChild(form);
        form.submit();
    });

    function createInput(name, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        return input;
    }

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



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwaTestu = $_POST['nazwa_testu'];  
    echo $_POST['prywatnosc_testu'];
    $prywatnosc_testu = $_POST['prywatnosc_testu'];
    echo $prywatnosc_testu;
    $questionIds = isset($_POST['question_ids']) ? $_POST['question_ids'] : [];


    $get_przedmiot = $_POST['przedmiot_testu'];
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


    $autor = 1; //  wersja robocza do zmiany gdy bedzie gotowe logowanie

    // Insert new test into testy_stworzone
    $sql = "INSERT INTO testy_stworzone (autor, przedmiot, prywatnosc, tytuł, data_stworzenia) VALUES ('$autor',  '$_przedmiot_id', '$prywatnosc_testu', ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nazwaTestu);
    $stmt->execute();
    $testId = $stmt->insert_id;
    $stmt->close();

    // Insert selected questions into testy_pytania
    foreach ($questionIds as $questionId) {
        $sql = "INSERT INTO testy_pytania (id_testu, id_pytania) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $testId, $questionId);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close();
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<script>
    document.getElementById('add-test-button').addEventListener('click', function () {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '';

        var nazwaTestu = document.getElementById('nazwa_testu').value;
        var przedmiotTestu = document.getElementById('przedmiot_testu').value;
        var prywatnoscTestu = document.getElementById('prywatnosc_testu').value;

        form.appendChild(createInput('nazwa_testu', nazwaTestu));
        form.appendChild(createInput('przedmiot_testu', przedmiotTestu));
        form.appendChild(createInput('prywatnosc_testu', prywatnoscTestu));

        var questionCheckboxes = document.querySelectorAll('input[name="question_ids[]"]:checked');
        questionCheckboxes.forEach(function (checkbox) {
            form.appendChild(createInput('question_ids[]', checkbox.value));
        });

        document.body.appendChild(form);
        form.submit();
    });

    function createInput(name, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        return input;
    }
</script>

