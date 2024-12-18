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
                            <a class="dropdown-item" href="blog.php">Blog</a>
                            <a class="dropdown-item" href="contact.php">Contact Us</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cart.php">
                            <i class="fa fa-shopping-cart"></i>
                            Cart
                            <?php
                            $totalCart = $cart->getAllCart(); ?>
                            <span class="badge badge-pill badge-warning"><?php echo count($totalCart); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="products.php" method="GET" class="form-inline my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search..."
                                aria-label="Search">
                            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AUI/dangnhap.php">
                            <i class="bi bi-door-closed-fill fs-1"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>