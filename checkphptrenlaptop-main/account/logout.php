<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logoutBtn'])) {
    // Clear the session data
    session_start();
    session_destroy();

    // Redirect to the login page
    header("Location: dn.php");
    exit();
}
?>
