<?php
require "connect.php"; // Kết nối cơ sở dữ liệu

$sql = "SELECT * FROM sinhvien"; // Truy vấn dữ liệu từ bảng sinhvien
$qr = mysqli_query($conn, $sql); // Thực thi truy vấn

// Kiểm tra nếu có lỗi trong quá trình truy vấn
if (!$qr) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

// Hiển thị dữ liệu
while ($rows = mysqli_fetch_array($qr)) {
    // Hiển thị các giá trị theo cột
    echo "<tr>
            <td>{$rows['id']}</td>
            <td>{$rows['masv']}</td>
            <td>{$rows['hoten']}</td>
            <td><a href='edit.php?id={$rows['id']}'>Sửa</a> | <a href='delete.php?id={$rows['id']}'>Xóa</a></td>
          </tr>";
}
?>
