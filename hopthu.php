<?php
include 'header.php';
?>
    <link rel="stylesheet" href="./css/stylehopthu.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/stylefooter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ef5ee47b32.js" crossorigin="anonymous"></script>

    <div class="mailbox-container"> <!-- Đổi tên class -->
    <h1>Danh Sách Vấn Đáp</h1>

    <div class="question-listhopthu">
        <?php
        // Kết nối CSDL và lấy danh sách câu hỏi
        include 'dbhopthu.php'; // Include file kết nối CSDL
        $conn = getDbConnection();

// Kiểm tra nếu kết nối thành công
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại.");
}

$sql = "SELECT cq.id, cq.question, cq.state, cq.created_at, cq.student_id, l.title AS lesson_title, 
u.name AS student_name, a.answer AS teacher_answer, a.created_at AS answer_time
FROM course_questions cq
JOIN lessons l ON cq.lesson_id = l.id 
JOIN users u ON cq.student_id = u.id 
LEFT JOIN answers a ON cq.id = a.question_id  -- Join with answers table
ORDER BY cq.created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="question-item" onclick="toggleDetail(' . $row['id'] . ')">';
                echo '<span>Tiêu đề: ' . $row['question'] . '</span>';
                echo '<span style="float: right;">Người đăng: ' . $row['student_name'] . '</span>';
                echo '</div>';
        
                echo '<div class="question-detail" id="detail-' . $row['id'] . '">';
                echo '<p><strong>Bài học:</strong> ' . $row['lesson_title'] . '</p>';
                echo '<p><strong>Thời gian:</strong> ' . $row['created_at'] . '</p>';
                echo '<p><strong>Trạng thái:</strong> ' . ($row['state'] == 0 ? 'Chưa trả lời' : 'Đã trả lời') . '</p>';
                echo '<p><strong>Câu hỏi:</strong> ' . $row['question'] . '</p>';
        
                // Display the teacher's answer if it exists
                if ($row['teacher_answer']) {
                    echo '<div class="answer-section">';
                    echo '<p><strong>Câu trả lời:</strong> ' . $row['teacher_answer'] . '</p>';
                    echo '<p><em>Đã trả lời lúc:</em> ' . $row['answer_time'] . '</p>';
                    echo '</div>';
                } else {
                    echo '<p>Chưa có câu trả lời.</p>';
                }
        
                echo '</div>';
            }
        } else {
            echo '<p>Không có câu hỏi nào.</p>';
        }

        $conn->close();
        ?>
    </div>

    <!-- Phần trả lời nằm bên dưới danh sách câu hỏi -->
    <div id="response-section" class="response">
        <h2>Trả lời</h2>
        <textarea rows="4" id="answer-input" placeholder="Nhập câu trả lời của bạn ở đây..."></textarea>
        <button onclick="submitAnswer()">Gửi câu trả lời</button>
    </div>
</div>

<script>
     let currentQuestionId = null;

function toggleDetail(id) {
const detail = document.getElementById(`detail-${id}`);
const responseSection = document.getElementById('response-section');
const answerInput = document.getElementById('answer-input');

// Ẩn chi tiết câu hỏi của câu hỏi hiện tại nếu đang mở
if (currentQuestionId === id) {
    detail.style.display = 'none';
    responseSection.style.display = 'none'; 
    currentQuestionId = null;
} else {
    const allDetails = document.querySelectorAll('.question-detail');
    allDetails.forEach(item => item.style.display = 'none');

    detail.style.display = 'block';
    responseSection.style.display = 'block'; 
    currentQuestionId = id;

    answerInput.value = '';
}
}

function submitAnswer() {
const answer = document.getElementById('answer-input').value;
if (answer.trim() === '') {
    alert('Vui lòng nhập câu trả lời.');
    return;
}

const questionId = currentQuestionId; // Lấy ID của câu hỏi
const replierId = 1; // Giả sử đây là ID của người trả lời, hãy thay thế bằng ID thực tế
const replierName = 'Giảng viên'; // Thay bằng tên người trả lời thực tế

// Gửi dữ liệu tới submit_answer.php
fetch('submit_answer.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `answer=${encodeURIComponent(answer)}&question_id=${questionId}&replier_id=${replierId}&name=${replierName}`
})
.then(response => response.text())
.then(data => {
    alert(data); // Hiển thị thông báo thành công hoặc lỗi
    
    if (data.includes('thành công')) {
        // Sau khi trả lời thành công, hiển thị câu trả lời mới trên giao diện
        const detailSection = document.getElementById(`detail-${questionId}`);
        const answerHTML = `<div class="answer-section">
                                <p><strong>Câu trả lời:</strong> ${answer}</p>
                                <p><em>Đã trả lời ngay bây giờ</em></p>
                            </div>`;
        detailSection.insertAdjacentHTML('beforeend', answerHTML);

        document.getElementById('answer-input').value = ''; // Xóa nội dung nhập vào
        document.getElementById('response-section').style.display = 'none'; // Ẩn form trả lời
        currentQuestionId = null;
    }
})
.catch(error => console.error('Lỗi:', error));
}
const toggleMenuBtn = document.getElementById('toggleMenuBtn');
const menuContent = document.getElementById('menuContent');
// Hàm toggle hiển thị/ẩn menu
toggleMenuBtn.addEventListener('click', function (event) {
  event.stopPropagation(); // Ngăn việc đóng menu khi nhấp vào nút
  if (menuContent.style.display === "none" || menuContent.style.display === "") {
    menuContent.style.display = "block"; // Hiển thị menu
  } else {
    menuContent.style.display = "none"; // Ẩn menu
  }
});

// Đóng menu khi nhấp ra ngoài menu
document.addEventListener('click', function (event) {
  if (!toggleMenuBtn.contains(event.target) && !menuContent.contains(event.target)) {
    menuContent.style.display = "none"; // Ẩn menu khi click ngoài
  }
});
</script>


<?php  include 'footer.php' ?>