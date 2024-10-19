<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logoutBtntrangchu'])) {
    // Clear the session data
    session_start();

    // Redirect to the login page
    header("Location: ../index.php");
    exit();
}
?>
