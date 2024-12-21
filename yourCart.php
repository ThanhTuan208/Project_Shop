<link rel="stylesheet" href="AUI/cssButton.css">
<?php
include "required.php"
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng và Thông Tin Người Mua</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="AUI/cssButton.css">
</head>
<style>
    body {
        font-size: large;
        box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        justify-content: center;
        align-items: center;
        max-width: 200vh;
        text-align: center;
        margin: auto;
    }

    th,
    td {
        vertical-align: middle;
        text-align: center;
    }

    .bn632-hover {
        width: 70px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        margin: 20px;
        height: 35px;
        text-align: center;
        border: none;
        background-size: 300% 100%;
        border-radius: 50px;
        z-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .bn632-hover:hover {
        background-position: 100% 0;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .bn632-hover:focus {
        outline: none;
    }

    .bn632-hover.bn25 {
        background-image: linear-gradient(to right,
                rgb(28, 29, 32),
                rgb(137, 145, 153),
                rgb(4, 42, 67),
                rgb(134, 117, 198));
        box-shadow: 0 4px 15px 0 rgba(0, 61, 135, 0.9);
    }

    h1 {
        text-align: center;
        font-family: 'Arial', sans-serif;
        font-size: 42px;
        color: #333;
        text-shadow: 2px 2px 4px rgba(218, 200, 64, 0.6);
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="container my-5">
        <!-- Tiêu đề chính -->
        <div class="text-center mb-5">
            <h1 class="display-5">Sản phẩm đã mua</h1>
        </div>

        <!-- Hiển thị sản phẩm trong giỏ hàng -->
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Sản Phẩm </h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 20vh">Tên Sản Phẩm</th>
                            <th style="width: 20vh">Hình sản phẩm</th>
                            <th style="width: 20vh">Số Lượng</th>
                            <th style="width: 10vh">Trạng thái</th>
                            <th style="width: 20vh">Thời gian mua</th>
                            <th style="width: 20vh">Giá</th>
                            <th style="width: 20vh">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        session_start();
                        $id = isset($_SESSION["login_id"]) ? $_SESSION["login_id"] : 0;
                        $getUserIdToFindPurchased = $payment->getUserIdToFindPurchased($id);
                        foreach ($getUserIdToFindPurchased as $key => $value):
                            $total += $value["pricePay"]; ?>
                            <tr>
                                <td><?php echo $value["namePro"] ?></td>
                                <td><img src="anh/<?php echo $value['image']; ?>" alt=""
                                        style="width: 50px; height: 50px; object-fit: cover;"></td>
                                <td><?php echo $value["qty"] ?></td>
                                <td><?php echo $value["payment_status"] ?></td>
                                <td><?php echo $value["created_at"] ?></td>
                                <td>$<?php echo $value["pricePay"] ?></td>
                                <td>
                                    <form action="purchasedProductDetail.php?id=<?php echo $value["idPay"] ?>"
                                        method="post">
                                        <input type="hidden" name="pur_id" value="<?= $value["idPay"] ?>">
                                        <button type="submit" class="bn632-hover bn25 btn btn-danger btn-sm"
                                            style=" font-size: 12px;">Chi
                                            tiết</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <tr class="table-primary">
                            <td colspan="5" class="text-center"><strong>Tổng Cộng:</strong></td>
                            <td><strong><?php echo $total ?> USD</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Nút hành động -->
        <div class="btn d-flex justify-content-center mt-3">
            <a type="submit" href="index.php" class="bn5 btn btn-primary mx-2 mb-4">Tiếp tục mua sắm</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>