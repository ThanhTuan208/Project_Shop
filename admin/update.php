<?php
include "../required.php";

$id = $_GET["id"];
$name = $_POST['productName'];
$manu_id = $_POST['manufacturer'];
$type_id = $_POST['productType'];
$price = $_POST['price'];
$description = $_POST['description'];
$feature = $_POST['feature'];

$oldImage = $product->getProductDetail($id);
$image = $oldImage[0]["image"];

if (!empty($_FILES["productImage"]["name"])) {
    $target = "../anh/";
    $image = $_FILES['productImage']["name"];
    $target_file = $target . basename($image);
    move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);

}
if ($product->Update($id, $name, $manu_id, $type_id, $price, $image, $description, $feature)) {
    header("location:itemProducts.php");
} else {
    echo "Cập nhật thất bại";
}



