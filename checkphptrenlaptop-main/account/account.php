<?php
// Start session for user login, if needed
session_start();

// Include the PHP files to handle different form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['savePhoneBtn']) || isset($_POST['saveGmailBtn']) || isset($_POST['saveGenderBtn']) || isset($_POST['saveRoleBtn'])) {
        include 'profile_edit.php';  // This will handle profile edits
    }

    if (isset($_POST['changePasswordBtn'])) {
        include 'change_password.php';  // This will handle password change
    }

    if (isset($_POST['logoutBtn'])) {
        include 'logout.php';  // This will handle logout
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/ef5ee47b32.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="account-content">
        <div class="header">
            <img style="width: 100px; height: 100px;" src="../image/logo.png" alt="logo">
            <h2>Tài Khoản</h2>
        </div>

        <!-- Personal Information Section -->
        <form method="POST" action="account.php">
            <div id="personalInfo" class="info-box">

                <!-- Phone Number -->
                <div class="info-item">
                    <span id="phoneDisplay">Thông tin liên hệ: Nguyễn Thế Mạnh, +84963331381</span>
                    <i class="fa fa-arrow-right edit-icon" onclick="toggleEdit('phone')"></i>
                    <i class="fa fa-times cancel-icon" onclick="cancelEdit('phone')" style="display:none;"></i>
                </div>
                <input type="text" id="phoneInput" name="phone" placeholder="Nhập số điện thoại mới" style="display:none;">
                <button class="save-btn" id="savePhoneBtn" type="submit" name="savePhoneBtn" style="display:none;">Lưu</button>

                <!-- Gmail -->
                <div class="info-item">
                    <span id="gmailDisplay">Gmail: themanh20004@gmail.com</span>
                    <i class="fa fa-arrow-right edit-icon" onclick="toggleEdit('gmail')"></i>
                    <i class="fa fa-times cancel-icon" onclick="cancelEdit('gmail')" style="display:none;"></i>
                </div>
                <input type="email" id="gmailInput" name="gmail" placeholder="Nhập Gmail mới" style="display:none;">
                <button class="save-btn" id="saveGmailBtn" type="submit" name="saveGmailBtn" style="display:none;">Lưu</button>

                <!-- Gender -->
                <div class="info-item">
                    <span id="genderDisplay">Giới tính: Nam</span>
                    <i class="fa fa-arrow-right edit-icon" onclick="toggleEdit('gender')"></i>
                    <i class="fa fa-times cancel-icon" onclick="cancelEdit('gender')" style="display:none;"></i>
                </div>
                <input type="text" id="genderInput" name="gender" placeholder="Nhập giới tính mới" style="display:none;">
                <button class="save-btn" id="saveGenderBtn" type="submit" name="saveGenderBtn" style="display:none;">Lưu</button>

                <!-- Role -->
                <div class="info-item">
                    <span id="roleDisplay">Vai trò: Giảng viên</span>
                    <i class="fa fa-arrow-right edit-icon" onclick="toggleEdit('role')"></i>
                    <i class="fa fa-times cancel-icon" onclick="cancelEdit('role')" style="display:none;"></i>
                </div>
                <input type="text" id="roleInput" name="role" placeholder="Nhập vai trò mới" style="display:none;">
                <button class="save-btn" id="saveRoleBtn" type="submit" name="saveRoleBtn" style="display:none;">Lưu</button>
            </div>
        </form>

        <!-- Password Change Section -->
        <form method="POST" action="account.php">
            <div id="passwordChange" class="info-box">
                <h3>Đổi mật khẩu</h3>
                <label for="oldPassword">Mật khẩu cũ</label>
                <input type="password" id="oldPassword" name="oldPassword" placeholder="Nhập mật khẩu cũ" required>

                <label for="newPassword">Mật khẩu mới</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Nhập mật khẩu mới" required>

                <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu mới" required>

                <button id="confirmPasswordChange" type="submit" name="changePasswordBtn">Đổi mật khẩu</button>
            </div>
        </form>

        <!-- Logout Button -->
        <form method="POST" action="account.php">
            <button class="logout" id="logoutBtn" type="submit" name="logoutBtn">Đăng xuất</button>
        </form>
    </div>

    <script src="./js/script.js"></script>
</body>

</html>
