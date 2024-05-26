<?php
session_start();
session_unset();
session_destroy();

header("Location: panel_nauczyciela.php");
exit();
?>