<?php
session_start();
include '../dbmysqli.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone_number'] ?? null;
    $gmail = $_POST['gmail'] ?? null;
    $gender = $_POST['gender'] ?? null;

    
    // Update phone number
    if (!empty($phone) && preg_match("/^[0-9]{10}$/", $phone)) {
        $stmt = $conn->prepare("UPDATE users SET phone_number = ? WHERE id = ?");
        $stmt->bind_param("si", $phone, $user_id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Số điện thoại không hợp lệ!";
    }

    // Update email
    if ($gmail) {
        $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
        $stmt->bind_param("si", $gmail, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // Update gender
    if ($gender) {
        $stmt = $conn->prepare("UPDATE users SET gender = ? WHERE id = ?");
        $stmt->bind_param("si", $gender, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    header('Location: account.php'); // Redirect back to account page after saving
}
?>