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
                <?php
                $id = isset($_GET['id']) ? $_GET["id"] : "";
                $getProductDetail = $product->getProductDetail($id);
                foreach ($getProductDetail as $key => $value): ?>
                    <form action="update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                        <!-- Tên Sản Phẩm -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" name="productName"
                                value="<?php echo $value["name"] ?>" placeholder="Nhập tên sản phẩm" required>
                        </div>

                        <!-- Nhà Sản Xuất -->
                        <div class="mb-3">
                            <label for="manufacturer" class="form-label">Nhà Sản Xuất</label>
                            <select class="form-select" id="manufacturer" name="manufacturer" required>
                                <?php
                                $getAllManu = $manufactures->getAllManu();
                                foreach ($getAllManu as $key => $manu):
                                    $selected = ($manu["manu_id"] == $value["manu_id"]) ? 'selected' : "";
                                    ?>
                                    <option value="<?php echo $manu["manu_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $manu["manu_name"] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Loại Sản Phẩm -->
                        <div class="mb-3">
                            <label for="productType" class="form-label">Loại Sản Phẩm</label>
                            <select class="form-select" id="productType" name="productType" required>
                                <?php
                                $getAllManu = $protype->getAllProtype();
                                foreach ($getAllManu as $key => $type):
                                    $selected = ($type["type_id"] == $value["type_id"]) ? 'selected' : "";
                                    ?>
                                    <option value="<?php echo $type["type_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $type["type_name"] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Giá -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="<?php echo $value["price"] ?>" placeholder="Nhập giá sản phẩm" required>
                        </div>

                        <!-- Hình ảnh -->
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Tải Hình Ảnh</label>
                            <input type="file" class="form-control" id="productImage" name="productImage">
                            <img src="../anh/<?php echo $value["image"] ?>" alt=" Hình ảnh đã chọn trước đó"
                                style="max-width: 250px; max-height: 30vh; margin-top; 10vh;">
                        </div>

                        <!-- Mô Tả -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô Tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Nhập mô tả sản phẩm" required><?php echo $value["description"] ?></textarea>
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
                                foreach ($getAllManu as $key => $manu):
                                    $selected = ($manu["manu_id"] == $value["manu_id"]) ? 'selected' : "";
                                    ?>
                                    <option value="<?php echo $manu["manu_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $manu["authors"] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Nút Gửi -->
                        <div class="text-center">
                            <form action="update.php?id=<?php echo $value["id"] ?>" method="post">
                                <button type="submit" class="btn btn-primary" name="update" value="product">Cập Nhật
                                    Sản
                                    Phẩm</button>
                            </form>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>