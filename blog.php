<?php
include "required.php";
include 'header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;
$searching = isset($_GET['searching']) ? $_GET['searching'] : "";

if ($searching) {
    $sql = "SELECT * FROM blogs WHERE blog_title LIKE '%$searching%' ORDER BY blog_date ASC LIMIT $offset, $limit";
    $sql_count = "SELECT COUNT(*) as count FROM blogs WHERE blog_title LIKE '%$searching%'";
    $result = $conn->query($sql);
    $result_count = $conn->query($sql_count);
} else {
    $sql = "SELECT * FROM blogs ORDER BY blog_date ASC LIMIT $offset, $limit";
    $sql_count = "SELECT COUNT(*) as count FROM blogs";
    $result = $conn->query($sql);
    $result_count = $conn->query($sql_count);
}

if ($result->num_rows > 0) {
    $blog = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $blog = [];
}

if ($result->num_rows > 0) {
    $count = $result_count->fetch_assoc()['count'];
    $total_page = ceil($count / $limit);
} else {
    $total_page = 1;
}

// echo $total_page . ' ---- page' . $page;
// echo '<pre>';
// print_r($blog);
// echo '</pre>';


?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>PHPJabbers.com | Mẫu trang web cửa hàng trực tuyến miễn phí</title>

    <!-- CSS cốt lõi của Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Các tệp CSS bổ sung -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

    <!-- ***** Bắt đầu trình tải trước ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Kết thúc trình tải trước ***** -->

    <!-- Tiêu đề -->


    <!-- Nội dung trang -->
    <div class="page-heading about-heading header-text"
        style="background-image: url(https://thumbs.dreamstime.com/b/blog-information-website-concept-workplace-background-text-view-above-127465079.jpg); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 550px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Tin tức</h4>
                        <h2>News</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h1>Quản lý bài viết</h1>
                        </div>

                        <div class="col-12 col-md-6">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" name="searching"
                                    value="<?= $searching ?>" placeholder="Tìm blog" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Tìm</button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="row g-3">
                            <?php if (count($blog) > 0): ?>
                                <?php foreach ($blog as $item): ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            <img src="<?= './admin/' . $item['blog_image'] ?>" class="card-img-top "
                                                style="height: 200px; object-fit: cover" alt="...">

                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4 justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <div
                                                            style="width: 30px; height: 30px; margin-right: 10px; border-radius: 50%; border: 1px solid #ccc;">
                                                            <img src="https://png.pngtree.com/png-vector/20220518/ourmid/pngtree-circular-avatar-vector-illustration-male-people-person-male-vector-png-image_36446834.png"
                                                                alt="" class="rounded-circle w-100 h-100"
                                                                style="object-fit: cover;">
                                                        </div>
                                                        <div>
                                                            <h1 class="fw-bold mb-0 text-capitalize" style="font-size: 14px;">
                                                                <?= $item['author'] ?>
                                                            </h1>

                                                            <p class="mb-0 text-secondary" style="font-size: 12px;">
                                                                <?= $item['blog_date'] ?>
                                                            </p>
                                                        </div>
                                                    </div>


                                                </div>

                                                <h5 class="card-title text-truncate"><?= $item['blog_title'] ?></h5>

                                                <a href="./blog_details.php?id=<?= $item['id'] ?>" class="btn btn-primary">Xem
                                                    chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="alert alert-warning" role="alert">
                                        <?= $searching ? "Kết quả không tìm thấy" : "Chưa có bài viết nào" ?>
                                    </div>
                                </div>
                            <?php endif ?>

                        </div>

                        <nav aria-label="..." class="mt-3">
                            <ul class="pagination">
                                <?php if ($page - 1 > 0): ?>
                                    <li class="page-item">
                                        <?php if (!empty($searching)): ?>
                                            <a class="page-link" href="?page=<?= $page - 1 ?>&searching=<?= $searching ?>"
                                                tabindex="-1">Trước</a>
                                        <?php else: ?>
                                            <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Trước</a>
                                        <?php endif ?>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Trước</a>
                                    </li>
                                <?php endif ?>

                                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                    <?php if ($i == $page): ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="#"><?= $i ?></a>
                                        </li>
                                    <?php else: ?>
                                        <?php if (!empty($searching)): ?>
                                            <li class="page-item"><a class="page-link"
                                                    href="?page=<?= $i ?>&searching=<?= $searching ?>"><?= $i ?></a></li>
                                        <?php else: ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php endfor ?>

                                <li class="page-item">

                                    <?php if ($page == $total_page): ?>
                                        <a class="page-link disabled" href="#">Sau</a>
                                    <?php else: ?>
                                        <?php if (!empty($searching)): ?>
                                            <a class="page-link"
                                                href="?page=<?= $page + 1 ?>&searching=<?= $searching ?>">Sau</a>
                                        <?php else: ?>
                                            <a class="page-link" href="?page=<?= $page + 1 ?>">Sau</a>
                                        <?php endif ?>
                                    <?php endif ?>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- JavaScript cốt lõi của Bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>

</body>

<?php include "footer.php" ?>

</html>