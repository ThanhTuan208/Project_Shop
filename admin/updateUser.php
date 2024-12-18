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

        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Thêm Sản Phẩm</h1>

                <?php $user_id = isset($_GET["id"]) ? $_GET["id"] : 0;
                $getUserById = $user->getUserById($user_id);
                foreach ($getUserById as $key => $value): ?>
                    <form action="update.php?id=<?php echo $value["id"] ?>" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="pass" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" id="pass" name="pass"
                                value="<?php echo $value["matkhau"] ?>" placeholder="Nhập mật khẩu">
                        </div>
                        <!-- Nút Gửi -->

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="update" value="user">Cập nhật tài
                                khoản</button>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
        <!-- Content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>