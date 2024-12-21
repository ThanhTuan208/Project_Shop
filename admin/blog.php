<?php

include_once "../connect.php";

// Pagination and Search
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 3;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$offset = ($page - 1) * $limit;

// SQL Query - Secure with Prepared Statements
if ($search) {
    $condition = "WHERE blog_title LIKE ?";
    $searchTerm = "%$search%";
} else {
    $condition = "";
}

// Fetch blogs
$sql = "SELECT * FROM blogs $condition ORDER BY blog_date DESC LIMIT ?, ?";
$stmt = $conn->prepare($sql);

if ($search) {
    $stmt->bind_param("sii", $searchTerm, $offset, $limit);
} else {
    $stmt->bind_param("ii", $offset, $limit);
}
$stmt->execute();
$result = $stmt->get_result();

// Count total blogs
$count_sql = "SELECT COUNT(*) as count FROM blogs $condition";
$stmt_count = $conn->prepare($count_sql);
if ($search) {
    $stmt_count->bind_param("s", $searchTerm);
}
$stmt_count->execute();
$total_blogs = $stmt_count->get_result()->fetch_assoc()['count'];
$total_pages = ceil($total_blogs / $limit);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #212529;
            /* Màu nền sidebar */
            color: #fff;
            /* Màu chữ sidebar */
            height: 100vh;
            /* Chiều cao toàn màn hình */
            padding: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            display: block;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include "sidebar.php"; ?>

            <!-- Nội dung chính -->
            <div class="col-md-10 p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h2>Quản lý Bài Viết</h2>
                    <form method="get" class="d-flex">
                        <input class="form-control me-2" type="search" name="search"
                            value="<?= htmlspecialchars($search) ?>" placeholder="Tìm kiếm...">
                        <button class="btn btn-outline-primary" type="submit">Tìm</button>
                    </form>
                </div>
                <a href="add_blog.php" class="btn btn-success mb-3">Thêm Bài Viết</a>

                <!-- Danh sách bài viết -->
                <div class="row">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($item = $result->fetch_assoc()): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="<?= htmlspecialchars($item['blog_image']) ?>" class="card-img-top"
                                        style="height: 200px; object-fit: cover;" alt="Blog Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate"><?= htmlspecialchars($item['blog_title']) ?></h5>
                                        <p class="text-muted mb-1">Tác giả: <?= htmlspecialchars($item['author']) ?></p>
                                        <p class="text-muted small"><?= htmlspecialchars($item['blog_date']) ?></p>
                                        <a href="../blog_details.php?id=<?= htmlspecialchars($item['id']) ?>"
                                            class="btn btn-primary btn-sm">Xem</a>
                                        <a href="edit_blog.php?id=<?= htmlspecialchars($item['id']) ?>"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="delete_blog.php?id=<?= htmlspecialchars($item['id']) ?>"
                                            onclick="return confirm('Xóa bài viết này?')" class="btn btn-danger btn-sm">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="alert alert-warning">Không có bài viết nào.</div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="?page=<?= $page - 1 ?>&search=<?= htmlspecialchars($search) ?>">Trước</a>
                            </li>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link"
                                        href="?page=<?= $i ?>&search=<?= htmlspecialchars($search) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="?page=<?= $page + 1 ?>&search=<?= htmlspecialchars($search) ?>">Sau</a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>