<?php
include "required.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET['id'];

    if ($product->DeleteToCart($id)) {

        header("location:Cart.php");
    }
} else
    echo "Loi";


