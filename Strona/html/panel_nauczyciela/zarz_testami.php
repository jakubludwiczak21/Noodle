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


    <style>
        .table-buttons {
            display: flex;
            justify-content: center;
            align-items: center; 
            flex-wrap: wrap;
            padding: 20px; 
        }
        .table-buttons button {
            background-color: #333; 
            border: 3px solid;
            border-color: black;
            color: white; 
            padding: 10px 20px; 
            margin: 10px; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
            /*position: to chyba trzeba poprawic*/ 
        }

        .table-buttons button:hover {
            background-color: #ff9900; 
        }
        .popup2 button {
            background-color: #333; 
            color: white; 
            border: 3px solid;
            border-color: black;
            padding: 10px 20px; 
            margin: 10px 5px; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }

        .popup2 button:hover {
            background-color: #ff9900; 
        }
    </style>

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
                <li><a href="strona_glowna.php" >Strona główna</a></li>
                <li><a href="dodaj.php">Dodaj Pytanie</a></li>
                <li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
                <li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
                <li><a href="utworz_test.php">Utwórz test</a></li>
                <li><a href="zarz_testami.php" class="aktualna-strona">Zarządzaj testami</a></li>
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
			<!--<div class="innermenu" id="">
					<ul style="display: flex;justify-content: space-evenly;">
						<li><a href="dodaj.php">Dodaj Pytanie</a></li>
                        <li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
						<li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php">Utwórz test</a></li>
						<li><a href="zarz_testami.php" class="aktualna-strona">Zarządzaj testami</a></li>
					</ul>
				</div>-->

                <div class="table-buttons">
                    <button onclick="toggleVisibility('testTemplates')">Szablony testów</button>
                    <button onclick="toggleVisibility('activeTests')">Testy aktywne</button>
                    <button onclick="toggleVisibility('finishedTests')">Testy zakończone</button>
                </div>

            <h2 class="h2-zarzadzajtestami" id="testTemplatesTitle" style="display:none;">Szablony testów</h2>
                <table id="testTemplates" style="display:none;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł</th>
                            <th>Przedmiot</th>
                            <th>Data Stworzenia</th>
                            <th>Prywatność</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                        <tbody>
                            
                            <?php
                                // WYŚWIETLANIE SZABLONÓW TESTÓw KTÓRE MOŻNA AKTYWOWAĆ

                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "baza";

                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }


                                    $sql = "SELECT  testy_stworzone.id AS id, 
                                                    testy_stworzone.autor AS autor,
                                                    testy_stworzone.przedmiot AS przedmiot,
                                                    testy_stworzone.prywatnosc AS prywatnosc,
                                                    testy_stworzone.tytuł AS tytul,
                                                    testy_stworzone.data_stworzenia AS data_stwo
                                            FROM testy_stworzone;";
                                            //INNER JOIN Przedmioty ON testy_stworzone.przedmiot = przedmioty.id 
                                            //INNER JOIN uzytkownicy ON uzytkownicy.id = testy_stworzone.autor;";


                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '
                                            <tr>
                                                <td>' . $row['id'] . '</td>
                                                <td>' . $row['tytul'] . '</td>
                                                <td>' . $row['przedmiot'] . '</td>
                                                <td>' . $row['data_stwo'] . '</td>
                                                <td>' . ($row['prywatnosc'] === '1' ? 'Tylko dla mnie' : 'Dla wszystkich') . '</td>
                                                <td>
                                                    <button class="test-action-button1" onclick="activateTest(' .  $row['id'] . ')">Aktywuj test</button>
                                                    <button class="test-action-button2" onclick="editTest(' .  $row['id'] . ')">Edytuj</button>
                                                    <button class="test-action-button3" onclick="deleteTest(' .  $row['id'] . ')">Usuń</button>
                                                </td>                        
                                            </form></td>    
                                            </tr>';
                                        }
                                    }
                                    else {
                                        echo '<tr><td>Brak testów do wyświetlenia.</td></tr>';
                                    }
                                    $conn->close();

                            ?>
                        </tbody>
                </table>

                <h2 class="h2-zarzadzajtestami" id="activeTestsTitle" style="display:none;">Testy aktywne</h2>
                <table id="activeTests" style="display:none;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł</th>
                            <th>Przedmiot</th>
                            <th>Od</th>
                            <th>Do</th>
                            <th>Czas trwania</th>
                            <th>Kod testu</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // WYŚWIETLANIE TESTÓW JUŻ AKTYWOWANYCH I DO KTÓRYCH MOŻNA DOŁĄCZYĆ
                            
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "baza";

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }


                                $sql = "SELECT testy_przeprowadzane.id AS id, 
                                                testy_stworzone.tytuł AS tytul, 
                                                przedmioty.nazwa AS przedmiot,
                                                testy_przeprowadzane.od AS od,
                                                testy_przeprowadzane.do AS do,
                                                kod_testu AS kod
                                        FROM testy_przeprowadzane 
                                        INNER JOIN testy_stworzone ON testy_stworzone.id = testy_przeprowadzane.id_testu 
                                        INNER JOIN przedmioty ON testy_stworzone.przedmiot = przedmioty.id
                                        WHERE do >= CURRENT_DATE;";

                                    


                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <tr>
                                            <td>' . $row['id'] . '</td>
                                            <td>' . $row['tytul'] . '</td>
                                            <td>' . $row['przedmiot'] . '</td>
                                            <td>' . $row['od'] . '</td>
                                            <td>' . $row['do'] . '</td>
                                            <td> Czas trwania do poprawy </td>
                                            <td>' . $row['kod'] . '</td>
                                            <td>
                                                <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                                            </td>                        
                                        </form></td>    
                                        </tr>';
                                    }
                                }
                                else {
                                    echo '<tr><td>Brak testów do wyświetlenia.</td></tr>';
                                }
                                $conn->close();

                        ?>
                    </tbody>
                </table>

                <h2 class="h2-zarzadzajtestami" id="finishedTestsTitle" style="display:none;">Testy zakończone</h2>
                <table id="finishedTests" style="display:none;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł</th>
                            <th>Przedmiot</th>
                            <th>Od</th>
                            <th>Do</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // WYŚWIETLANIE TESTÓW KTÓRE JUŻ SIĘ ZAKOŃCZYŁY 
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "baza";

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }


                                $sql = "SELECT testy_przeprowadzane.id AS id, 
                                                testy_stworzone.tytuł AS tytul, 
                                                przedmioty.nazwa AS przedmiot,
                                                testy_przeprowadzane.od AS od,
                                                testy_przeprowadzane.do AS do 
                                        FROM testy_przeprowadzane 
                                        INNER JOIN testy_stworzone ON testy_stworzone.id = testy_przeprowadzane.id_testu 
                                        INNER JOIN przedmioty ON testy_stworzone.przedmiot = przedmioty.id
                                        WHERE do < CURRENT_DATE;";

                                    


                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <tr>
                                            <td>' . $row['id'] . '</td>
                                            <td>' . $row['tytul'] . '</td>
                                            <td>' . $row['przedmiot'] . '</td>
                                            <td>' . $row['od'] . '</td>
                                            <td>' . $row['do'] . '</td>
                                            <td>
                                                <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                                            </td>                        
                                        </form></td>    
                                        </tr>';
                                    }
                                }
                                else {
                                    echo '<tr><td>Brak testów do wyświetlenia.</td></tr>';
                                }
                                $conn->close();

                        ?>
                    </tbody>
                </table>
			</div>
    	</div>

        <div id="overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:50;"></div>
        <div id="datePopup" style="display:none; position:fixed; left:50%; top:50%; transform:translate(-50%, -50%); z-index:100; background:white; padding:20px; border-radius:8px;">
            <h2 class="h2-popup">Ustaw daty testu:</h2>
            <form id="dateForm">
                <label for="startDate">Data rozpoczęcia:</label><br>
                <input type="date" id="startDate" name="startDate" required><br><br>
                <label for="endDate">Data zakończenia:</label><br>
                <input type="date" id="endDate" name="endDate" required><br><br>
                <label for="duration">Czas trwania testu (minuty):</label><br>
                <input type="number" id="duration" name="duration" min="1" required><br><br>
                <label for="startTime">Godzina rozpoczęcia:</label><br>
                <input type="time" id="startTime" name="startTime" required><br><br>
                <label for="endTime">Godzina zakończenia:</label><br>
                <input type="time" id="endTime" name="endTime" required><br><br>
                
                <button type="button" onclick="submitDates(id_testu)">Aktywuj</button>
                <button type="button" onclick="closePopup()">Anuluj</button>
            </form>
        </div>

        <div class="popup2" id="resultsPopup" style="display:none; position:fixed; left:50%; top:50%; transform:translate(-50%, -50%); z-index:100; background:white; padding:20px; border-radius:8px;">
            <h2 class="h2-popup">Wyniki Testu: Przykładowy test</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Punkty</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row (you might populate this with JavaScript or server-side code) -->
                    <tr>
                        <td>1</td>
                        <td>Jan</td>
                        <td>Kowalski</td>
                        <td>85/100</td>
                        <td><button onclick="editResult(1)">Edytuj</button></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Adam</td>
                        <td>Kowalski</td>
                        <td>50/100</td>
                        <td><button onclick="editResult(2)">Edytuj</button></td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Krzysztof</td>
                        <td>Kowalski</td>
                        <td>20/100</td>
                        <td><button onclick="editResult(3)">Edytuj</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" onclick="closeResultsPopup()">Zamknij</button>
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
        let id_testu;
		$("#menu").css('min-height', "calc(100vh - " + H + "px)");
		
		var T = $('#head').height();
		$(".sidebar").css('top', T + "px");

        function editTest(testId) {
            alert('Funkcja edycji dla testu o ID: ' + testId);
            // Możesz tu dodać logikę do otwierania formularza edycji lub przejście do innej strony
        }

        function deleteTest(testId) {
            
            const confirmation = confirm('Czy na pewno chcesz usunąć test o ID: ' + testId + '?');
            if (confirmation) {
                alert('Test usunięty');
                // Tu dodasz logikę usunięcia testu, np. zapytanie AJAX do serwera
            }
        }

        function activateTest(testId) {
            console.log("aktywacja Test ID: ", testId); // Debug: Log the testId
            id_testu = testId;
            console.log("Guwno ", id_testu);
            $("#overlay").show();
            $("#datePopup").show();
    
            $("#dateForm").off('submit').on('submit', function(e) {
                e.preventDefault();
        
                submitDates(id_testu);
            });
        }

        function submitDates(testId) {
            console.log("Guwno z pizdy ", id_testu);
            console.log("Test ID: ", testId);
            console.log("Guwno ", id_testu);

            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            var duration = $("#duration").val();
            var startTime = $("#startTime").val();
            var endTime = $("#endTime").val();

            if (new Date(startDate) > new Date(endDate)) {
                alert("The end date must be after the start date.");
                return;
            }

            $.ajax({
                url: 'aktywuj_test.php',
                type: 'POST',
                data: {
                    test_id: testId,
                    start_date: startDate,
                    end_date: endDate,
                    duration: duration,
                    start_time: startTime,
                    end_time: endTime
                },
                success: function(response) {
                    alert(response);
                    $("#overlay").hide();
                    $("#datePopup").hide();
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        }

        function closePopup() {
            $("#overlay").hide();
            $("#datePopup").hide();
        }

        document.addEventListener("DOMContentLoaded", function() {
        // Pobierz aktualną datę
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // Styczeń to 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;

        // Ustaw wartość pola daty rozpoczęcia na aktualną datę
        document.getElementById('startDate').value = today;
    });

    function toggleVisibility(tableId) {
        
        var allTables = ['testTemplates', 'activeTests', 'finishedTests'];
        var titleSuffix = 'Title'; 
        
        for (var i = 0; i < allTables.length; i++) {
            var currentTable = document.getElementById(allTables[i]);
            var currentTitle = document.getElementById(allTables[i] + titleSuffix);

            if (allTables[i] === tableId) {
                if (currentTable.style.display === 'none') {
                    currentTable.style.display = '';
                    currentTitle.style.display = '';
                } else {
                    currentTable.style.display = 'none';
                    currentTitle.style.display = 'none';
                }
            } else {
                currentTable.style.display = 'none';
                currentTitle.style.display = 'none';
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        toggleVisibility('testTemplates'); // Ensure the first tab is shown when the page loads
    });


    function editResults(testId) {
        // Display the popup
        $("#overlay").show(); // Use existing overlay
        $("#resultsPopup").show(); // Show the results popup

        // Optional: Fetch results from the server using AJAX and populate the table
        // Example: fetchResults(testId);
    }

    function closeResultsPopup() {
        $("#overlay").hide(); // Hide the overlay
        $("#resultsPopup").hide(); // Hide the results popup
    }

    function editResult(resultId) {
        alert('Edycja wyniku dla ID: ' + resultId);
        // You can add more logic here, like opening a detailed edit form
    }



	</script>
</body>
</html>
