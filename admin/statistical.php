<?php include "headerCRUD.php"; ?>

<style>
    tr,
    td {
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="d-flex">
    <!-- Sidebar -->
    <?php
    include "sidebar.php";
    include "../required.php";
    ?>

    <!-- BEGIN CONTENT -->
    <div id="content" class="p-3">
        <h1 class="mt-5 mb-4 d-flex align-items-center justify-content-center">Thống kê</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Widget Box -->
                    <div class="widget-box">
                        <!-- Widget Header -->
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h5></h5>
                        </div>

                        <!-- Widget Content -->
                        <div class="widget-content nopadding mt-3">
                            <!-- Table Responsive -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th style="width: 40vh;">Id sản phẩm</th>
                                            <th style="width: 40vh;">Hình sản phẩm</th>
                                            <th style="width: 50vh;">Tên sản phẩm</th>
                                            <th style="width: 20vh;">Số lần mua</th>
                                            <th style="width: 30vh;">Doanh thu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalAll = 0;
                                        $getDataToStatisticalByPay = $payment->getDataToStatisticalByPay();
                                        foreach ($getDataToStatisticalByPay as $key => $value):
                                            $totalAll += $value['total'];
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $value['product_id']; ?></td>
                                                <td>
                                                    <img src="../anh/<?php echo $value['image']; ?>" alt="Product Image"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                </td>
                                                <td>
                                                    <?php echo $value["namePro"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value["quantity"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value["total"] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-primary">
                                            <td colspan="4" class="text-end"><strong>Tổng Cộng:</strong></td>
                                            <td><strong><?php echo $totalAll ?>.00
                                                    USD</strong></td>
                                        </tr>
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