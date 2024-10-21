<?php

// Kết nối đến CSDL
$servername = "localhost";
$username = "root";  // Sử dụng username của bạn
$password = "";  // Mật khẩu CSDL
$dbname = "btl"; // Tên CSDL của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Khởi tạo biến
$total_lessons = 0;
$total_chapters = 0;

// Truy vấn tổng số bài học và tổng số chủ đề
$sql_lessons = "SELECT COUNT(*) as total_lessons FROM lessons";
$sql_chapters = "SELECT COUNT(*) as total_chapters FROM chapters";

$result_lessons = $conn->query($sql_lessons);
$result_chapters = $conn->query($sql_chapters);

if ($result_lessons && $result_chapters) {
    if ($result_lessons->num_rows > 0) {
        $total_lessons = $result_lessons->fetch_assoc()['total_lessons'];
    }

    if ($result_chapters->num_rows > 0) {
        $total_chapters = $result_chapters->fetch_assoc()['total_chapters'];
    }
}

$conn->close();
?>
