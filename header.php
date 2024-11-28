<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h2>Online Store <em>Website</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about-us.php">About Us</a>
                            <a class="dropdown-item" href="blog.php">Blog</a>
                            <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                            <a class="dropdown-item" href="terms.php">Terms</a>
                            <a class="dropdown-item" href="contact.php">Contact Us</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>

                    <li class="nav-item">
                        <form action="products.php" method="GET" class="form-inline my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search..." aria-label="Search">
                            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>