<?php
require_once __DIR__ . '/../../controllers/HomeController.php';

// Khởi tạo controller
$homeController = new HomeController();

// Lấy tin tức chi tiết
if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
    $newsDetail = $homeController->getNewsById($newsId);

    if ($newsDetail === false) {
        die("Tin tức không tồn tại.");
    }
} else {
    die("ID tin tức không hợp lệ.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center"><?= htmlspecialchars($newsDetail['title']) ?></h1>
        
        <div class="row">
            <div class="col-md-8 mx-auto">
                <img src="<?= htmlspecialchars($newsDetail['image']) ?>" alt="<?= htmlspecialchars($newsDetail['title']) ?>" class="img-fluid mb-4 rounded">
                <p class="fs-5"><?= nl2br(htmlspecialchars($newsDetail['content'])) ?></p>
                <p><strong>Ngày đăng:</strong> <?= htmlspecialchars($newsDetail['created_at']) ?></p>
                <p><strong>Danh mục:</strong> <?= htmlspecialchars($newsDetail['category_name']) ?></p>
                <a href="/views/home/index.php" class="btn btn-secondary mt-3">Quay lại danh sách</a>
            </div>
        </div>
    </div>
</body>
</html>
