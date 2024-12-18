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
<link rel="stylesheet" href="AUI/cssButton.css">
<link rel="stylesheet" href="assets/css/owl.css">


</head>

<style>
     .card {
          border-radius: 20px;
          box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.4);
     }

     .card p {
          font-size: 18px;
     }

     .card h4 {
          text-align: center;
     }

     h1 {
          text-align: center;
          font-family: 'Arial', sans-serif;
          font-size: 42px;
          color: #333;
          text-shadow: 2px 2px 4px rgba(218, 200, 64, 0.6);
          margin-bottom: 20px;
     }

     .card-header {
          background-color: #333;
     }
</style>

<div>

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
     <?php
     include "required.php";
     include 'header.php' ?>

     <!-- Page Content -->
     <div class="page-heading about-heading header-text"
          style="background-image: url(https://www.yash.com/wp-content/uploads/2021/06/obs-blog-img.png); background-size: cover">
          <div class="container">
               <div class="row">
                    <div class="col-md-12">
                         <div class="text-content">
                              <h4>thanh toán</h4>
                              <h2>Checkout</h2>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="products call-to-action">
          <form action="payment.php" method="post">
               <div class="container">
                    <?php $getAllCart = $cart->getAllCart();
                    $total = 0;
                    foreach ($getAllCart as $key => $value) {
                         $total += $value["price"];
                    }
                    ?>
                    <ul class="list-group list-group-flush">

                         <li class="list-group-item">
                              <div class="row">
                                   <div class="col-6">
                                        <em>Sản phẩm của bạn </em>
                                   </div>
                                   <div class="col-6 text-right">
                                        <?php $arr = [];
                                        foreach ($cart->getAllCart() as $key => $value) {
                                             $arr[] = $value["name"];
                                        }
                                        echo implode(", ", $arr);
                                        ?></strong>
                                   </div>
                              </div>
                         </li>
                         <li class="list-group-item">
                              <div class="row">
                                   <div class="col-6">
                                        <em>Tổng tiền mặt hàng </em>
                                   </div>

                                   <div class="col-6 text-right">
                                        <strong>
                                             $ <?php echo $total ?>.00
                                        </strong>
                                   </div>
                              </div>
                         </li>

                         <li class="list-group-item">
                              <div class="row">
                                   <div class="col-6">
                                        <em>Phụ thu </em>
                                   </div>

                                   <div class="col-6 text-right">
                                        <strong>$ 0.00</strong>
                                   </div>
                              </div>
                         </li>

                         <li class="list-group-item">
                              <div class="row">
                                   <div class="col-6">
                                        <em>Thuế </em>
                                   </div>

                                   <div class="col-6 text-right">
                                        <strong>$ <?php
                                        $tax = $total * 0.01;
                                        echo $tax ?></strong>
                                   </div>
                              </div>
                         </li>

                         <li class="list-group-item">
                              <div class="row">
                                   <div class="col-6">
                                        <em>Tổng giá của <?php echo count($getAllCart) ?> sản phẩm được thanh toán
                                             là</em>
                                   </div>

                                   <div class="col-6 text-right">
                                        <input type="hidden" name="total"><strong>$ <?php echo $total + $tax ?></strong>
                                   </div>
                              </div>
                         </li>
                    </ul>

                    <!-- Thông tin người mua -->
                    <div class="card shadow-sm mb-1 mt-5">
                         <div class="card-header  text-white">
                              <h4 class="mb-0">Thông Tin Người Mua</h4>
                         </div>
                         <div class="card-body">
                              <?php
                              $id = isset($_SESSION['login_id']) ? $_SESSION["login_id"] : 0;
                              $getUser = $user->getUserByID($id);
                              foreach ($getUser as $key => $value): ?>
                                   <p><strong>Tên người dùng: </strong><?php echo $value["tendangnhap"] ?></p>
                                   <p><strong>Email: </strong> <?php echo $value["email"] ?></p>
                                   <p><strong style="margin: bottom: 10px;">Số điện thoại: </strong><input type="text"
                                             class="form-control mt-2" id="sdt" name="sdt" required>
                                   <p><strong>Địa chỉ: </strong><input type="text" class="form-control mt-2" id="diachi"
                                             name="diachi" required></p>
                              <?php endforeach ?>
                         </div>
                    </div>
                    <h2 style="text-align: center ; margin-top: 17px ">Thanh toán</h2>
                    <div class="payment d-flex justify-content-center mt-3">
                         <button type="submit" href="payment.php" name="pay" value="cash"
                              class="bn5 btn btn-primary mx-2">Tiền mặt</button>
                         <button type="submit" href="payment.php" name="pay" value="transfer"
                              class="bn5 btn-primary mx-2">Chuyển
                              khoản</button>
                    </div>
               </div>
          </form>

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

     </body>

     </html>