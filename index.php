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
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <?php $getTopItem = $manufactures->getAllManu();
      foreach ($getTopItem as $key => $value): ?>
        <div class="banner-item-01" style="background-image: url('https://wallpaperaccess.com/full/829012.jpg');">
          <div class="text-content">
            <h4>...</h4>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Banner Ends Here -->

  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Featured Products</h2>
            <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php $getTopItem = $product->getFeatureItem(1, 3, 6);
        foreach ($getTopItem as $key => $value): ?>
          <div class="col-md-4">

            <div class="product-item">
              <a href="product-details.php?id=<?php echo $value['id'] ?>"><img src="anh/<?php echo $value['image'] ?>"
                  alt=""></a>
              <div class="down-content">
                <a href="product-details.php?id=<?php echo $value['id'] ?>">
                  <h4><?php echo $value['name'] ?></h4>
                </a>
                <h6><small><del>$999.00 </del></small>$<?php echo $value['price'] ?>.00</h6>
                <p><?php echo substr($value['description'], 0, 100) ?> ...</p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>

  <!-- 
  <div class="services"
    style="background-image: url(https://th.bing.com/th/id/R.1ad066a598d1aae8bd4025cb722a5e3b?rik=K6hblJmzZN2jkg&pid=ImgRaw&r=0);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest blog posts</h2>

            <a href="blog.php">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php $getTopItem = $product->getMenuByProduct(0, 3);
        foreach ($getTopItem as $key => $value):
          $formatDate = date('M, d, Y', strtotime($value['created_at'])) ?>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="anh/<?php echo $value['image'] ?>" class="img-fluid"
                  alt=""></a>

              <div class="down-content">
                <h4><a href="#"><?php echo $value['name']; ?></a></h4>

                <p style="margin: 0;"> <?php echo $value['nameManu'] ?> &nbsp;&nbsp;|&nbsp;&nbsp;
                  <?php echo $formatDate ?>
                  &nbsp;&nbsp;|&nbsp;&nbsp; 114
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div> -->

  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Happy Clients</h2>

            <a href="testimonials.php">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel text-center">
            <?php $getTopItem = $manufactures->getAllManu();
            $arr = ['https://wallpapercave.com/wp/wp5411646.jpg', 'https://wallpaperaccess.com/full/181231.png', 'https://images.hdqwalls.com/wallpapers/oppo-find-x-2018-ar.jpg', 'https://th.bing.com/th/id/R.647377192684b190b12a19dc5e8d3ee9?rik=jHqTW5kuErOo4A&pid=ImgRaw&r=0', 'https://wallpaperaccess.com/full/85194.jpg'];
            foreach ($getTopItem as $key => $value): ?>
              <div class="service-item">
                <a style="width: 50px, height: 10px;" href="<?php echo $value['manu_name'] ?>Product.php"
                  class="services-item-image"><img src="<?php echo $arr[$key] ?>" class="img-fluid" alt=""></a>
                <div class="down-content">
                  <h4><?php echo $value['manu_name'] ?></h4>
                  <p class="n-m"><em>"Lorem ipsum dolor"</em></p>
                </div>
              </div>
            <?php endforeach ?>
          </div>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                  author nulla.
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
            <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
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
</body>

</html>