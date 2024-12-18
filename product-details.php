<!DOCTYPE html>
<html lang="en">

<head>

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
<style>
  /* Định dạng cho sao */
  .star-rating {
    direction: rtl;
    display: inline-block;
    font-size: 2em;
    color: #ddd;
  }

  .star-rating input {
    display: none;
  }

  .star-rating label {
    cursor: pointer;
  }

  .star-rating input:checked~label {
    color: #FFD700;
  }

  .star-rating input:checked+label~label {
    color: #FFD700;
  }

  .star-rating label:hover,
  .star-rating label:hover~label {
    color: #FFD700;
  }
</style>

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
  <?php
  include 'required.php';
  include 'header.php' ?>

  <!-- Page Content -->
  <div class="page-heading about-heading header-text"
    style="background-image: url(https://as1.ftcdn.net/v2/jpg/08/15/12/10/1000_F_815121013_22xvtignar8tdiz6EZkFvuwA4V24KaSj.jpg); height: 500px">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Sản phẩm chi tiết</h4>
            <h2>Product Details</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <?php
      $productID = isset($_GET['id']) ? $_GET['id'] : 0;
      $showFullKey = isset($_GET['show_full']) ? $_GET['show_full'] : null;
      $getProductDetail = $product->getProductDetail($productID);
      foreach ($getProductDetail as $key => $value): ?>
        <form action="addProductsUser.php?id=<?php echo $productID ?>" method="GET" class="form">
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <div>
                <input type="hidden" name="product_id" value="<?php echo $productID ?>">
              </div>
              <div>
                <input type="hidden" name="image" value="<?php echo $value['image']; ?>">
                <img src="anh/<?php echo $value['image'] ?>" alt="" class="img-fluid wc-image">
              </div>
              <br>
            </div>

            <div class="col-md-8 col-xs-12">

              <input type="hidden" name="name" value="<?php echo $value['name']; ?>">
              <h2 name="name"><?php echo $value['name']; ?></h2>

              <!-- Phần đánh giá sao -->
              <div class="star-rating">
                <input type="radio" name="rating" id="star5" value="5">
                <label for="star5">&#9733;</label>
                <input type="radio" name="rating" id="star4" value="4">
                <label for="star4">&#9733;</label>
                <input type="radio" name="rating" id="star3" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" name="rating" id="star2" value="2">
                <label for="star2">&#9733;</label>
                <input type="radio" name="rating" id="star1" value="1">
                <label for="star1">&#9733;</label>
              </div>
              <br>
              <!-- Kết thúc phần đánh giá sao -->

              <p class="lead">
                <input type="hidden" name="price" value="<?php echo $value['price']; ?>">
                <strong class="text-primary" name="price">$<?php echo $value['price']; ?>.00</strong>
              </p>
              <p>
                <?php if ($showFullKey != (string) $key): ?>
                  <span id="short-desc-<?php echo $key; ?>">
                    <?php echo (substr($value['description'], 0, 150)) . '...'; ?>
                  </span>
                  <a href="?id=<?php echo $productID; ?>&show_full=<?php echo $key; ?>"
                    id="toggle-desc-<?php echo $key; ?>">
                    Xem thêm
                  </a>

                <?php else: ?>
                  <?php echo ($value['description']); ?>
                  <br>
                  <a href="?id=<?php echo $productID; ?>" id="toggle-desc-<?php echo $key; ?>">
                    Thu gọn
                  </a>
                <?php endif; ?>
              </p>

              <br>

              <div class="row">
                <div class="col-sm-8">
                  <label class="control-label">Quantity</label>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="1" name="qty" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <button type="submit" href="addProductsUser.php" class="btn btn-primary btn-block">Add to
                        Cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      <?php endforeach; ?>
    </div>
  </div>


  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Similar Products</h2>
            <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php
        $Similar = $product->getSimilarProduct($productID, 0, 3);
        foreach ($Similar as $key => $value): ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php?id=<?php echo $value['id'] ?>"><img src="anh/<?php echo $value['image'] ?>"
                  alt=""
                  style="width: 300px; height: 350px; object-fit: cover;  display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px"></a>
              <div class="down-content">
                <a href="product-details.php?id=<?php echo $value['id'] ?>">
                  <h4><?php echo $value['name'] ?></h4>
                </a>
                <small><del> $999.00</del></small><strong class="text-primary">$<?php echo $value['price'] ?>
                  .00</strong>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
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
                    <input type="text" class="form-control" placeholder="Pick-up location" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Return location" required="">
                  </fieldset>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Return date/time" required="">
                  </fieldset>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Enter full name" required="">

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Enter email address" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Enter phone" required="">
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