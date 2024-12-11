<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
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
=======

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="assets/images/favicon.ico">

     <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

     <title>PHPJabbers.com | Free Online Store Website Template</title>

     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Additional CSS Files -->
     <link rel="stylesheet" href="assets/css/fontawesome.css">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

     <!-- ***** Preloader Start ***** -->
     <div id="preloader">
          <div class="jumper">
               <div></div>
               <div></div>
               <div></div>
          </div>
     </div>
     <!-- ***** Preloader End ***** -->

     <!-- Header -->
     <?php include 'header.php' ?>

     <!-- Page Content -->
     <div class="page-heading about-heading header-text"
          style="background-image: url(assets/images/heading-6-1920x500.jpg);">
          <div class="container">
               <div class="row">
                    <div class="col-md-12">
                         <div class="text-content">
                              <h4>Lorem ipsum dolor sit amet</h4>
                              <h2>Checkout</h2>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="products call-to-action">
          <div class="container">
               <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                         <div class="row">
                              <div class="col-6">
                                   <em>Sub-total</em>
                              </div>

                              <div class="col-6 text-right">
                                   <strong>$ 128.00</strong>
                              </div>
                         </div>
                    </li>

                    <li class="list-group-item">
                         <div class="row">
                              <div class="col-6">
                                   <em>Extra</em>
                              </div>

                              <div class="col-6 text-right">
                                   <strong>$ 0.00</strong>
                              </div>
                         </div>
                    </li>

                    <li class="list-group-item">
                         <div class="row">
                              <div class="col-6">
                                   <em>Tax</em>
                              </div>

                              <div class="col-6 text-right">
                                   <strong>$ 10.00</strong>
                              </div>
                         </div>
                    </li>

                    <li class="list-group-item">
                         <div class="row">
                              <div class="col-6">
                                   <em>Total</em>
                              </div>

                              <div class="col-6 text-right">
                                   <strong>$ 138.00</strong>
                              </div>
                         </div>
                    </li>

                    <li class="list-group-item">
                         <div class="row">
                              <div class="col-6">
                                   <em>Deposit payment required</em>
                              </div>

                              <div class="col-6 text-right">
                                   <strong>$ 20.00</strong>
                              </div>
                         </div>
                    </li>
               </ul>

               <br>

               <div class="inner-content">
                    <div class="contact-form">
                         <form action="#">
                              <div class="row">
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Title:</label>
                                             <select class="form-control" data-msg-required="This field is required.">
                                                  <option value="">-- Choose --</option>
                                                  <option value="dr">Dr.</option>
                                                  <option value="miss">Miss</option>
                                                  <option value="mr">Mr.</option>
                                                  <option value="mrs">Mrs.</option>
                                                  <option value="ms">Ms.</option>
                                                  <option value="other">Other</option>
                                                  <option value="prof">Prof.</option>
                                                  <option value="rev">Rev.</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Name:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Email:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Phone:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Address 1:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Address 2:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">City:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">State:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Zip:</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Country:</label>
                                             <select class="form-control">
                                                  <option value="">-- Choose --</option>
                                                  <option value="">-- Choose --</option>
                                                  <option value="">-- Choose --</option>
                                                  <option value="">-- Choose --</option>
                                             </select>
                                        </div>
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Payment method</label>

                                             <select class="form-control">
                                                  <option value="">-- Choose --</option>
                                                  <option value="bank">Bank account</option>
                                                  <option value="cash">Cash</option>
                                                  <option value="paypal">PayPal</option>
                                             </select>
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                             <label class="control-label">Captcha</label>
                                             <input type="text" class="form-control">
                                        </div>
                                   </div>
                              </div>

                              <div class="form-group">
                                   <label class="control-label">
                                        <input type="checkbox">

                                        I agree with the <a href="terms.php" target="_blank">Terms &amp; Conditions</a>
                                   </label>
                              </div>

                              <div class="clearfix">
                                   <button type="button" class="filled-button pull-left">Back</button>

                                   <button type="submit" class="filled-button pull-right">Finish</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>

     <footer>
          <div class="container">
               <div class="row">
                    <div class="col-md-12">
                         <div class="inner-content">
                              <p>Copyright © 2020 Company Name - Template by: <a
                                        href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                         </div>
                    </div>
               </div>
          </div>
     </footer>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <div class="contact-form">
                              <form action="#" id="contact">
                                   <div class="row">
                                        <div class="col-md-6">
                                             <fieldset>
                                                  <input type="text" class="form-control" placeholder="Pick-up location"
                                                       required="">
                                             </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                             <fieldset>
                                                  <input type="text" class="form-control" placeholder="Return location"
                                                       required="">
                                             </fieldset>
                                        </div>
                                   </div>

                                   <div class="row">
                                        <div class="col-md-6">
                                             <fieldset>
                                                  <input type="text" class="form-control"
                                                       placeholder="Pick-up date/time" required="">
                                             </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                             <fieldset>
                                                  <input type="text" class="form-control" placeholder="Return date/time"
                                                       required="">
                                             </fieldset>
                                        </div>
                                   </div>
                                   <input type="text" class="form-control" placeholder="Enter full name" required="">

                                   <div class="row">
                                        <div class="col-md-6">
                                             <fieldset>
                                                  <input type="text" class="form-control"
                                                       placeholder="Enter email address" required="">
                                             </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                             <fieldset>
                                                  <input type="text" class="form-control" placeholder="Enter phone"
                                                       required="">
                                             </fieldset>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                         <button type="button" class="btn btn-primary">Book Now</button>
                    </div>
               </div>
          </div>
     </div>


     <!-- Bootstrap core JavaScript -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


     <!-- Additional Scripts -->
     <script src="assets/js/custom.js"></script>
     <script src="assets/js/owl.js"></script>
>>>>>>> a5fc99e44fb59381b5f4e485bdde88e282d6378d
</body>

</html>