<?php include "headerCRUD.php"; ?>
<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include "sidebar.php";
    include "../required.php";

    $perPage = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $perPage;
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $total = count($product->TotalCate($keyword));
    $url = $_SERVER['PHP_SELF'] . '?keyword=' . $keyword;
    ?>
    <!-- BEGIN CONTENT -->
    <div id="content" class="p-3">
        <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Quản Lý Sản Phẩm</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="widget-box">
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h5>Sản Phẩm</h5>
                            <a href="addProducts.php" class="btn btn-primary">
                                <i class="icon-plus"></i> Thêm Mới
                            </a>
                        </div>
                        <div class="widget-content nopadding mt-3">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>Tên</th>
                                        <th>Nhà Sản Xuất</th>
                                        <th>Loại</th>
                                        <th>Giá</th>
                                        <th>Hình Ảnh</th>
                                        <th>Mô Tả</th>
                                        <th>Nổi Bật</th>
                                        <th>Ngày Tạo</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getAllProducts = $product->getAllItemByAllTable($keyword, $start, $perPage);
                                    foreach ($getAllProducts as $key => $value):
                                        $dateFormat = date('M, d, Y', strtotime($value['created_at']));
                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['nameManu']; ?></td>
                                            <td><?php echo $value['nameType']; ?></td>
                                            <td>$<?php echo $value['price']; ?>.00</td>
                                            <td>
                                                <img src="../anh/<?php echo $value['image']; ?>" alt="Product Image"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            </td>
                                            <td><?php echo substr($value['description'], 0, 50); ?>...</td>
                                            <td><?php echo $value['feature'] ? "Có" : "Không"; ?></td>
                                            <td><?php echo $dateFormat; ?></td>
                                            <td>
                                                <a href="updateProducts.php?id=<?php echo $value['id']; ?>"
                                                    class="btn btn-success btn-sm">Sửa</a>
                                                <a href="delete.php?id=<?php echo $value['id']; ?>"
                                                    class="btn btn-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                <ul class="pagination">
                                    <?php echo $product->pageInt($url, $total, $perPage, $page); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>