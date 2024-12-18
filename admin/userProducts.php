<?php include "headerCRUD.php"; ?>
<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include "sidebar.php";
    include "../required.php";
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
                                            <th style="width: 60vh;">Tên tài khoản</th>
                                            <th style="width: 60vh;">Mật khẩu</th>
                                            <th style="width: 60vh;">Ngày đăng kí</th>
                                            <th style="width: 60vh;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getAllUser = $user->getAllUser();
                                        foreach ($getAllUser as $key => $value):
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $value['tendangnhap']; ?></td>
                                                <td>
                                                    <?php echo $value['matkhau']; ?>
                                                </td>
                                                <td><?php echo $value['ngaydangki']; ?></td>
                                                <td>
                                                    <a href="updateUser.php?id=<?php echo $value['id']; ?>"
                                                        class="btn btn-success btn-sm">Sửa</a>
                                                    <a href="delete.php?id=<?php echo $value['id']; ?>"
                                                        class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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