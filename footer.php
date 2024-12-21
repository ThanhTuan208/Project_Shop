<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <link href="css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
</head>

<body>

    <div class="container-fluid pt-3">

        <div class="container-fluid fh5co_video_news_bg pb-4">
            <div class="container animate-box" data-animate-effect="fadeIn">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
                </div>

            </div>
        </div>

        <div class="container-fluid fh5co_footer_bg pb-3">
            <div class="container animate-box">
                <div class="row">
                    <div class="col-12 spdp_right py-5"><img
                            src="https://th.bing.com/th/id/OIP.O8M8eJbwMT94Wst3JG8aTAHaFD?rs=1&pid=ImgDetMain" alt="img"
                            class="footer_logo" />
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="footer_main_title py-3 text-center"> About</div>
                        <div class="footer_sub_about pb-3">
                            <h4>Chúng tôi cung cấp: </h4>
                            <ul>
                                <li><strong>Sản phẩm chính hãng:</strong> Chúng tôi cam kết cung cấp sản phẩm chính hãng
                                    100%, đầy đủ bảo
                                    hành từ các thương hiệu nổi tiếng.</li>
                                <li><strong>Giá cả cạnh tranh: </strong>Mang lại giá trị tốt nhất cho khách hàng với các
                                    chương trình
                                    khuyến mãi và ưu đãi thường xuyên.</li>
                                <li><strong>Hỗ trợ khách hàng 24/7: </strong> Đội ngũ chăm sóc khách hàng nhiệt tình
                                    luôn lắng nghe và
                                    giải quyết mọi yêu cầu của bạn.</li>
                            </ul>
                        </div>
                        <div class="footer_mediya_icon text-center">
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                                </a></div>
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                                </a></div>
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                                </a></div>
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                                </a></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-4">
                        <div class="footer_main_title py-3 text-center"> Category</div>
                        <ul class="footer_menu text-center">
                            <?php
                            $getAllManu = $manufactures->getAllManu();
                            foreach ($getAllManu as $key => $value): ?>
                                <li><a href="<?php echo $value["manu_name"] ?>Product.php?manu_id=<?php echo $value["manu_id"] ?>"
                                        class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                                        <?php echo $value['manu_name'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 ">
                        <div class="footer_main_title py-3 text-center"> Last Modified Posts</div>
                        <?php
                        $getTopItem = $product->getTopItem(0, 9);
                        foreach ($getTopItem as $key => $value): ?>
                            <a href="product-details.php?id=<?php echo $value["id"] ?>" class="footer_img_post_6"><img
                                    src="anh/<?php echo $value["image"] ?> "
                                    style="width: 70px; height: 90px; object-fit: cover;  display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px"
                                    alt="img" /></a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="row justify-content-center pt-2 pb-4">
                    <div class="col-12 col-md-8 col-lg-7 ">
                        <div class="input-group">
                            <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i
                                    class="fa fa-envelope"></i></span>
                            <input type="text" class="form-control fh5co_footer_text_box"
                                placeholder="Enter your email..." aria-describedby="basic-addon1">
                            <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i
                                    class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid fh5co_footer_right_reserved">
            <div class="container">
                <div class="row  ">
                    <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2018, All rights reserved. Design by <a
                            href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">FreeHTML5.co</a>. </div>
                    <div class="col-12 col-md-6 spdp_right py-4">
                        <a href="#" class="footer_last_part_menu">Home</a>
                        <a href="Contact_us.html" class="footer_last_part_menu">About</a>
                        <a href="Contact_us.html" class="footer_last_part_menu">Contact</a>
                        <a href="blog.html" class="footer_last_part_menu">Latest News</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>

</body>

</html>