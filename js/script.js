  // Khi nhấn vào notification, hiển thị/ẩn danh sách câu hỏi
  document.getElementById('notification').addEventListener('click', function () {
    var questionList = document.getElementById('questionList');
    if (questionList.style.display === 'block') {
        questionList.style.display = 'none';
    } else {
        questionList.style.display = 'block';
    }
});
// Hàm để lấy danh sách câu hỏi từ server (bạn cần kết nối với PHP ở đây)
function loadQuestions() {
  fetch('getQuestions.php')
    .then(response => response.json())
    .then(data => {
      var questionList = document.querySelector('.question-list ul');
      questionList.innerHTML = ''; // Xóa nội dung cũ

      data.forEach(question => {
        var li = document.createElement('li');
        li.innerHTML = `
                <a href="hopthu.php" style="text-decoration: none;"><div class="question-title">${question.student_name} hỏi:</div>
                <div class="question-content">${question.message}</div>
                <div class="question-time">Hỏi lúc: ${question.created_at}</div></a>
            `;
        questionList.appendChild(li);
      });
    });
}

// Gọi hàm loadQuestions khi trang được tải
document.addEventListener('DOMContentLoaded', loadQuestions);

// Lấy các phần tử icon và nội dung
const bookSelect = document.querySelector('.book-select');
const bookSelect2 = document.querySelector('.book-select2');
const bookSelect4 = document.querySelector('.book-select4');

// Lấy các phần tử nội dung
const taiLieuContent = document.getElementById('tai-lieu-content');
const cauHoiContent = document.getElementById('cau-hoi-content');
const baoCaoContent = document.getElementById('bao-cao-content');

// Hàm để ẩn tất cả nội dung
function hideAllContent() {
  taiLieuContent.classList.remove('active');
  cauHoiContent.classList.remove('active');
  baoCaoContent.classList.remove('active');
}

// Sự kiện khi nhấn vào Tài liệu
bookSelect.addEventListener('click', function () {
  hideAllContent();
  taiLieuContent.classList.add('active');
});

// Sự kiện khi nhấn vào Câu hỏi
bookSelect2.addEventListener('click', function () {
  hideAllContent();
  cauHoiContent.classList.add('active');
});


// Sự kiện khi nhấn vào Báo Cáo
bookSelect4.addEventListener('click', function () {
  hideAllContent();
  baoCaoContent.classList.add('active');
});
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

function openModal(modalId) {
  document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}
function addSubject() {
  const subjectTitle = document.getElementById('subject-title').value;

  // Check if the input is not empty
  if (subjectTitle.trim() === "") {
    alert("Vui lòng nhập tiêu đề chủ đề.");
    return;
  }

  // Send data to PHP using Fetch API
  fetch('add_subject.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ title: subjectTitle }),
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Reload subjects or update the UI dynamically
        location.reload(); // Reloads the page to show the new subject
      } else {
        alert("Có lỗi xảy ra: " + data.message);
      }
    })
    .catch(error => {
      console.error("Error:", error);
      alert("Có lỗi xảy ra khi thêm chủ đề.");
    });
}
document.addEventListener("DOMContentLoaded", function () {
  // Select all toggle buttons
  const toggleButtons = document.querySelectorAll("[id^='toggle-button-']");

  toggleButtons.forEach(function (toggleButton) {
    toggleButton.addEventListener("click", function () {
      const subjectId = this.id.split('-')[2]; // Get subject ID from the button ID
      const lessonList = document.getElementById('lesson-list-' + subjectId);

      // Check the current height state
      const isExpanded = lessonList.style.height && lessonList.style.height !== "0px";

      if (isExpanded) {
        // Collapse the list
        lessonList.style.height = "0px";
        this.innerHTML = "&#9660;"; // Down arrow when closed
      } else {
        // Expand the list
        const scrollHeight = lessonList.scrollHeight + "px";
        lessonList.style.height = scrollHeight;
        this.innerHTML = "&#9650;"; // Up arrow when open
      }
    });
  });
});
// Hàm để mở modal thêm bài học
function openAddLessonModal(subjectId) {
  document.getElementById('lesson-subject-id').value = subjectId; // Set the subject ID
  document.getElementById('add-lesson-modal').style.display = 'block'; // Hiển thị modal
}

// Hàm để đóng modal
function closeModal(modalId) {
  document.getElementById(modalId).style.display = 'none';
}

