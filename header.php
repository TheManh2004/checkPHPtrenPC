<?php
session_start();
include 'dbmysqli.php'; // Kết nối đến cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: /account/login.php'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit;
}

// Lấy thông tin người dùng từ bảng users dựa trên user_id đã đăng nhập
$user_id = $_SESSION['user_id'];
$query = "SELECT name, role FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Learn</title>
    <link rel="stylesheet" href="./giangvien/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ef5ee47b32.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <!-- Header với thanh tìm kiếm -->
    <header>
        <div class="logo-search">
            <a href="index.php"><img src="./image/logo.png" alt="Fast Learn Logo" class="logo"></a>
        </div>
        
        <div class="user-info">
            <div class="clicknotification">
                <div class="notification" id="notification">
                    <i class="fa fa-envelope"></i>
                    <span class="badge">1</span>
                </div>
                <div class="question-list" id="questionList">
                    <ul>
                        <li></li>
                    </ul>
                </div>
            </div>
            <!-- Hiển thị tên người dùng và vai trò từ cơ sở dữ liệu -->
            <span class="username"><?= htmlspecialchars($user['name']) ?></span>
            <span style="color: white; width: 15px; font-size: 20px;">|</span>
            <span class="role"><?= htmlspecialchars($user['role']) ?></span>
            
            <div class="arrow-container">
                <button id="toggleMenuBtn" class="arrow-bottom">▼</button>
                <div id="menuContent" class="hidden">
                    <ul>
                        <li id="accountBtn"><img src="./image/account.png" alt="Tài khoản" /><a href="./account/account.php">Tài Khoản</a></li>
                        <li><img src="./image/khoahoc.png" alt="Khóa học" /><a href="index.php">Khóa học</a></li>
                        <li><img src="./image/hopthu.png" alt="Hộp thư" id="mailbox" /><a href="hopthu.php">Hộp thư</a></li>
                        <li><img src="./image/help.png" alt="Trợ giúp" /><a href="#">Trợ giúp</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    