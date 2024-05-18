<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzaj pytaniami - Panel nauczyciela</title>
    <link rel="stylesheet" href="../../styles.css">
    <script src="../../jquery-3.7.1min.js"></script>
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
                <ul style="display: flex; justify-content: space-evenly;">
                    <li><a href="dodaj.php">Dodaj Pytanie</a></li>
                    <li><a href="zarz_pyt.php" class="aktualna-strona">Zarządzaj pytaniami</a></li>
                    <li><a href="utworz_test.php">Utwórz test</a></li>
                    <li><a href="zarz_testami.php">Zarządzaj testami</a></li>
                </ul>
            </div>
            <div class="haslo">
                <p>Zarządzaj pytaniami</p>
                <br><br>
                <fieldset style="width: 80%;">
                    <legend>Wypełnij formularz:</legend>
                    <form action="" method="GET" class="zarzadzaj">
                        <label for="przedmiot">Przedmiot:</label>
                        <label for="kategoria">Kategoria:</label>
                        <label for="typ">Typ Pytania:</label>
                        <label for="poziom">Trudność:</label>
                        <label for="prywatnosc">Widoczność pytania:</label>
                        <input type="text" id="przedmiot" name="przedmiot" placeholder="Przedmiot" value="<?php echo isset($_GET['przedmiot']) ? $_GET['przedmiot'] : ''; ?>">
                        <input type="text" id="kategoria" name="kategoria" placeholder="Kategoria" value="<?php echo isset($_GET['kategoria']) ? $_GET['kategoria'] : ''; ?>">
                        <select id="typ" name="typ">
                            <option value="">-- Wybierz --</option>
                            <option value="zamkniete" <?php echo isset($_GET['typ']) && $_GET['typ'] === 'zamkniete' ? 'selected' : ''; ?>>Zamknięte</option>
                            <option value="zamkniete_wiele" <?php echo isset($_GET['typ']) && $_GET['typ'] === 'zamkniete_wiele' ? 'selected' : ''; ?>>Zamknięte (Wielokrotny wybór)</option>
                        </select>
                        <select id="poziom" name="poziom">
                            <option value="">-- Wybierz --</option>
                            <option value="latwe" <?php echo isset($_GET['poziom']) && $_GET['poziom'] === 'latwe' ? 'selected' : ''; ?>>Łatwe</option>
                            <option value="srednie" <?php echo isset($_GET['poziom']) && $_GET['poziom'] === 'srednie' ? 'selected' : ''; ?>>Średnie</option>
                            <option value="trudne" <?php echo isset($_GET['poziom']) && $_GET['poziom'] === 'trudne' ? 'selected' : ''; ?>>Trudne</option>
                        </select>

                        <select id="prywatnosc" name="prywatnosc">
                            <option value="">-- Wybierz --</option>
                            <option value="tylkoja" <?php echo isset($_GET['prywatnosc']) && $_GET['prywatnosc'] === 'tylkoja' ? 'selected' : ''; ?>>Tylko dla mnie</option>
                            <option value="wszyscy" <?php echo isset($_GET['prywatnosc']) && $_GET['prywatnosc'] === 'wszyscy' ? 'selected' : ''; ?>>Dla wszystkich</option>
                        </select>
                        <hr class="full-width" style="width: 90%; margin: auto;">
                        <label for="tresc" style="align-self: center;">Szukaj</label>
                        <input type="text" id="tresc" name="tresc" style="grid-column: 2 / 5;" placeholder="Wyszukaj pytanie po nazwie" value="<?php echo isset($_GET['tresc']) ? $_GET['tresc'] : ''; ?>">
                        <input type="submit" style="grid-column: 5 / 6;" value="Filtruj">
                    </form>
                </fieldset>
                <br>
                <div class="pytania">
                    <table>
                        <thead>
                        <tr>
                            <th class="szerokie">Treść</th>
                            <th>Przedmiot</th>
                            <th>Kategoria</th>
                            <th>Typ</th>
                            <th>Trudność</th>
                            <th>Widoczność</th>
                            <th colspan="2">Operacje</th>
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
                                        <td style="text-align:center;"><a href="edytuj.php?id=' . $row['id'] . '">Edytuj</a></td>
                                        <td style="text-align:center;"><a class="delete" href="usun.php? id=' . $row['id'] . '" style="color: red;">Usuń</a></td>
                                      </tr>';
                                      
                                    

                            }
                        } else {
                            echo '<tr><td colspan="7">Brak pytań do wyświetlenia.</td></tr>';
                        }

                        $conn->close();
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
        $('table').on('click', 'a.delete', function(e) {
            e.preventDefault();


            

            var confirmDelete = confirm('Czy na pewno chcesz usunąć ten rząd?');
            if (confirmDelete) {
                $(this).closest('tr').remove();
                console.log('Usunięto pytanie o ID: ' + questionId);
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
