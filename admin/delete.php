<?php
include "../required.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;
if (isset($id)) {
    $product->delete($_GET['id']);
    header('location:itemProducts.php');
}

$manu_id = isset($_GET['manu_id']) ? $_GET['manu_id'] : 0;
if (isset($manu_id)) {
    $product->DeleteManu($_GET['manu_id']);
    header('location:manuProducts.php');
}
