<?php 
require_once __DIR__ . '/../../controllers/HomeController.php';

// Khởi tạo controller
$homeController = new HomeController();

// Xử lý tìm kiếm
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = $_POST['category_name'] ?? '';
    if (!empty($categoryName)) {
        $searchResults = $homeController->searchNewsByCategoryName($categoryName);
    }
} else {
    $newsList = $homeController->getNews();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Danh Sách Tin Tức</h1>

        <!-- Form tìm kiếm -->
        <form action="" method="POST" class="mb-4 d-flex">
            <input type="text" name="category_name" class="form-control me-2" placeholder="Tìm kiếm theo danh mục...">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <!-- Hiển thị kết quả -->
        <div class="row">
            <?php if (!empty($searchResults)): ?>
                <h2 class="mb-3">Kết quả tìm kiếm</h2>
            <?php endif; ?>

            <?php foreach (!empty($searchResults) ? $searchResults : $newsList as $news): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($news['title']) ?></h5>
                            <a href="/views/news/detail.php?id=<?= urlencode($news['id']) ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