// Hàm để thêm bài học vào thư mục
function addLesson() {
  const subjectId = document.getElementById('lesson-subject-id').value; // Lấy subject ID
  const title = document.getElementById('lesson-title').value; // Tiêu đề bài học
  const link = document.getElementById('lesson-link').value; // Link bài học

  if (title && link) {
    // Gửi dữ liệu đến server bằng AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "add_lesson.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          // Nếu thêm bài học thành công, thêm vào danh sách
          const response = xhr.responseText; // Nhận phản hồi từ server
          if (response.includes("Thêm bài học thành công")) {
            // Xử lý khi thêm thành công
            const newLesson = `
                    <li class="lesson-item">
                        <div class="lesson-content">
                            <i class="fas fa-file-alt file-icon"></i>
                            <a href="${link}" target="_blank">${title}</a>
                        </div>
                        <div>
                            <div class="options">
                                <i class="fas fa-check complete"></i>
                                <button class="options-button" onclick="toggleMenu(this)">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="menu">
                                    <button onclick="editLesson(this)">Sửa</button>
                                    <button onclick="deleteLesson(this)">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    `;
            const lessonList = document.getElementById(`lesson-list-${subjectId}`);
            lessonList.insertAdjacentHTML('beforeend', newLesson);
            alert("Thêm thành công!,Hãy restart lại trang");
            closeModal('add-lesson-modal');
          } else {
            alert("Lỗi khi thêm bài học: " + response); // Hiển thị thông báo lỗi
          }
        } else {
          alert("Lỗi: " + xhr.statusText); // Hiển thị lỗi HTTP
        }
      }
    };
    xhr.send(`subjectId=${encodeURIComponent(subjectId)}&title=${encodeURIComponent(title)}&drive_link=${encodeURIComponent(link)}`);
  }
}
function toggleMenu(button) {
  var menu = button.nextElementSibling;

  // Đóng các menu khác trước
  document.querySelectorAll('.menu').forEach(function (otherMenu) {
    if (otherMenu !== menu) {
      otherMenu.style.display = 'none';
    }
  });

  // Đóng/mở menu hiện tại
  if (menu.style.display === 'flex') {
    menu.style.display = 'none';
  } else {
    menu.style.display = 'flex';
  }
}

// Đóng menu khi click ra ngoài
document.addEventListener('click', function (event) {
  var isClickInsideMenu = event.target.closest('.options');
  if (!isClickInsideMenu) {
    document.querySelectorAll('.menu').forEach(function (menu) {
      menu.style.display = 'none';
    });
  }
});
// // Xóa bài học với xác nhận
// function deleteLesson(el) {
//   if (confirm("Bạn có chắc chắn muốn xóa bài học này?")) {
//     let lesson = el.closest('.lesson');
//     lesson.remove(); // Hoặc gọi API để xóa bài học từ server
//   }
// }
// Sử dụng jQuery để thêm sự kiện click cho các bài học
$(document).ready(function () {
  $('#lesson-list').on('click', '.lesson-item', function () {
    var videoLink = $(this).data('link'); // Lấy liên kết video
    window.location.href = videoLink; // Chuyển hướng tới liên kết video
  });
});

function deleteLesson(id) {
  if (confirm("Bạn có chắc chắn muốn xóa bài học này?")) {
    // Gửi yêu cầu Ajax để xóa bài học
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_lesson.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Nếu xóa thành công, tải lại trang
        alert(xhr.responseText);
        location.reload();
      }
    };
    xhr.send("id=" + id);
  }
}

// Mở modal khi người dùng nhấn "Sửa"
function openEditModal() {
  document.getElementById('edit-modal').style.display = 'block';
}

// Đóng modal khi người dùng nhấn "X" hoặc hoàn thành việc chỉnh sửa
function closeEditModal() {
  document.getElementById('edit-modal').style.display = 'none';
}
function editLesson(id) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_lesson.php?id=" + id, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var lesson = JSON.parse(xhr.responseText); // Nhận dữ liệu từ server
      document.getElementById('edit-lesson-id').value = lesson.id;
      document.getElementById('edit-lesson-title').value = lesson.title;
      document.getElementById('edit-lesson-link').value = lesson.drive_link;

      // Mở modal sửa
      document.getElementById('edit-modal').style.display = 'block';
    }
  };
  xhr.send();
}
document.getElementById('edit-lesson-form').addEventListener('submit', function (event) {
  event.preventDefault();
  var id = document.getElementById('edit-lesson-id').value;
  var title = document.getElementById('edit-lesson-title').value;
  var drive_link = document.getElementById('edit-lesson-link').value;

  console.log('Submitting the following values: ', { id, title, drive_link });

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_lesson.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      alert(xhr.responseText);
      location.reload();
    } else if (xhr.readyState == 4) {
      alert("Lỗi cập nhật bài học");
    }
  };
  xhr.send("id=" + id + "&title=" + encodeURIComponent(title) + "&drive_link=" + encodeURIComponent(drive_link));
});
    