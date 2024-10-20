<?php
// Include kết nối đến CSDL
include 'dbhopthu.php'; // Nhớ thay 'db.php' thành file chứa hàm getDbConnection

// Lấy dữ liệu từ yêu cầu POST
$answer = $_POST['answer'];
$question_id = $_POST['question_id'];
$replier_id = $_POST['replier_id'];
$replier_name = $_POST['name'];

// Kiểm tra dữ liệu
if (empty($answer) || empty($question_id) || empty($replier_id) || empty($replier_name)) {
    echo "Dữ liệu không hợp lệ!";
    exit;
}

// Kết nối tới CSDL
$conn = getDbConnection();

// Chuẩn bị câu truy vấn để thêm câu trả lời vào bảng answers
$sql = "INSERT INTO answers (replier_id, name, answer, question_id, created_at, updated_at) 
        VALUES (?, ?, ?, ?, NOW(), NOW())";

// Sử dụng prepared statement để tránh SQL Injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("issi", $replier_id, $replier_name, $answer, $question_id);

// Thực thi câu truy vấn
if ($stmt->execute()) {
    echo "Câu trả lời đã được gửi thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>