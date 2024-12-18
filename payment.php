<?php
include "required.php";
session_start();

$pay = isset($_POST['pay']) ? $_POST['pay'] : "";
if ($pay == "cash") {
    $method = "tiền mặt";
} else {
    $method = "chuyển khoản";
} {
    $user_id = isset($_SESSION['login_id']) ? $_SESSION["login_id"] : 0;

    $yourCart = $cart->getAllCart();
    if (count($yourCart) > 0) {

        $phone = isset($_POST["sdt"]) ? $_POST["sdt"] : "";
        $address = isset($_POST["diachi"]) ? $_POST["diachi"] : "";
        if ($phone == "" && $address == "") {
            include "noticeInviteToEnterInfo.php";
            exit();
        }
        $payment_method = $method;
        foreach ($yourCart as $key => $value) {
            $price = $value["price"];
            $product_id = $value["product_id"];
            $qty = $value["qty"];
            if ($price == 0) {
                $payment_status = "fail";
            } else
                $payment_status = "success";
            $payment->AddPay($user_id, $product_id, $price, $payment_method, $payment_status, $qty);
            $cart->DeleteAllCart($product_id);
        }
        $user->UpdateUser($user_id, $phone, $address);
        include "noticePaySuccess.php";
    } else
        include "noticePayFail.php";
}





