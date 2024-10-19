<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lesson_id = $_POST['id']; // Nhận ID bài học từ yêu cầu POST

    include 'dbmysqli.php';
    // Xóa bài học dựa vào ID
    $sql = "DELETE FROM lessons WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $lesson_id);

    if ($stmt->execute()) {
        echo "Bài học đã được xóa thành công.";
    } else {
        echo "Lỗi khi xóa bài học.";
    }

    $stmt->close();
    $conn->close();
}