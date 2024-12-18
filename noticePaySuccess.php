<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Thành Công</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <!-- Thông báo thành công -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo "<strong>Thanh toán thành công!</strong> Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.";
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Thông tin thêm hoặc liên kết -->
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Trở về trang chủ</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>