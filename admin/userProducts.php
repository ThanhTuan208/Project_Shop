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
    $total = count($user->getAllUser());
    $url = $_SERVER['PHP_SELF'] . '?keyword=' . 'user';
    ?>

    <!-- BEGIN CONTENT -->
    <div id="content" class="p-3">
        <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Tài khoản</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Widget Box -->
                    <div class="widget-box">
                        <!-- Widget Content -->
                        <div class="widget-content nopadding mt-3">
                            <!-- Table Responsive -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th style="width: 30vh;">Tên tài khoản</th>
                                            <th style="width: 30vh;">Mật khẩu</th>
                                            <th style="width: 30vh;">Số điện thoại</th>
                                            <th style="width: 30vh;">Địa chỉ</th>
                                            <th style="width: 30vh;">Ngày đăng kí</th>
                                            <th style="width: 30vh;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getAllUser = $user->getUserByStartCount($start, $perPage);
                                        foreach ($getAllUser as $key => $value):
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $value['tendangnhap']; ?></td>
                                                <td>
                                                    <?php echo $value['matkhau']; ?>
                                                </td>
                                                <td><?php echo $value['phone']; ?></td>
                                                <td><?php echo $value['address']; ?></td>
                                                <td><?php echo $value['ngaydangki']; ?></td>
                                                <td>
                                                    <a href="updateUser.php?user_id=<?php echo $value['id']; ?>"
                                                        class="btn btn-success btn-sm">Sửa</a>

                                                    <a href="delete.php?user_id=<?php echo $value["id"] ?>&del=user"
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