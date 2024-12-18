<?php
include "../required.php";

$temp = isset($_POST['add']) ? $_POST['add'] : "";
if ($temp == 'product') {

    $name = $_POST['productName'];
    $manu_id = $_POST['manufacturer'];
    $type_id = $_POST['productType'];
    $price = $_POST['price'];
    $image = $_FILES['productImage']["name"];
    $description = $_POST['description'];
    $feature = $_POST['feature'];
    $author = $_POST['author'];

    if ($product->Add($name, $manu_id, $type_id, $price, $image, $description, $feature, $author)) {

        $target = "../anh/";
        $target_file = $target . basename($_FILES["productImage"]["name"]);
        move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);
        header("location:itemProducts.php");
    }

} else if ($temp == "manu") {
    $authors = $_POST['nameManu'];
    $typeManu = $_POST['typeManu'];
    $image = $_FILES['imageManu']["name"];
    if ($manufactures->AddToManu($typeManu, $image, $authors)) {

        $target = "../anh/";
        $target_file = $target . basename($_FILES["imageManu"]["name"]);
        move_uploaded_file($_FILES["imageManu"]["tmp_name"], $target_file);
        header("location:manuProducts.php");
    }


}


