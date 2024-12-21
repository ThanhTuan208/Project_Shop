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
  include "required.php";
  include 'header.php' ?>


  <!-- Page Content -->
  <div class="page-heading contact-heading header-text"
    style="background-image: url(https://www.searchenginejournal.com/wp-content/uploads/2022/08/contact-us-2-62fa2cc2edbaf-sej.png); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 550px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Liên hệ</h4>
            <h2>Contact Us</h2>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="find-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Vị trí</h2>
          </div>
        </div>
        <div class="col-md-7">
          <div id="map">
            <iframe src="https://maps.google.com/maps?q=10.8514325,106.7580641&t=&z=15&ie=UTF8&iwloc=&output=embed"
              width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-5">
          <div class="left-content">
            <h4 style="text-align:;">Văn phòng của chúng tôi</h4>
            <p>Chúng tôi tự hào về môi trường làm việc tại văn phòng của mình, nơi luôn tạo ra sự sáng tạo và sự hợp tác
              giữa các thành viên. Văn phòng của chúng tôi được trang bị đầy đủ tiện nghi và tạo điều kiện tối ưu để các
              nhân viên làm việc hiệu quả
              <br>
              Chúng tôi cam kết xây dựng một không gian làm việc năng động, sáng tạo, giúp đội ngũ nhân viên phát triển
              tốt nhất trong công việc. Các giá trị của chúng tôi là nền tảng cho một môi trường làm việc tích cực, nơi
              mỗi cá nhân đều có thể đóng góp và phát triển.
            </p>
            <ul class="social-icons d-flex justify-content-center">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Gửi tin nhắn cho chúng tôi qua Email</h2>
          </div>
        </div>
        <div class="col-md-7">
          <div class="contact-form">
            <form id="contact" action="sendMailContact.php" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address"
                      required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject"
                      required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                      required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <form action="sendMailContact.php" method="post">
                      <button type="submit" id="form-submit" name="send" class="filled-button">Send Message</button>
                    </form>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <img src="anh/263548938_4618532998215892_2592749403050682765_n.png" class="img-fluid" alt=""
            style="width: 800px; height: 300px">

          <h5 class="text-center" style="margin-top: 15px;"><strong>Company:</strong> <i> YoungTeam</i></h5>
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
  <footer>
    <?php include 'footer.php' ?>
  </footer>
</body>

</html>