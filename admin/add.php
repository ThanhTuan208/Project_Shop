<?php
include "../required.php";

$name = $_POST['productName'];
$manu_id = $_POST['manufacturer'];
$type_id = $_POST['productType'];
$price = $_POST['price'];
$image = $_FILES['productImage']["name"];
$description = $_POST['description'];
$feature = $_POST['feature'];

if ($product->Add($name, $manu_id, $type_id, $price, $image, $description, $feature)) {

    $target = "../anh/";
    $target_file = $target . basename($_FILES["productImage"]["name"]);
    move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);
    header("location:itemProducts.php");
}


