<?php
include 'dbmysqli.php'; // Kết nối tới cơ sở dữ liệu

// Kiểm tra nếu ID được truyền vào
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sử dụng prepared statement để bảo mật
    $sql = "SELECT id, title, drive_link FROM lessons WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra nếu có kết quả
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc()); // Trả về dữ liệu dưới dạng JSON
    } else {
        echo json_encode(['error' => 'Không tìm thấy bài học.']); // Nếu không tìm thấy bài học
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'ID không hợp lệ.']); // Nếu không có ID
}

$conn->close();
?>