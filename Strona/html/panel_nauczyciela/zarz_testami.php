<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../../jquery-3.7.1min.js"></script>
	<title>Noodle™</title>
	<link rel="stylesheet" href="../../styles.css">


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
            position: 
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
				<li><a href="../../index.php">Strona główna</a></li>
				<li><a href="../dolacz_kod.php">Dołącz do testu</a></li>
				<li><a href="../moje_testy.php" class="dropdown-btn">Moje testy</a></li>
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
                        <li><a href="dodaj_kat.php">Dodaj przedmiot i kategorie</a></li>
						<li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php">Utwórz test</a></li>
						<li><a href="zarz_testami.php" class="aktualna-strona">Zarządzaj testami</a></li>
					</ul>
				</div>

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
                            <tr>
                                <td>1</td>
                                <td>Wstęp do matematyki</td>
                                <td>Matematyka</td>
                                <td>2023-10-01</td>
                                <td>Prywatny</td>
                                <td>
                                    <button class="test-action-button1" onclick="activateTest(1)">Aktywuj test</button>
                                    <button class="test-action-button2" onclick="editTest(1)">Edytuj</button>
                                    <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Odkrycia geograficzne</td>
                                <td>Historia</td>
                                <td>2023-09-15</td>
                                <td>Publiczny</td>
                                <td>
                                    <button class="test-action-button1" onclick="activateTest(2)">Aktywuj test</button>
                                    <button class="test-action-button2" onclick="editTest(2)">Edytuj</button>
                                    <button class="test-action-button3" onclick="deleteTest(2)">Usuń</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Podstawy chemii</td>
                                <td>Chemia</td>
                                <td>2023-08-20</td>
                                <td>Prywatny</td>
                                <td>
                                    <button class="test-action-button1" onclick="activateTest(3)">Aktywuj test</button>
                                    <button class="test-action-button2" onclick="editTest(3)">Edytuj</button>
                                    <button class="test-action-button3" onclick="deleteTest(3)">Usuń</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Wprowadzenie do fizyki</td>
                                <td>Fizyka</td>
                                <td>2023-07-05</td>
                                <td>Publiczny</td>
                                <td>
                                    <button class="test-action-button1" onclick="activateTest(4)">Aktywuj test</button>
                                    <button class="test-action-button2" onclick="editTest(4)">Edytuj</button>
                                    <button class="test-action-button3" onclick="deleteTest(4)">Usuń</button>
                                </td>
                            </tr>
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
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Odkrycia geograficzne</td>
                            <td>Matematyka</td>
                            <td>2023-05-01</td>
                            <td>2023-05-10</td>
                            <td>30min</td>
                            <td>
                                <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Odkrycia geograficzne</td>
                            <td>Fizyka</td>
                            <td>2023-06-15</td>
                            <td>2023-06-25</td>
                            <td>40min</td>
                            <td>
                            <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Odkrycia geograficzne</td>
                            <td>Chemia</td>
                            <td>2023-07-01</td>
                            <td>2023-07-05</td>
                            <td>20min</td>
                            <td>
                            <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                            </td>
                        </tr>
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
                        <tr>
                            <td>1</td>
                            <td>Podstawy chemii</td>
                            <td>Matematyka</td>
                            <td>2023-05-01</td>
                            <td>2023-05-10</td>
                            <td>
                            <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Podstawy chemii</td>
                            <td>Fizyka</td>
                            <td>2023-06-15</td>
                            <td>2023-06-25</td>
                            <td>
                            <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Podstawy chemii</td>
                            <td>Chemia</td>
                            <td>2023-07-01</td>
                            <td>2023-07-05</td>
                            <td>
                                <button class="test-action-button2" onclick="editResults(1)">Zobacz/Edytuj wyniki</button>
                                <button class="test-action-button3" onclick="deleteTest(1)">Usuń</button>
                            </td>
                        </tr>
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
                <button type="button" onclick="submitDates()">Aktywuj</button>
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
            $("#overlay").show(); 
            $("#datePopup").show(); 
            $("#dateForm").off('submit').on('submit', function(e) {
                e.preventDefault();
                submitDates(testId); 
            });
        }

        function submitDates(testId) {
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            var duration = $("#duration").val();
            if (new Date(startDate) > new Date(endDate)) {
                alert("The end date must be after the start date.");
                return;
            }
            // Here you can add AJAX to send these dates to the server
            alert('Test with ID ' + testId + ' activated from ' + startDate + ' to ' + endDate);
            $("#overlay").hide(); // Hide the overlay after submitting
            $("#datePopup").hide(); // Hide the popup after submitting
        }

        function closePopup() {
            $("#overlay").hide(); // Hide the overlay
            $("#datePopup").hide(); // Hide the popup
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
