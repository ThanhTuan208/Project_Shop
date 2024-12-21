<?php include "required.php" ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="AUI/cssButton.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .header {
            background-color: #ff5b77;
            color: white;
            padding: 15px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .btn-back {
            background-color: #ffa000;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
        }

        .delivery-details,
        .order-details {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: white;
            padding: 20px;
        }

        .order-summary {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: white;
            padding: 20px;
        }

        .total-price {
            font-weight: bold;
            font-size: 20px;
            color: #333;
        }

        .table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="header d-flex justify-content-between align-items-center">
        <h1>View Order</h1>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Delivery Details -->
            <div class="col-md-6 mb-4">
                <div class="delivery-details">
                    <h4>Delivery Details</h4>
                    <?php
                    $total = 0;
                    session_start();
                    $id = isset($_SESSION["login_id"]) ? $_SESSION["login_id"] : 0;
                    $getUserById = $user->getUserById($id);
                    foreach ($getUserById as $key => $value): ?>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="<?= $value["tendangnhap"] ?>"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $value["email"] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" value="<?= $value["phone"] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tracking" class="form-label">Tracking No.</label>
                                <input type="text" class="form-control" id="tracking"
                                    value="VN/ID_<?= $_GET["id"] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" value="<?= $value["address"] ?>"
                                    readonly>
                            </div>
                        </form>
                    <?php endforeach ?>
                </div>
            </div>

            <!-- Order Details -->
            <div class="col-md-6 mb-4">
                <div class="order-details">
                    <h4>Order Details</h4>
                    <?php
                    $id = isset($_POST["pur_id"]) ? $_POST["pur_id"] : 0;
                    $getPayByID = $payment->getPayByID($id);
                    foreach ($getPayByID as $key => $value):

                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Tax</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="anh/<?= $value["image"] ?>" alt=""> <?= $value["namePro"] ?></td>
                                    <td>$<?= $value["pricePro"] ?>.00</td>
                                    <td>$<?= $value["pricePro"] * 0.01 ?></td>
                                    <td><?= $value["qty"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach ?>
                    <div class="text-end total-price">
                        <?php $total = $value["pricePro"] * $value["qty"];
                        echo "Total: $" . $total + ($total * 0.01); ?>
                    </div>
                    <div class="mt-3">
                        <p><strong>Payment Mode:</strong> <?= $value["payment_method"] ?></p>
                        <p><strong>Status:</strong> <?= $value["payment_status"] ?></p>
                    </div>
                </div>
                <div class="btn d-flex justify-content-center mt-3">
                    <a type="submit" href="yourCart.php" name="pay" value="cash" class="bn5 btn btn-primary mx-2 ">Quay
                        lại</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>