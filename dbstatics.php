<?php
// Kết nối Database
class Connect {
    public function KetNoi() {
        $conn = new mysqli("localhost", "root", "", "btl"); // Cập nhật thông tin database
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        return $conn;
    }
}

// Lớp StatisticsDAO để lấy dữ liệu thống kê
class StatisticsDAO {
    public function getTotalChapters() {
        $totalChapters = 0;
        $db = new Connect();
        $conn = $db->KetNoi();
        $sql = "SELECT COUNT(*) AS totalChapters FROM chapters";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalChapters = $row['totalChapters'];
        }
        return $totalChapters;
    }

    public function getTotalLessons() {
        $totalLessons = 0;
        $db = new Connect();
        $conn = $db->KetNoi();
        $sql = "SELECT COUNT(*) AS totalLessons FROM lessons";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalLessons = $row['totalLessons'];
        }
        return $totalLessons;
    }
}

// Lấy dữ liệu thống kê
$stats = new StatisticsDAO();
$totalChapters = $stats->getTotalChapters();
$totalLessons = $stats->getTotalLessons();
?>