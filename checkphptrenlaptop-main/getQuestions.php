<?php
header('Content-Type: application/json');

// Kết nối tới CSDL
$servername = "localhost"; // Đổi thành tên máy chủ của bạn
$username = "root"; // Đổi thành username của bạn
$password = ""; // Đổi thành password của bạn
$dbname = "btl"; // Đổi thành tên CSDL của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed']));
}

// Lấy danh sách câu hỏi từ bảng 'questions'
$sql = "SELECT name, message, created_at FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

$questions = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($questions);

$conn->close();
?>