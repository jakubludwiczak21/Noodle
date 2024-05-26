<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../panel_nauczyciela/panel_nauczyciela.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>