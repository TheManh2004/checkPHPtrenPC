<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePasswordBtn'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if any field is empty
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
        exit;
    }

    // Check if new passwords match
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Mật khẩu mới không khớp!');</script>";
        exit;
    }

    // Example: Fetch the user's current password from the database
    // $currentPassword = fetchPasswordFromDatabase($userId);

    // Example logic for checking if old password matches
    // if (!password_verify($oldPassword, $currentPassword)) {
    //     echo "<script>alert('Mật khẩu cũ không đúng!');</script>";
    //     exit;
    // }

    // Update the password in the database
    // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    // updatePasswordInDatabase($userId, $hashedPassword);

    echo "<script>alert('Mật khẩu đã được đổi thành công!');</script>";
}
?>
