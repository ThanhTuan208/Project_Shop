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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php

            echo "<strong>Cập nhật thất bại !</strong>.";
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Thông tin thêm hoặc liên kết -->
        <div class="text-center">
            <?php if ($update == "product") {
                echo '<a href="itemProducts.php" class="btn btn-primary">Trở về mục sản phẩm</a>';
            } else if ($update == "manu")
                echo '<a href="manuProducts.php" class="btn btn-primary">Trở về danh mục</a>';
            else
                echo '<a href="userProducts.php" class="btn btn-primary">Trở về người dùng</a>';
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>