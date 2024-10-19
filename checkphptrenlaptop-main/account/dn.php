<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/533aad8d01.js" crossorigin="anonymous"></script>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    width: 100%;
    max-width: 400px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
}


.exit {
    float: right;
    font-size: 20px;
}

.tabs {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.tabs button {
    flex: 1;
    background: none;
    border: none;
    font-size: 16px;
    padding: 10px;
    cursor: pointer;
    border-bottom: 2px solid transparent;
}

.tabs button.btn-login {
    border-bottom: 2px solid #0095FF;
}

.btn-register {
    color: #000;
    text-decoration: none
}

.login-form form {
    display: flex;
    flex-direction: column;
}

.login-form label {
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
}

.login-form select,
.login-form input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

.forgot-password {
    text-align: right;
    margin-bottom: 20px;
}

.forgot-password a {
    color: #0095FF;
    text-decoration: none;
    font-size: 14px;
}

.forgot-password a:hover {
    text-decoration: underline;
}

.login-button {
    padding: 10px;
    background-color: #0095FF;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.login-button:hover {
    background-color: #4fb4fc;
}

.divider {
    text-align: center;
    margin: 20px 0;
    font-size: 14px;
    color: #666;
}

.social-login {
    display: flex;
    justify-content: space-between;
}

.social-login button {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    margin-right: 5px;
    color: white;
}

.social-login button:last-child {
    margin-right: 0;
}

.facebook {
    background-color: #3b5998;
}

.facebook:hover{
    background-color: #4d6598;
}

.google {
    background-color: #db4437;
}

.google:hover{
    background-color: #cb5d53;
}

.github {
    background-color: #333;
}

.github:hover{
    background-color: #474747;
}

.terms {
    text-align: center;
    margin-top: 20px;
    font-size: 12px;
}

.terms a {
    color: #0095FF;
    text-decoration: none;
}

.terms a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div>
                <i class="exit fa-solid fa-xmark"></i>
            </div>
            <div class="tabs">
                <button class="btn-login">Đăng nhập</button>
                <button><a href="./dk.php" class="btn-register">Đăng ký</a></button>
            </div>
            <div class="login-form">
                <form>
                    <label for="role">Vai trò</label>
                    <select id="role" name="role">
                        <option value="teacher">Người dạy</option>
                        <option value="student">Người học</option>
                    </select>

                    <label for="username">Tên người dùng</label>
                    <input type="text" id="username" name="username" placeholder="Tên người dùng">

                    <label for="password">Nhập mật khẩu</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                    
                    <div class="forgot-password">
                        <a href="#">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="login-button">Đăng nhập</button>
                </form>
            </div>

            <div class="divider">
                <span>Hoặc đăng nhập bằng ứng dụng của bên thứ 3</span>
            </div>

            <div class="social-login">
                <button class="facebook">Facebook</button>
                <button class="google">Google</button>
                <button class="github">GitHub</button>
            </div>

            <div class="terms">
                <span>Đăng ký có nghĩa bạn đồng ý với <a href="#">Điều khoản người dùng</a> và <a href="#">Chính sách Quyền riêng tư</a></span>
            </div>
        </div>
    </div>
</body>
</html>
