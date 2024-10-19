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
    <header>
        <div class="logo-search">
            <a href="index.php"><img src="./image/logo.png" alt="Fast Learn Logo" class="logo"></a>
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm tài liệu">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="user-info">
            <div class="clicknotification">
            <div class="notification" id="notification">
                <i class="fa fa-envelope"></i>
                <span class="badge">1</span>
            </div>
            <div class="question-list" id="questionList">
                <ul>
                    <li>
                        
                    </li>
                </ul>
            </div>
            </div>
            <span class="username">Nguyễn Thế Mạnh</span>
            <span style="color: white; 
                        width: 15px;
                        font-size: 20px;">|</span>
            <span class="role">Giảng viên</span>
            <div class="arrow-container">
                <button id="toggleMenuBtn" class="arrow-bottom">▼</button>
                <div id="menuContent" class="hidden">
                    <ul>
                        <li id="accountBtn"><img src="./image/account.png" alt="Tài khoản" /><a href="./account/account.php">Tài Khoản</a></li>
                        <li><img src="./image/khoahoc.png" alt="Khóa học" /><a href="index.php">Khóa học</a></li>
                        <li><img src="./image/hopthu.png" alt="Hộp thư" id="mailbox" /><a href="#">Hộp thư</a></li>
                        <li><img src="./image/help.png" alt="Trợ giúp" /><a href="#">Trợ giúp</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>