<?php
include 'header.php';
?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/stylefooter.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<nav class="insert-file">

    <div class="insert-filesmall">
        <button onclick="openModal('add-subject-modal')" class="button-file">
            <i class="fa-solid fa-folder-plus"></i>Thêm chủ đề
        </button>
        <div id="add-subject-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('add-subject-modal')">&times;</span>
                <h3>Thêm Chủ Đề</h3>
                <form id="add-subject-form" onsubmit="event.preventDefault(); addSubject();">
                    <label for="subject-title">Tiêu đề chủ đề:</label><br>
                    <input type="text" id="subject-title" placeholder="Nhập tiêu đề chủ đề" required><br>
                    <button type="submit">Thêm chủ đề</button>
                </form>
            </div>
        </div>

</nav>
<div class="inner-wrap">
    <div class="container">
        <div class="subject">
            <div class="subject-select">
                <ul>
                    <li id="docTab">
                        <div class="book-select">
                            <img src="./image/book.png" alt="book">
                            <div class="book-caption">
                                <h2>Tài liệu</h2>
                                <p>+ Thêm tài liệu</p>
                            </div>
                        </div>
                    </li>
                    <li id="questionTab">
                        <div class="book-select2">
                            <img src="./image/bank.png" alt="bank">
                            <div class="book-caption">
                                <h2>Câu hỏi</h2>
                                <p>+ Thêm câu hỏi</p>
                            </div>
                        </div>
                    </li>
                    
                    <li >
                        <div class="book-select4">
                            <img src="./image/chart.png" alt="chart">
                            <div class="book-caption">
                                <h2>Báo Cáo</h2>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="docsContent" class="main-subject">
                <div id="tai-lieu-content" class="content-section active">
                    <div class="accordion">
                        <div class="subject-container">
                            <div class="subject-list">
                                <?php include 'load_subjects.php'; // Ensure your subjects load here 
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Các mục bài học khác... -->
                    <div id="edit-modal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeEditModal()">&times;</span>
                            <h3>Sửa Bài Học</h3>
                            <form id="edit-lesson-form" method="POST">
                                <input type="hidden" id="edit-lesson-id" name="id">
                                <label for="edit-lesson-title">Tiêu đề bài học:</label><br>
                                <input type="text" id="edit-lesson-title" name="title" placeholder="Nhập tiêu đề bài học" required><br>
                                <label for="edit-lesson-link">Link Drive:</label><br>
                                <input type="text" id="edit-lesson-link" name="drive_link" placeholder="Nhập link bài học" required><br>
                                <button type="submit">Lưu thay đổi</button>
                            </form>
                        </div>
                    </div>

                    <div id="add-lesson-modal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('add-lesson-modal')">&times;</span>
                            <h3>Thêm Bài Học</h3>
                            <form id="add-lesson-form" onsubmit="event.preventDefault(); addLesson();">
                                <input type="hidden" id="lesson-subject-id">
                                <label for="lesson-title">Tiêu đề bài học:</label><br>
                                <input type="text" id="lesson-title" placeholder="Nhập tiêu đề bài học" required><br>
                                <label for="lesson-link">Link Drive:</label><br>
                                <input type="text" id="lesson-link" placeholder="Nhập link bài học" required><br>
                                <button type="submit">Thêm bài học</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div id="cau-hoi-content" class="content-section">
                    <h3>Danh sách câu hỏi</h3>
                    <ul>
                        <li>Câu hỏi 1</li>
                        <li>Câu hỏi 2</li>
                        <li>Câu hỏi 3</li>
                    </ul>
                </div>

                <div id="hop-thu-content" class="content-section">
                
                </div>

                <div id="bao-cao-content" class="content-section">
                    <h3>Báo cáo</h3>
                    <!-- Nội dung báo cáo -->
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>