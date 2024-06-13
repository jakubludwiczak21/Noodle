<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize incoming POST data
    $test_id = sanitize_input($_POST['test_id'] ?? null);
    $start_date = sanitize_input($_POST['start_date'] ?? null);
    $end_date = sanitize_input($_POST['end_date'] ?? null);
    $start_time = sanitize_input($_POST['start_time'] ?? null);
    $end_time = sanitize_input($_POST['end_time'] ?? null);
    $groups = $_POST['groups'] ?? [];
    $students = $_POST['students'] ?? [];
    $author_id = $_SESSION['user_id'] ?? null;

    // Validate required fields
    if (!$test_id || !$start_date || !$end_date || !$start_time || !$end_time || !$author_id) {
        echo "Missing required fields.";
        exit();
    }

    // Insert test into testy_przeprowadzane table
    $sql_insert_test = "INSERT INTO testy_przeprowadzane (id_testu, autor, od, do) VALUES (?, ?, ?, ?)";
    $stmt_insert_test = $conn->prepare($sql_insert_test);
    $start_datetime = $start_date . ' ' . $start_time;
    $end_datetime = $end_date . ' ' . $end_time;
    $stmt_insert_test->bind_param("iiss", $test_id, $author_id, $start_datetime, $end_datetime);

    if ($stmt_insert_test->execute()) {
        $new_test_id = $stmt_insert_test->insert_id;

        // Generate test code
        $sql_get_test_title = "SELECT tytuł FROM testy_stworzone WHERE id = ?";
        $stmt_get_test_title = $conn->prepare($sql_get_test_title);
        $stmt_get_test_title->bind_param("i", $test_id);
        $stmt_get_test_title->execute();
        $stmt_get_test_title->bind_result($test_title);
        $stmt_get_test_title->fetch();
        $stmt_get_test_title->close();

        // Generate test code based on test title and ID
        $test_code = substr(preg_replace("/[^a-zA-Z0-9]/", "", $test_title), 0, 10) . $new_test_id;

        // Update test with generated test code
        $sql_update_test_code = "UPDATE testy_przeprowadzane SET kod_testu = ? WHERE id = ?";
        $stmt_update_test_code = $conn->prepare($sql_update_test_code);
        $stmt_update_test_code->bind_param("si", $test_code, $new_test_id);
        if (!$stmt_update_test_code->execute()) {
            echo "Error updating test code: " . $stmt_update_test_code->error;
            exit();
        }
        $stmt_update_test_code->close();

        // Associate groups with the test
        if (!empty($groups)) {
            $sql_insert_groups = "INSERT INTO przypisania (id_testu, id_grupy) VALUES (?, ?)";
            $stmt_insert_groups = $conn->prepare($sql_insert_groups);
            foreach ($groups as $groupId) {
                $stmt_insert_groups->bind_param("ii", $new_test_id, $groupId);
                if (!$stmt_insert_groups->execute()) {
                    echo "Error associating groups: " . $stmt_insert_groups->error;
                    exit();
                }
            }
            $stmt_insert_groups->close();
        }

        // Associate students with the test
        if (!empty($students)) {
            $sql_insert_students = "INSERT INTO przypisania (id_testu, id_osoby) VALUES (?, ?)";
            $stmt_insert_students = $conn->prepare($sql_insert_students);
            foreach ($students as $studentId) {
                $stmt_insert_students->bind_param("ii", $new_test_id, $studentId);
                if (!$stmt_insert_students->execute()) {
                    echo "Error associating students: " . $stmt_insert_students->error;
                    exit();
                }
            }
            $stmt_insert_students->close();
        }

        echo "Test activated successfully!";
    } else {
        echo "Error inserting test: " . $stmt_insert_test->error;
    }

    // Close statements and connection
    $stmt_insert_test->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
