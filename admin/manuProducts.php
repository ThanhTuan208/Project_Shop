<link rel="stylesheet" href="style.css">
<?php include "headerCRUD.php"; ?>

<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include "sidebar.php";
    include "../required.php";
    $perPage = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $perPage;
    $total = count($manufactures->getAllManu());
    $url = $_SERVER['PHP_SELF'] . '?keyword=' . "manu";
    ?>

    <!-- BEGIN CONTENT -->
    <div id="content" class="p-3">
        <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Thương hiệu</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Widget Box -->
                    <div class="widget-box">
                        <!-- Widget Header -->
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h5>Danh mục</h5>
                            <a href="addManu.php" class="btn btn-primary">
                                <i class="icon-plus"></i> Thêm Mới
                            </a>
                        </div>

                        <!-- Widget Content -->
                        <div class="widget-content nopadding mt-3">
                            <!-- Table Responsive -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th style="width: 30vh;">Hình Ảnh</th>
                                            <th style="width: 50vh;">Tên hãng</th>
                                            <th style="width: 50vh;">Tên tác giả</th>
                                            <th style="width: 50vh;">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Lấy tất cả dữ liệu nhà sản xuất
                                        $getAllManu = $manufactures->getAllManuStartCount($start, $perPage);
                                        foreach ($getAllManu as $key => $value):
                                            ?>
                                            <tr class="text-center">
                                                <td>
                                                    <img src="../anh/<?php echo $value['img']; ?>" alt="Hình Ảnh Sản Phẩm"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                </td>
                                                <td><?php echo $value['manu_name']; ?></td>
                                                <td><?php echo $value['authors']; ?></td>
                                                <td>
                                                    <a href="updateManu.php?manu_id=<?php echo $value['manu_id']; ?>"
                                                        class="btn btn-success btn-sm">Sửa</a>

                                                    <a href="delete.php?manu_id=<?php echo $value['manu_id']; ?>&del=manu"
                                                        class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-4">
                                    <ul class="pagination">
                                        <?php echo $product->pageInt($url, $total, $perPage, $page); ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Table Responsive -->
                        </div>
                        <!-- End Widget Content -->
                    </div>
                    <!-- End Widget Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>