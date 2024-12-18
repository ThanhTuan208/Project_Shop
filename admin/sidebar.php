<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Sidebar -->
<nav class="bg-dark text-white" style="width: 250px; height: auto; border-radius: 15px">
    <style>
        /* CSS cho Sidebar */
        .nav-link {
            color: white;
            /* Màu chữ mặc định */
            transition: background-color 0.3s, color 0.3s;
            /* Hiệu ứng mượt */
            padding: 10px 15px;
            /* Tăng khoảng cách trong liên kết */
            border-radius: 5px;
            /* Bo tròn nhẹ các góc */
            display: block;
            /* Đảm bảo vùng liên kết là khối */
        }

        .nav-link:hover {
            background-color: #343a40;
            /* Đổi màu nền khi hover */
            color: #ffc107;
            /* Đổi màu chữ khi hover */
            text-decoration: none;
            /* Loại bỏ gạch chân */
        }

        .nav-item {
            margin-bottom: 15px;
            /* Khoảng cách giữa các mục */
        }

        .text-center {
            font-weight: bold;
            /* Chữ in đậm cho tiêu đề */
        }
    </style>

    <div class="mt-3 p-3">
        <h4 class="text-center mb-5">Bảng điều khiển</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="../index.php" class="nav-link">
                    <i class="bi bi-house-door"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a href="itemProducts.php" class="nav-link">
                    <i class="bi bi-list"></i> Mục sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a href="manuProducts.php" class="nav-link">
                    <i class="bi bi-tags"></i> Danh mục
                </a>
            </li>
            <li class="nav-item">
                <a href="userProducts.php" class="nav-link">
                    <i class="bi bi-people"></i> Người dùng
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="addProductsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-plus-circle"></i> Thêm sản phẩm
                </a>
                <ul class="dropdown-menu" aria-labelledby="addProductsDropdown">
                    <li><a class="dropdown-item" href="addProducts.php">Thêm sản phẩm</a></li>
                    <li><a class="dropdown-item" href="addManu.php">Thêm danh mục</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="statistical.php" class="nav-link">
                    <i class="bi bi-clipboard2-data"></i> Thống kê
                </a>
            </li>
        </ul>
    </div>
</nav>