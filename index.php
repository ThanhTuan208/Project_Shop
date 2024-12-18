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

  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

</head>
<style>
  .down-content .buy p {
    text-align: center;
    font-family: 'Arial', sans-serif;
    font-size: 17px;
    color: #333;
    text-shadow: 2px 2px 4px rgba(218, 200, 64, 0.6);
    margin-bottom: 20px;
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
  include 'header.php'; ?>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01"
        style="background-image: url('https://th.bing.com/th/id/R.0d30189b24d4eaf10b7454cdfeda1579?rik=%2fVZtUJDAP17rHg&pid=ImgRaw&r=0');">
        <div class="text-content">
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->



  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Featured Products</h2>
            <a href="featuredProduct.php">view more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php $getTopItem = $product->getFeatureItem(1, 3, 3);
        foreach ($getTopItem as $key => $value): ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php?id=<?php echo $value['productID'] ?>">
                <img src="anh/<?php echo $value['image']; ?>" alt=""
                  style="width: 200px; height: 200px; object-fit: cover; display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px;">
              </a>
              <div class="down-content">
                <a href="product-details.php?id=<?php echo $value['id'] ?>">
                  <h4><?php echo $value['name'] ?></h4>
                </a>
                <h6><small><del>$999.00</del></small> $<?php echo $value['price'] ?></h6>
                <p><?php echo substr($value['description'], 0, 100) ?> ...</p>
                <div class="buy" style="display: flex; justify-content: space-between; align-items: center;">
                  <p>Số lượt bán: <?php echo $value["quantity"] ?> </p>
                  <p> <?php echo $value["nameType"] ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="best-seller">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Best selling products</h2>
          </div>
        </div>
        <div class="col-md-12">
          <form action="product-details.php" method="GET">
            <div class="owl-clients owl-carousel text-center">
              <?php $getQtyByPay = $payment->getQtyByPay();
              foreach ($getQtyByPay as $key => $value): ?>
                <div class="service-item">
                  <a style="width: 50px, height: 10px;" href="product-details.php?id=<?php echo $value['product_id'] ?>"
                    class="services-item-image">
                    <img src="anh/<?php echo $value['image'] ?>" class="img-fluid" alt=""
                      style="width: 200px; height: 200px; object-fit: cover;   display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px">
                  </a>
                  <div class="down-content">
                    <h4><?php echo $value['namePro'] ?></h4>
                    <div class="buy" style="display: flex; justify-content: space-between; align-items: center;">
                      <p>Số lượt bán: <?php echo $value["quantity"] ?> </p>
                      <p>$ <?php echo $value["price"] ?>.00</p>

                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <div class="services"
    style="background-image: url('https://i.gifer.com/origin/46/462c6f5f67c13830cd9fcdbfc7b55ded.gif');">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest products posts</h2>
            <a href="latestPro.php">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php $getTopItem = $product->getMenuByProduct(0, 3);
        foreach ($getTopItem as $key => $value):
          $formatDate = date('M, d, Y', strtotime($value['created_at'])); ?>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="product-details.php?id=<?php echo $value["id"] ?>" class="services-item-image">
                <img src="anh/<?php echo $value['image'] ?>" class="img-fluid" alt=""
                  style="width: 400px; height: 200px; object-fit: cover;  display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px">
              </a>
              <div class="down-content">
                <h4><a href="#"><?php echo $value['name']; ?></a></h4>
                <p style="margin: 0;">
                  <?php echo $value['nameManu'] ?> &nbsp;&nbsp;|&nbsp;&nbsp;
                  <?php echo $formatDate ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Authors</h2>
          </div>
        </div>
        <div class="col-md-12">
          <form action="product-details.php" method="GET">
            <div class="owl-clients owl-carousel text-center">
              <?php $getTopItem = $manufactures->getAllManu();
              foreach ($getTopItem as $key => $value): ?>
                <div class="service-item">
                  <form action="AppleProduct.php?id=<?php echo $value["manu_id"] ?>" method="GET">

                    <a style="width: 50px, height: 10px;"
                      href="<?php echo $value['manu_name'] ?>Product.php?manu_id=<?php echo $value['manu_id'] ?>"
                      class="services-item-image">
                  </form>
                  <img src="anh/<?php echo $value['img'] ?>" class="img-fluid" alt=""
                    style="width: 400px; height: 200px; object-fit: cover;   display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px">
                  </a>
                  <div class="down-content">
                    <h4><?php echo $value['manu_name'] ?></h4>
                    <p class="n-m"><em><?php echo $value['authors'] ?></em></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.
                </p>
              </div>
              <div class="col-lg-4 col-md-6 text-right">
                <a href="contact.php" class="filled-button">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; 2020 Company Name - Template by: <a
                href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>