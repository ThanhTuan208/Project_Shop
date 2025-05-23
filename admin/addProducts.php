<link rel="stylesheet" href="style.css">
<?php include "headerCRUD.php"; ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Điều chỉnh để sidebar và form hiển thị bên cạnh nhau */
        .d-flex {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        /* Tùy chỉnh kích thước sidebar và đảm bảo content có đủ không gian */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php
        include "sidebar.php";
        include "../required.php";
        ?>

        <!-- Content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Thêm Sản Phẩm</h1>

                <form action="add.php" method="post" enctype="multipart/form-data">
                    <!-- Tên Sản Phẩm -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="productName" name="productName" value=""
                            minlength="3" maxlength="50" placeholder="Nhập tên sản phẩm" required>
                    </div>

                    <!-- Nhà Sản Xuất -->
                    <div class="mb-3">
                        <label for="manufacturer" class="form-label">Nhà Sản Xuất</label>
                        <select class="form-select" id="manufacturer" name="manufacturer" required>
                            <option value="" selected disabled>Chọn nhà sản xuất</option>
                            <?php
                            $getAllManu = $manufactures->getAllManu();
                            foreach ($getAllManu as $key => $value): ?>
                                <option value="<?php echo $value["manu_id"] ?>"><?php echo $value["manu_name"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Loại Sản Phẩm -->
                    <div class="mb-3">
                        <label for="productType" class="form-label">Loại Sản Phẩm</label>
                        <select class="form-select" id="productType" name="productType" required>
                            <option value="" selected disabled>Chọn loại sản phẩm</option>
                            <?php
                            $getAllProtype = $protype->getAllProtype();
                            foreach ($getAllProtype as $key => $value): ?>
                                <option value="<?php echo $value["type_id"] ?>"><?php echo $value["type_name"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" min="10"
                            placeholder="Nhập giá sản phẩm" required>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Tải Hình Ảnh</label>
                        <input type="file" class="form-control" id="productImage" name="productImage" minlength="3"
                            maxlength="50" required>
                    </div>

                    <!-- Mô Tả -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3" minlength="3"
                            maxlength="5000" placeholder="Nhập mô tả sản phẩm" required></textarea>
                    </div>

                    <!-- Nổi Bật -->
                    <div class="mb-3">
                        <label for="feature" class="form-label">Sản phẩm nổi bật?</label>
                        <select class="form-select" id="feature" name="feature" required>
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Tác giả</label>
                        <select class="form-select" id="author" name="author" required>
                            <option value="" selected disabled>Chọn tác giả</option>
                            <?php
                            $getAllManu = $manufactures->getAllManu();
                            foreach ($getAllManu as $key => $value): ?>
                                <option value="<?php echo $value["manu_id"] ?>"><?php echo $value["authors"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Nút Gửi -->
                    <form action="add.php" method="post">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="add" value="product">Thêm
                                Sản
                                Phẩm</button>
                        </div>
                    </form>


                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>