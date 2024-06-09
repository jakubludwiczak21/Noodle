<?php
// get_kategorie.php

// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobranie ID przedmiotu z żądania POST
$przedmiotId = $_POST['przedmiot_id'];

// Zapytanie SQL pobierające kategorie dla danego przedmiotu
$sql = "SELECT k.nazwa FROM kategoria k
        INNER JOIN kategoria_przedmiot kp ON k.id = kp.id_kategorii
        WHERE kp.id_przedmiotu = $przedmiotId";

$result = $conn->query($sql);

// Generowanie opcji wyboru kategorii
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['nazwa'] . '">' . $row['nazwa'] . '</option>';
    }
}

echo $options;

$conn->close();
?>
