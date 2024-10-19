<?php
include 'dbmysqli.php'; // Kết nối cơ sở dữ liệu

// Lấy danh sách các chủ đề từ CSDL
$sql_subjects = "SELECT id, subject_title FROM chapters";
$result_subjects = $conn->query($sql_subjects);

// Kiểm tra và hiển thị dữ liệu
if ($result_subjects->num_rows > 0) {
    while ($subject = $result_subjects->fetch_assoc()) {
        echo '<div class="accordion-header">';
        echo '<div class="header-left">';
        echo '<i class="fa-solid fa-list-ul"></i>';
        echo '<h3>' . $subject["subject_title"] . '</h3>';
        // Unique ID for the toggle button
        echo '<button class="arrow" id="toggle-button-' . $subject["id"] . '">&#9660;</button>';
        echo '</div>';
        echo '<div class="header-right">';
        echo '<i class="fa-solid fa-square-check fa-bounce" style="color: #63E6BE;"></i>';
        echo '<button class="add-button" data-target="lesson-list-' . $subject["id"] . '" onclick="openAddLessonModal(' . $subject["id"] . ')"><i class="fas fa-plus"></i></button>';
        echo '</div>';
        echo '</div>';

        // Lấy danh sách các bài học thuộc chủ đề này
        $sql_lessons = "SELECT id, title, drive_link FROM lessons WHERE subject_id=" . $subject["id"];
        $result_lessons = $conn->query($sql_lessons);

        // Unique ID for the lesson list
        echo '<ul class="lesson-list" id="lesson-list-' . $subject["id"] . '" style="height: 0; overflow: hidden;">';

        if ($result_lessons->num_rows > 0) {
            while ($lesson = $result_lessons->fetch_assoc()) {
                echo '<li class="completed">';
                echo '<div class="lesson-content">';
                echo '<i class="fas fa-link link-icon"></i>';
                echo '<a href="' . $lesson["drive_link"] . '" target="_blank">' . $lesson["title"] . '</a>';
                echo '</div>';
                echo '<div>';
                echo '<div class="options">';
                echo '<button class="options-button" onclick="toggleMenu(this)"><i class="fas fa-ellipsis-v"></i></button>';
                echo '<div class="menu">';
                echo '<button onclick="editLesson(' . $lesson["id"] . ')">Sửa</button>';
                echo '<button onclick="deleteLesson(' . $lesson["id"] . ')">Xóa</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
        } else {
            echo "<p>Chưa có bài học nào.</p>";
        }

        echo '</ul>'; // Kết thúc danh sách bài học
    }
} else {
    echo "<p>Chưa có chủ đề nào.</p>";
}

$conn->close(); // Đóng kết nối
?>