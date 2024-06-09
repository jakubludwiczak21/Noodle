<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug: Log all incoming POST data
    error_log(print_r($_POST, true));

    $test_id = $_POST['test_id'] ?? null;
    $start_date = $_POST['start_date'] ?? null;
    $end_date = $_POST['end_date'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $start_time = $_POST['start_time'] ?? null;
    $end_time = $_POST['end_time'] ?? null;
    $author_id = $_SESSION['user_id'] ?? null;

    // Check for missing fields
    if (!$test_id || !$start_date || !$end_date || !$start_time || !$end_time || !$author_id) {
        echo "Missing required fields.";
        exit();
    }

    // Generate test code
    $sql = "SELECT tytuł FROM testy_stworzone WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $test_id);
    $stmt->execute();
    $stmt->bind_result($test_title);
    $stmt->fetch();
    $stmt->close();

    // Insert new record into testy_przeprowadzane
    $sql = "INSERT INTO testy_przeprowadzane (id_testu, autor, od, do) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $start_datetime = $start_date . ' ' . $start_time;
    $end_datetime = $end_date . ' ' . $end_time;
    $stmt->bind_param("iiss", $test_id, $author_id, $start_datetime, $end_datetime);

    if ($stmt->execute()) {
        // Get the ID of the newly inserted record
        $new_test_id = $stmt->insert_id;

        // Generate the test code
        $test_code = substr(preg_replace("/[^a-zA-Z0-9]/", "", $test_title), 0, 10) . $new_test_id;

        // Update the record with the generated test code
        $update_sql = "UPDATE testy_przeprowadzane SET kod_testu = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $test_code, $new_test_id);

        if ($update_stmt->execute()) {
            echo "Test activated successfully!";
        } else {
            echo "Error updating test code: " . $update_stmt->error;
        }

        $update_stmt->close();
    } else {
        echo "Error inserting test: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
