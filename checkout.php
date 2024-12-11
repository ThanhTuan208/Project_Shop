<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Giỏ Hàng và Thông Tin Người Mua</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
     <div class="container mt-5">
          <h2 class="text-center mb-4">Giỏ Hàng của Bạn</h2>

          <!-- Thông tin người mua -->
          <div class="mb-4">
               <h4>Thông Tin Người Mua</h4>
               <?php
               session_start();
               // Giả sử thông tin người mua được lưu vào session khi đặt hàng
               if (isset($_SESSION['buyer_info'])) {
                    $buyer_info = $_SESSION['buyer_info'];
                    echo "<p><strong>Họ và Tên:</strong> {$buyer_info['fullname']}</p>";
                    echo "<p><strong>Email:</strong> {$buyer_info['email']}</p>";
                    echo "<p><strong>Số điện thoại:</strong> {$buyer_info['phone']}</p>";
                    echo "<p><strong>Địa chỉ:</strong> {$buyer_info['address']}</p>";
               } else {
                    echo "<p class='text-danger'>Thông tin người mua chưa được cung cấp!</p>";
               }
               ?>
          </div>

          <!-- Hiển thị sản phẩm trong giỏ hàng -->
          <div class="table-responsive">
               <table class="table table-bordered">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Tên Sản Phẩm</th>
                              <th>Giá</th>
                              <th>Số Lượng</th>
                              <th>Tổng</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                              $total_price = 0;
                              foreach ($_SESSION['cart'] as $index => $item) {
                                   $subtotal = $item['price'] * $item['quantity'];
                                   $total_price += $subtotal;
                                   echo "
                                <tr>
                                    <td>" . ($index + 1) . "</td>
                                    <td>{$item['name']}</td>
                                    <td>" . number_format($item['price'], 0, ',', '.') . " VND</td>
                                    <td>{$item['quantity']}</td>
                                    <td>" . number_format($subtotal, 0, ',', '.') . " VND</td>
                                </tr>
                            ";
                              }
                              echo "
                            <tr>
                                <td colspan='4' class='text-end'><strong>Tổng Cộng:</strong></td>
                                <td><strong>" . number_format($total_price, 0, ',', '.') . " VND</strong></td>
                            </tr>
                        ";
                         } else {
                              echo "<tr><td colspan='5' class='text-center'>Giỏ hàng trống!</td></tr>";
                         }
                         ?>
                    </tbody>
               </table>
          </div>

          <!-- Nút hành động -->
          <div class="text-center mt-4">
               <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
               <a href="checkout.php" class="btn btn-success">Tiến hành thanh toán</a>
          </div>
     </div>

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>