<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/533aad8d01.js" crossorigin="anonymous"></script>
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-container {
    width: 400px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

.tabs button.register {
    border-bottom: 2px solid #0095FF;
}

.btn-login {
    color: #000;
    text-decoration: none
}

.register-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label {
    font-size: 14px;
    margin-bottom: 5px;
}

input, select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.phone-input {
    display: flex;
    gap: 10px;
}

input#mobile {
    flex-grow: 1;
}

.verify-btn {
    background-color: #0095FF;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px;
    cursor: pointer;
}

.verify-btn:hover{
    background-color: #4fb4fc;
}

.password-note {
    font-size: 12px;
    color: #555;
}

.register-button {
    padding: 10px 20px;
    background-color: #0095FF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

.register-button:hover {
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
    <div class="register-container">
        <div class="register-box">
                <div>
                    <i class="exit fa-solid fa-xmark"></i>
                </div>
                <div class="tabs">
                    <button ><a class="btn-login" href="./dn.php" >Đăng nhập</a></button>
                    <button class="register">Đăng ký</button>
                </div>
            <form class="register-form">
                <label for="username">Tên người dùng</label>
                <input type="text" id="username" name="username" placeholder="Tên người dùng">

                <label for="mobile">Số điện thoại di động</label>
                <div class="phone-input">
                    <!-- <select id="country-code">
                        <option value="+84">+84</option>
                       
                    </select> -->
                    <input type="text" id="mobile" name="mobile" placeholder="Nhập số điện thoại di động">
                    <button type="button" class="verify-btn">Nhận mã xác nhận</button>
                </div>

                <label for="verification-code">Mã xác nhận</label>
                <input type="text" id="verification-code" name="verification-code" placeholder="Nhập mã">

                <label for="password">Nhập mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">

                <p class="password-note">Mật khẩu phải gồm 6-20 ký tự và có ít nhất 1 ký tự đặc biệt</p>
                
                <button type="submit" class="register-button">Đăng ký</button>
            </form>

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
