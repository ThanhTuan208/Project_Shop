<?php
session_start();
include "required.php";

if (isset($_GET["id"]) && isset($_GET["action"])) {
    $id = $_GET["id"];
    $product_id = $_GET["product_id"];
    $action = $_GET["action"];

    $cartItem = $cart->getCartItemById($id);
    $priceCart = $cartItem["price"];
    $product_id = $cartItem["product_id"];
    $newPrice = $priceCart;
    $productItem = $product->getProductDetail($product_id);
    $priceProduct = $productItem[0]["price"];


    if ($action == "increase") {
        $newQty = $cartItem["qty"] + 1;
        $newPrice += $priceProduct;
    } else if ($action == "decrease" && $cartItem["qty"] > 1) {
        $newQty = $cartItem["qty"] - 1;
        $newPrice -= $priceProduct;
    } else {
        $newQty = 0;
    }

    $cart->updateCartById($id, $newQty, $newPrice);
}
header("location:Cart.php");