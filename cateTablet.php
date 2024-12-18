<!-- products.php -->
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
    include 'header.php';

    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perPage = 6;
    $start = ($page - 1) * $perPage;
    $search = $product->search($keyword, $start, $perPage);
    $total = count($product->searchCountByType_Id1(1));
    $url = $_SERVER['PHP_SELF'] . '?keyword=' . $keyword;
    ?>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
        style="background-image: url(https://i.ytimg.com/vi/r6dacT7Pddk/maxresdefault.jpg); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 550px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2>Tablet</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row mx-0 justify-content-center">
                <?php
                $getAllProtype = $protype->getAllProtype();
                foreach ($getAllProtype as $key => $value): ?>
                    <div class="col-auto text-center">
                        <a href='cate<?php echo $value['type_name'] ?>.php'
                            class='btn btn-outline-warning mx-2 px-3 py-2 shadow'>
                            <?php echo $value['type_name'] ?>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>


    <div class="products">
        <div class="container">
            <div class="row mx-0">
                <?php
                $searchByType_Id = $product->searchByType_Id(4, $start, $perPage);
                foreach ($searchByType_Id as $key => $value): ?>
                    <div class="col-md-4">
                        <div class="product-item shadow">
                            <a href="product-details.php?id=<?php echo $value['id'] ?>"><img
                                    src="anh/<?php echo $value['image']; ?>" alt=""
                                    style="width: 300px; height: 300px; object-fit: cover;  display: block; margin: auto; filter: contrast(110%) brightness(105%); border-radius: 10px"></a>
                            <div class="down-content">
                                <a href="product-details.php?id=<?php echo $value['id'] ?>">
                                    <h4><?php echo $value['name']; ?></h4>
                                </a>
                                <h6><small><del>$999.00 </del></small> $ <?php echo $value['price']; ?>.00</h6>
                                <p><?php echo substr($value['description'], 0, 100) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-center pb-4 pt-5">
                    <?php echo $product->pageInt($url, $total, $perPage, $page); ?>
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
                                        <input type="text" class="form-control" placeholder="Pick-up date/time"
                                            required="">
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
                                        <input type="text" class="form-control" placeholder="Enter email address"
                                            required="">
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