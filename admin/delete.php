<?php
include "../required.php";

$del = isset($_GET["del"]) ? $_GET["del"] : "";

if ($del == "item") {
    $item_id = isset($_GET['item_id']) ? $_GET['item_id'] : 0;
    $product->delete($item_id);
    header('location:itemProducts.php');

} else if ($del == "manu") {
    $manu_id = isset($_GET['manu_id']) ? $_GET['manu_id'] : 0;
    $product->DeleteManu($manu_id);
    header('location:manuProducts.php');

} else if ($del == "user") {
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
    $user->deleteUser($user_id);
    header('location:userProducts.php');
}

