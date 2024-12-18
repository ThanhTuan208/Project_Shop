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
      <h1 class="display-5">Giỏ Hàng của Bạn</h1>
    </div>

    <!-- Hiển thị sản phẩm trong giỏ hàng -->
    <div class="card shadow-sm mb-5">
      <div class="card-header bg-success text-white">
        <h4 class="mb-0">Sản Phẩm Trong Giỏ Hàng</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>Tên Sản Phẩm</th>
              <th>Hình sản phẩm</th>
              <th>Giá</th>
              <th>Số Lượng</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $getAllCart = $cart->getAllCart();
            foreach ($getAllCart as $key => $value):
              $total += $value['price'];
              $qty = isset($_GET["qty"]) ? $_GET["qty"] : 1

                ?>
              <tr>
                <td><?php echo $value["name"] ?></td>
                <td><img src="anh/<?php echo $value['image']; ?>" alt=""
                    style="width: 50px; height: 50px; object-fit: cover;"></td>
                <td><?php echo $value["price"] ?>.00</td>
                <td>
                  <form method="GET" action="updateCart.php" class="d-inline">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                    <button type="submit" name="action" value="decrease"
                      class="bn632-hover bn25 btn-sm btn-warning">-</button>
                    <span><?php echo $value["qty"] * $qty; ?></span>
                    <button type="submit" name="action" value="increase"
                      class="bn632-hover bn25 btn-sm btn-success">+</button>
                  </form>
                </td>
                <td>
                  <a href="deleteProductsUser.php?id=<?php echo $value["id"] ?>"
                    class="bn632-hover bn25 btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            <?php endforeach ?>
            <tr class="table-primary">
              <td colspan="4" class="text-end"><strong>Tổng Cộng:</strong></td>
              <td><strong><?php echo $total ?>.00 USD</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Nút hành động -->
    <div class="text-center">
      <a href="index.php" class="btn btn-outline-primary btn-lg me-3">Tiếp Tục Mua Sắm</a>
      <form method="post" action="checkout.php" class="d-inline">
        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
        <button type="submit" href="checkout.php" class="btn btn-outline-success btn-lg me-3">Tiến Hành
          Thanh
          Toán</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>