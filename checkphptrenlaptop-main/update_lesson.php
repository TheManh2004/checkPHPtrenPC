<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ yêu cầu POST
$id = $_POST['id'];
$title = $_POST['title'];
$drive_link = $_POST['drive_link'];

// Kiểm tra xem có đủ dữ liệu hay không
if (!empty($id) && !empty($title) && !empty($drive_link)) {
    // Cập nhật thông tin bài học
    $sql = "UPDATE lessons SET title = ?, drive_link = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $drive_link, $id);

    if ($stmt->execute()) {
        echo "Cập nhật bài học thành công";
    } else {
        echo "Lỗi cập nhật bài học: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Dữ liệu không hợp lệ";
}

// Đóng kết nối
$conn->close();
?>