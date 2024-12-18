<?php

include_once "required.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location:./blog.php");
    exit();
}

$query = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($conn, $query);
$blog = mysqli_fetch_assoc($result);

mysqli_free_result($result);

if (!$blog) {
    header("Location: ./blog.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= $blog['blog_title'] ?></title>

    <style>
        .dropdown-toggle-action::after {
            margin-left: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-5">
                <a href="./blog.php" class="btn btn-primary my-2">Quay về</a>

                <h1><?= $blog['blog_title'] ?></h1>

                <div class="d-flex align-items-center my-5">
                    <div
                        style="width: 80px; height: 80px; margin-right: 10px; border-radius: 50%; border: 1px solid #ccc;">
                        <img src="https://png.pngtree.com/png-vector/20220518/ourmid/pngtree-circular-avatar-vector-illustration-male-people-person-male-vector-png-image_36446834.png"
                            alt="" class="rounded-circle w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div>
                        <h1 class="fw-bold mb-0 h4 mb-2"><?= $blog['author'] ?></h1>
                        <p class="mb-0 text-secondary" style="font-size: 12px;"><?= $blog['blog_date'] ?></p>
                    </div>
                </div>

                <div>
                    <?= $blog['blog_content'] ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>