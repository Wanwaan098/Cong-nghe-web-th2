<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Trang chủ</h1>
    </header>
    <div class="container mt-5 text-center">
        <!-- Nút đăng nhập -->
        <a href="index1.php?controller=admin&action=login" class="btn btn-primary btn-lg">Đăng nhập</a>
    </div>

</body>
</html>

<?php
// Lấy thông tin controller và action từ URL
$controller = $_GET['controller'] ?? 'home'; // Mặc định là 'home'
$action = $_GET['action'] ?? 'index'; // Mặc định là 'index'

// Xác định đường dẫn tệp cần gọi
$viewPath = "views/$controller/$action.php";

// Kiểm tra xem tệp có tồn tại không
if (file_exists($viewPath)) {
    include $viewPath; // Gọi tệp tương ứng
} else {
    echo "<div class='text-center mt-5 text-danger'>Trang không tồn tại!</div>"; // Hiển thị lỗi nếu không tìm thấy tệp
}
?>
