<link rel="stylesheet" href="style.css">
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
    $perPage = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $perPage;
    $total = count($payment->getAllPayment());
    $url = $_SERVER['PHP_SELF'] . '?keyword=' . 'statistical';
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
                                            <th style="width: 20vh;">Giá</th>
                                            <th style="width: 20vh;">Số lần mua</th>
                                            <th style="width: 20vh;">Số lượng</th>
                                            <th style="width: 30vh;">Doanh thu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalAll = 0;
                                        $getDataToStatisticalByPay = $payment->getDataToStatisticalByPay($start, $perPage);
                                        foreach ($getDataToStatisticalByPay as $key => $value): ?>
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
                                                    $ <?php echo $value["price"] ?>.00
                                                </td>

                                                <td>
                                                    <?php echo $value["quantity"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value["total_qty"] ?>
                                                </td>
                                                <td>
                                                    $ <?php echo $value["total_price"] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-primary">
                                            <td colspan="6" class="text-end"><strong>Tổng Cộng:</strong></td>
                                            <td><strong><?php echo $payment->sumAllPay() ?>
                                                    USD</strong></td>
                                        </tr>
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