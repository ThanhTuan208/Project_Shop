<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <?php session_start(); ?>
                <h5 style="text-align: center;">Hello <br>
                    <em><?php echo isset($_SESSION['login_user']) ? $_SESSION["login_user"] : "friend" ?></em>
                </h5>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about-us.php">About Us</a>
                            <a class="dropdown-item" href="blog.php">News</a>
                            <a class="dropdown-item" href="contact.php">Contact Us</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">You</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="Cart.php">
                                <i class="fa fa-shopping-cart mr-2"></i>
                                <span>Your cart</span>
                                <?php $totalCart = $cart->getAllCart(); ?>
                                <span
                                    class="badge badge-pill badge-warning ml-auto"><?php echo count($totalCart); ?></span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="yourCart.php">
                                <i class="fa fa-list-alt mr-2"></i>
                                <span>Shopping history</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <form action="products.php" method="GET" class="form-inline my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search..."
                                minlength="1" maxlength="100" aria-label="Search">
                            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AUI/dangnhap.php" <?php session_destroy(); ?>>
                            <i class="bi bi-door-closed-fill fs-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

<script>
    $(document).on('click', '.dropdown-toggle', function (e) {
        var $dropdown = $(this).next('.dropdown-menu');
        if ($dropdown.hasClass('show')) {
            $dropdown.removeClass('show');
        } else {
            $('.dropdown-menu').removeClass('show'); // Ẩn tất cả dropdown khác
            $dropdown.addClass('show'); // Hiển thị dropdown hiện tại
        }
        e.stopPropagation();
    });

    // Đóng dropdown khi click bên ngoài
    $(document).on('click', function () {
        $('.dropdown-menu').removeClass('show');
    });

</script>