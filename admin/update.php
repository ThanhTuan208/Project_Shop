<?php
include "../required.php";

$update = isset($_POST["update"]) ? $_POST["update"] : "";
if ($update == "product") {

    $id = $_GET["id"];
    $name = $_POST['productName'];
    $manu_id = $_POST['manufacturer'];
    $type_id = $_POST['productType'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $feature = $_POST['feature'];
    $author = $_POST['author'];

    $oldImage = $product->getProductDetail($id);
    $image = $oldImage[0]["image"];

    if (!empty($_FILES["productImage"]["name"])) {
        $target = "../anh/";
        $image = $_FILES['productImage']["name"];
        $target_file = $target . basename($image);
        move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);

        if ($product->Update($id, $name, $manu_id, $type_id, $price, $image, $description, $feature, $author)) {
            header("location:itemProducts.php");
        } else {
            echo "Cập nhật product thất bại";
        }
    } else
        include "noticeUpdateFail.php";
} else if ($update == "manu") {
    $id = $_GET["id"];
    $authors = $_POST['nameManu'];
    $typeManu = $_POST['typeManu'];
    $image = $_FILES['imageManu']["name"];

    $oldImage = $manufactures->getManuById($id);
    $image = $oldImage[0]["img"];

    if (!empty($_FILES["imageManu"]["name"])) {
        $target = "../anh/";
        $image = $_FILES['imageManu']["name"];
        $target_file = $target . basename($image);
        move_uploaded_file($_FILES["imageManu"]["tmp_name"], $target_file);

    }
    if ($manufactures->UpdateManu($id, $typeManu, $image, $authors)) {
        header("location:manuProducts.php");
    } else {
        include "noticeUpdateFail.php";
    }
} else if ($update == "user") {
    $id = $_GET["id"];
    $pass = $_POST["pass"];

    if ($user->UpdatePass($id, $pass)) {
        header("location:userProducts.php");
    } else
        include "noticeUpdateFail.php";
}



