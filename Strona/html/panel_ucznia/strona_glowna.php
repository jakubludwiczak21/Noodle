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
        <li><a href="strona_glowna.php" class="aktualna-strona">Strona główna</a></li>
        <li><a href="dolacz_kod.php">Dołącz do testu</a></li>
        <li><a href="moje_testy.php" >Moje testy</a></li>
      </ul>


      <ul>
        <li><a href="../logowanie/logout.php">Wyloguj</a></li>
        <li><a href="../kontakt.php">Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
      <h2 style="text-align:center; margin-top: 2em;">Najnowsze testy</h2>
      <div class="do_wypelnienia">
        
      <table>
				<tbody><tr>
					<th class="szerokie">Nazwa</th>
					<th>Data wykonania</th>
					<th>Nauczyciel</th>
					<th>Przedmiot</th>
					<th>Waga</th>
          <th>Kod dostępu</th>
					<th>Operacje</th>
				</tr>

        <?php

          $user_id = $_SESSION['user_id'];
          
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "baza";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql_groups = "
          SELECT id_grupy
          FROM grupy_przypisania
          WHERE id_osoby = ?
          ";

          $stmt_groups = $conn->prepare($sql_groups);
          if (!$stmt_groups) {
          die("Query preparation failed: " . $conn->error);
          }
          $stmt_groups->bind_param("i", $user_id);
          $stmt_groups->execute();
          $result_groups = $stmt_groups->get_result();

          $group_ids = [];
          while ($row = $result_groups->fetch_assoc()) {
          $group_ids[] = $row['id_grupy'];
          }
          $stmt_groups->close();

          $group_ids_str = implode(",", $group_ids);

          if (empty($group_ids)) {
          $group_ids_str = 'NULL'; 
          }

          $sql = "
          SELECT 
              tp.id AS test_id,
              ts.tytuł AS test_title,
              tp.od AS start_time,
              tp.do AS end_time,
              tp.kod_testu AS code,
              u.imie AS teacher_first_name,
              u.nazwisko AS teacher_last_name,
              pr.nazwa AS subject_name
          FROM przypisania p
          JOIN testy_przeprowadzane tp ON p.id_testu = tp.id
          JOIN testy_stworzone ts ON tp.id_testu = ts.id
          JOIN uzytkownicy u ON tp.autor = u.id
          JOIN przedmioty pr ON ts.przedmiot = pr.id
          WHERE (p.id_osoby = ? OR p.id_grupy IN ($group_ids_str))
          AND tp.do >= NOW()
          GROUP BY tp.id
          ";

          $stmt = $conn->prepare($sql);
          if (!$stmt) {
          die("Query preparation failed: " . $conn->error);
          }
          $stmt->bind_param("i", $user_id);
          $stmt->execute();
          $result = $stmt->get_result();

          $assigned_tests = [];
          while ($row = $result->fetch_assoc()) {
                echo '
                  <tr>
							      <td>'. $row['test_title'] .'</td>
							      <td>'. $row['end_time'] .'</td>
                    <td>'. $row['teacher_first_name'] . ' ' . $row['teacher_last_name'] .'</td>
                    <td>'. $row['subject_name'] .'</td>
                    <td>2</td>
                    <td>'. $row['code'] .'</td>
                    <td style="text-align:center;"><a style="width:100%; text-align:center;" href="dolacz_kod.php?kod=' . $row['code'] . '">Dołącz</a></td>							    
                  </tr>
                  ';
                #<td style="text-align:center;"><a style="width:100%; text-align:center;" href="../kontakt.php">Poproś o dostęp</a></td>

          }
          
        ?>
        </tbody></table>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
      &nbsp;
      <div class="dol">
      <div class="do_wypelnienia" style="width: 50%;">
        <div> 
          <h2 style="margin-bottom: 1em;">Twoje Komunikaty</h2>
            <p1 style="text-align:center; color: orange;">Aktualnie nie posiadasz żadnych komunikatów!</p1>
          
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
