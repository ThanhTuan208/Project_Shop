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

        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
        }

        /* Thanh tìm kiếm căn trái */
        .search-bar {
            display: flex;
            justify-content: flex-end;
            width: 100%;
        }

        .search-bar input {
            width: 300px;
            margin-right: 10px;
        }

        .search-bar button {
            background-color: #ffc107;
            border: none;
            color: white;
            padding: 5px 15px;
            cursor: pointer;
        }

        /* Nút đăng xuất bên trái */
        .logout-btn {
            position: absolute;
            left: 20px;
            top: 10px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center mb-1">
        <!-- Nút Logout bên trái -->
        <div class="logout-btn">
            <a href="../AUI/dangnhap.php" class="btn btn-danger">Đăng Xuất</a>
        </div>

        <!-- Thanh Tìm Kiếm bên trái -->
        <form action="resultProducts.php" method="GET" class="search-bar">
            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." id="searchInput">
            <button href="resultProducts.php" class='btn btn-outline-warning mx-2 px-3 py-2 shadow'>Tìm</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>