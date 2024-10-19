<?php
include 'db.php'; // Kết nối cơ sở dữ liệu

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"));

// Check if title is set
if (isset($data->title)) {
    $subject_title = $conn->real_escape_string($data->title);

    // Insert the new subject into the database
    $sql = "INSERT INTO chapters (subject_title) VALUES ('$subject_title')";

    if ($conn->query($sql) === TRUE) {
        // Respond with success
        echo json_encode(["success" => true]);
    } else {
        // Respond with an error message
        echo json_encode(["success" => false, "message" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Tiêu đề chủ đề không được để trống."]);
}

$conn->close(); // Đóng kết nối
?>