<?php
include 'dbmysqli.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ AJAX
    $subjectId = $_POST['subjectId'];
    $title = $_POST['title'];
    $driveLink = $_POST['drive_link'];

    // Kết nối đến cơ sở dữ liệu và thực hiện truy vấn
    $stmt = $conn->prepare("INSERT INTO lessons (subject_id, title, drive_link) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $subjectId, $title, $driveLink); // "iss" cho các loại dữ liệu tương ứng

    if ($stmt->execute()) {
        echo "Thêm bài học thành công"; // Gửi thông báo thành công
    } else {
        echo "Lỗi: " . $stmt->error; // Gửi thông báo lỗi
    }

    $stmt->close();
}
$conn->close();
?>