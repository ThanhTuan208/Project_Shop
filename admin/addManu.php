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
                <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Thêm danh mục</h1>

                <form action="add.php" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="typeManu" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" id="typeManu" name="typeManu" value="" minlength="3"
                            maxlength="50" placeholder="Nhập tên danh mục" required>
                    </div>


                    <div class="mb-3">
                        <label for="imageManu" class="form-label">Tải Hình Ảnh</label>
                        <input type="file" class="form-control" id="imageManu" name="imageManu" required>
                    </div>

                    <div class="mb-3">
                        <label for="nameManu" class="form-label">Tên tác giả</label>
                        <input type="text" class="form-control" id="nameManu" name="nameManu" value="" minlength="3"
                            maxlength="50" placeholder="Nhập tên tác giả" required>
                    </div>

                    <form action="add.php" method="post">
                        <div class="text-center">
                            <button type="submit" href="add.php" class="btn btn-primary" name="add"
                                value="manu">Thêm</button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>