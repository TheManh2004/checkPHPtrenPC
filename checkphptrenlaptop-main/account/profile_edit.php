<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['savePhoneBtn'])) {
        $phone = $_POST['phone'];
        if (!empty($phone)) {
            // Update phone number in the database
            // updatePhoneInDatabase($userId, $phone);
            echo "<script>alert('Số điện thoại đã được cập nhật!');</script>";
        } else {
            echo "<script>alert('Vui lòng nhập thông tin mới!');</script>";
        }
    }

    if (isset($_POST['saveGmailBtn'])) {
        $gmail = $_POST['gmail'];
        if (!empty($gmail)) {
            // Update Gmail in the database
            // updateGmailInDatabase($userId, $gmail);
            echo "<script>alert('Gmail đã được cập nhật!');</script>";
        } else {
            echo "<script>alert('Vui lòng nhập thông tin mới!');</script>";
        }
    }

    if (isset($_POST['saveGenderBtn'])) {
        $gender = $_POST['gender'];
        if (!empty($gender)) {
            // Update gender in the database
            // updateGenderInDatabase($userId, $gender);
            echo "<script>alert('Giới tính đã được cập nhật!');</script>";
        } else {
            echo "<script>alert('Vui lòng nhập thông tin mới!');</script>";
        }
    }

    if (isset($_POST['saveRoleBtn'])) {
        $role = $_POST['role'];
        if (!empty($role)) {
            // Update role in the database
            // updateRoleInDatabase($userId, $role);
            echo "<script>alert('Vai trò đã được cập nhật!');</script>";
        } else {
            echo "<script>alert('Vui lòng nhập thông tin mới!');</script>";
        }
    }
}
?>
