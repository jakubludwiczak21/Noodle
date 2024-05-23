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
						<li><a href="dodaj_kat.php" class="aktualna-strona">Dodaj przedmiot i kategorie</a></li>
						<li><a href="zarz_pyt.php" >Zarządzaj pytaniami</a></li>
						<li><a href="utworz_test.php">Utwórz test</a></li>
						<li><a href="zarz_testami.php">Zarządzaj testami</a></li>
					</ul>
				</div>
				<div class="haslo" style="justify-content: flex-start;">

					&nbsp;&nbsp;&nbsp;&nbsp;
					<p style="margin-bottom:1em">Zarządzaj przedmiotami i kategoriami</p>
					<br><br>
					<div class="kat" style="display: flex;min-width:80%;justify-content:space-evenly">
					<div style="max-width:40%">
					<fieldset>
						<legend>Wypełnij formularz:</legend>
						<form action="" method="POST" class="zarzadzaj">


							<p class="mid-width" style="grid-column: 1 / 7;">Dodaj Kategorie i przypisz do przedmiotu</p>
					


							<input type="text" name="category_name" placeholder="Wpisz nazwę kategorii" style="grid-column: 1 / 3;" >  
							
							<select name="subject_select" style="grid-column: 3 / 5;" required>
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
							<input type="submit"  name="category_add" style="grid-column: 5 / 6;" value="Dodaj">
						</form>
					</fieldset>
					<br>
					<div class="pytania" style="width: 100%;">
						<table>
							<tbody>
								<tr>
									<th class="szerokie">Nazwa Kategorii</th>
									<th colspan="2">Operacje</th>
								</tr>

                                <?php
                                    $sql = "SELECT kategoria.id, kategoria.nazwa AS kategoria
									FROM kategoria;";
						
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '
                                            <tr>
                                                <td>' . $row['kategoria'] . '</td>
												<form method="POST" class="zarzadzaj">
													<input type="hidden" name="category_id" value="'.$row['id'].'">
													<td style="text-align:center;">
														<button type="submit" name="delete_category" class="delete" style="color: red;">Usuń</button>
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
					<div style="max-width:40%">
					<fieldset>
						<legend>Wypełnij formularz:</legend>
						<form action="" method="POST" class="zarzadzaj">


							<p class="mid-width" style="grid-column: 1 / 7;">Dodaj Przedmiot</p>

				


							
							<input type="text" id="subject_name" name="subject_name" placeholder="Wpisz nazwę przedmiotu" style="grid-column: 1 / 5;" >
							
							
							<input type="submit" name="subject_add" style="grid-column: 5 / 6;" value="Dodaj">
						</form>
					</fieldset>
					<br>
					<div class="pytania" style="width: 100%;">
						<table>
							<tbody>
								<tr>
									<th class="szerokie">Nazwa Przedmiotu</th>
									<th colspan="2">Operacje</th>
								</tr>

                                <?php
                                    $sql = "SELECT przedmioty.id, przedmioty.nazwa AS przedmiot
											FROM przedmioty";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '
                                            <tr>
                                                <td>' . $row['przedmiot'] . '</td>                                    
												<form method="POST" class="zarzadzaj">
													<input type="hidden" name="subject_id" value="'.$row['id'].'">
													<td style="text-align:center;">
														<button type="submit" name="delete_subject" class="delete" style="color: red;">Usuń</button>
													</td>
												</form>

                                      
                                            </form></td>    
                                            </tr>';
                                        }
                                    }
                                    else {
                                        echo '<tr><td colspan="7">Brak przedmiotów do wyświetlenia.</td></tr>';
                                    }

                                ?>

								
								
								
							</tbody>
						</table>
					</div>
					</div>
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['subject_add'])) {
	$_subject_name = $_POST['subject_name'];

	$sql_add ="INSERT INTO `przedmioty` (`id`, `nazwa`) VALUES (NULL, '$_subject_name');";

	if($result = $conn->query($sql_add)) {
		echo "<meta http-equiv='refresh' content='0'>";
	}
	
	else echo "Nie dodano przedmiotu";
}


if(isset($_POST['category_add'])) {
    $_subject_name = $_POST['subject_select'];
    $_category = $_POST['category_name'];

    $category_add = "INSERT INTO `kategoria` (`id`, `nazwa`) VALUES (NULL, '$_category');";

    if($result = $conn->query($category_add)) {
        $subject_id_query = "SELECT id FROM przedmioty WHERE nazwa = '$_subject_name';";
        $subject_id_result = $conn->query($subject_id_query);
        if($subject_id_result->num_rows > 0) {
            $subject_row = $subject_id_result->fetch_assoc();
            $_subject_id = $subject_row['id'];

            $category_id_query = "SELECT id FROM kategoria WHERE nazwa = '$_category';";
            $category_id_result = $conn->query($category_id_query);
            if($category_id_result->num_rows > 0) {
                $category_row = $category_id_result->fetch_assoc();
                $_category_id = $category_row['id'];

                $category_subject = "INSERT INTO `kategoria_przedmiot` (`id_kategorii`, `id_przedmiotu`) VALUES ('$_category_id', '$_subject_id');";
                if($conn->query($category_subject)) {
                    echo "Kategoria została pomyślnie przypisana do przedmiotu.";
					echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo "Błąd podczas przypisywania kategorii do przedmiotu: " . $conn->error;
                }
            } else {
                echo "Nie znaleziono ID kategorii.";
            }
        } else {
            echo "Nie znaleziono ID przedmiotu.";
        }
    } else {
        echo "Błąd podczas dodawania kategorii: " . $conn->error;
    }
}



if (isset($_POST['delete_subject'])) {
	$record_id = $_POST['subject_id'];

	$sql = "DELETE FROM przedmioty WHERE przedmioty.id = $record_id";

	if ($conn->query($sql)) {
		echo "Category deleted successfully";
		echo "<meta http-equiv='refresh' content='0'>";
		
	} 
	else {
		echo "Nie można usunąć kategorii z powiązanymi pytaniami: " . $conn->error;
	}

	$conn->close();
} 
else {
	echo "No record ID provided";
}



if (isset($_POST['delete_category'])) {
        $record_id = $_POST['category_id'];

        $sql = "DELETE FROM kategoria WHERE kategoria.id = $record_id";

        if ($conn->query($sql)) {
            echo "Category deleted successfully";
			echo "<meta http-equiv='refresh' content='0'>";
			
        } 
		else {
            echo "Nie można usunąć kategorii z powiązanymi pytaniami: " . $conn->error;
        }

        $conn->close();
		echo "<meta http-equiv='refresh' content='0'>";
    } 
	else {
        echo "No record ID provided";
    }
	
?>