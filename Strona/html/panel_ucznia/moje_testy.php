<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the groups the user belongs to
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

// Convert group IDs to a comma-separated string for SQL IN clause
$group_ids_str = implode(",", $group_ids);

if (empty($group_ids)) {
    $group_ids_str = 'NULL'; // If no groups, prevent SQL error
}

// Query to get the tests assigned to the user or their groups
$sql = "
    SELECT 
        tp.id AS test_id,
        ts.tytuł AS test_title,
        tp.od AS start_time,
        tp.do AS end_time,
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
    $assigned_tests[] = $row;
}

$stmt->close();
$conn->close();
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
  <div class="container" id="con">

    <div class="sidebar" id="menu">
      
      <ul>
        <h2>Menu</h2>
        <li><a href="strona_glowna.php">Strona główna</a></li>
        <li><a href="dolacz_kod.php">Dołącz do testu</a></li>
        <li><a href="moje_testy.php"  class="aktualna-strona">Moje testy</a></li>
      </ul>


      <ul>
      <li><a href="../logowanie/logout.php">Wyloguj</a></li>
        <li><a href="../kontakt.php">Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
      <h2>Do wypełnienia</h2>
      &nbsp;
      <div class="do_wypelnienia">
      <table>
        <tr>
          <th class="szerokie">Nazwa</th>
          <th>Aktywny od</th>
          <th>Aktywny do</th>
          <th>Nauczyciel</th>
          <th>Przedmiot</th>
          <th>Operacje</th>
        </tr>
        <?php if (empty($assigned_tests)): ?>
          <tr><td colspan="6">Brak testów do wyświetlenia.</td></tr>
        <?php else: ?>
          <?php foreach ($assigned_tests as $test): ?>
            <tr>
              <td><?php echo htmlspecialchars($test['test_title']); ?></td>
              <td><?php echo htmlspecialchars($test['start_time']); ?></td>
              <td><?php echo htmlspecialchars($test['end_time']); ?></td>
              <td><?php echo htmlspecialchars($test['teacher_first_name'] . ' ' . $test['teacher_last_name']); ?></td>
              <td><?php echo htmlspecialchars($test['subject_name']); ?></td>
              <td style="text-align:center;">
                <a style="width:100%; text-align:center;" href="../test.php?id=<?php echo $test['test_id']; ?>">Dołącz</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>



      <!--
      <table>
				<tbody><tr>
					<th class="szerokie">Nazwa</th>
					<th>Data wykonania</th>
					<th>Nauczyciel</th>
					<th>Przedmiot</th>
					<th>Waga</th>
					<th>Operacje</th>
				</tr>
				<tr>
							<td>Sprawdzian z nut - Klasa III</td>
							<td>02.04.2024</td>
							<td>Jan Kowalski</td>
							<td>Muzyka</td>
							<td>2</td>
							<td style="text-align:center;"><a style="width:100%; text-align:center;" href="../test.php">Dołącz</a></td>

							</tr>
        <tr>
              <td>Budowa Pantofelka i laćka</td>
              <td>08.04.2024</td>
              <td>Anna Nowak</td>
              <td>Przyroda</td>
              <td>1</td>
							<td style="text-align:center;"><a style="width:100%; text-align:center;" href="../test.php">Dołącz</a></td>
							</tr>

										</tbody></table>-->




      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <h2>Ukończone</h2>
      &nbsp;
            <div class="do_wypelnienia">
            <table>
              <tbody><tr>
                <th class="szerokie">Nazwa</th>
                <th>Data ukończenia</th>
                <th>Nauczyciel</th>
                <th>Przedmiot</th>
                <th>Waga</th>
                <th>Ocena</th>
                <th>Punkty</th>
              </tr>
              <tr>
                <td>Dział 3 - Polska 1944-1989</td>
                <td>28.03.2024</td>
                <td>Ewa Meisner</td>
                <td>Historia</td>
                <td>2</td>
                <td>5</td>
                <td>18/20</td>
      
                    </tr>
              <tr>
                    <td>Układy równań</td>
                    <td>01.04.2024</td>
                    <td>Grażyna Kopeć</td>
                    <td>Matematyka</td>
                    <td>5</td>
                    <td>1</td>
                    <td>12/30</td>
                    </tr>
      
                          </tbody></table>
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
$("#menu").css('height', "calc(100vh - " + H + "px)");

var T = $('#head').height();
  $(".sidebar").css('top', T+ "px");

</script>
</body>
</html>
