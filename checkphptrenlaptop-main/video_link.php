<?php
include 'db.php';
// Lấy danh sách các bài học từ CSDL, bao gồm cả id
$sql = "SELECT id, title, drive_link FROM lessons"; 
$result = $conn->query($sql);

// Kiểm tra và hiển thị dữ liệu
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<li class="completed">';
        echo '<div class="lesson-content">';
        echo '<i class="fas fa-link link-icon"></i>';
        echo '<a href="' . $row["drive_link"] . '" target="_blank">' . $row["title"] . '</a>'; // Hiển thị tiêu đề và link
        echo '</div>';
        echo '<div>';
        echo '<div class="options">';
        echo '<button class="options-button" onclick="toggleMenu(this)"><i class="fas fa-ellipsis-v"></i></button>';
        echo '<div class="menu">';
        // Thêm ID bài học vào thuộc tính data-id để có thể truy cập khi thực hiện xóa hoặc sửa
        echo '<button onclick="editLesson(' . $row["id"] . ')">Sửa</button>';
        echo '<button onclick="deleteLesson(' . $row["id"] . ')">Xóa</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</li>';
    }
} else {
    echo "<p>Chưa có bài học nào.</p>";
}


// Đóng kết nối
$conn->close();

?>