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
						<li><a href="zarz_pyt.php">Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php">Utwórz test</a></li>
						<li><a href="zarz_testami.php" class="aktualna-strona">Zarządzaj testami</a></li>
					</ul>
				</div>
        <h2 class="h2-zarzadzajtestami">Zarządzaj testami</h2>
                <table id="testyTable">
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
                <button type="button" onclick="submitDates()">Aktywuj</button>
                <button type="button" onclick="closePopup()">Anuluj</button>
            </form>
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
            $("#overlay").show(); // Show the overlay
            $("#datePopup").show(); // Show the popup
            $("#dateForm").off('submit').on('submit', function(e) {
                e.preventDefault();
                submitDates(testId); // Pass the test ID to submit function
            });
        }

        function submitDates(testId) {
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
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



	</script>
</body>
</html>