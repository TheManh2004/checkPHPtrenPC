<?php
function getDbConnection() {
    // Thông tin kết nối CSDL
    $host = 'localhost';   // Máy chủ cơ sở dữ liệu
    $username = 'root';    // Tên người dùng
    $password = '';        // Mật khẩu
    $database = 'btl'; // Tên cơ sở dữ liệu

    // Kết nối tới MySQL
    $conn = new mysqli($host, $username, $password, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Trả về đối tượng kết nối
    return $conn;
}
?>