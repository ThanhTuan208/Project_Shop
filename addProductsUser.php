<?php
include "required.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $name = $_GET['name'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    $product_id = $_GET['product_id'];
    if ($_GET["qty"] > 0) {
        $qty = $_GET['qty'];
    } else
        $qty = 1;

    $newPrice = $price * $qty;
    if ($cart->getIdProductAddQtyCart($product_id, $qty, $newPrice)) {
        header("Location:product-details.php?id=" . $product_id);
        exit();
    } else if ($product->AddToCart($name, $price * $qty, $image, $qty, $product_id)) {

        header("Location:product-details.php?id=" . $product_id);
        exit();
    }
} else
    echo "Loi";


