<?php
class Payment extends Database
{
    public function getAllPayment()
    {
        $sql = self::$con->prepare('SELECT * FROM payment');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function AddPay($user_id, $pro_id, $price, $pay_method, $pay_stt, $qty)
    {
        $sql = self::$con->prepare("INSERT INTO `payment`(`user_id`, `product_id`, `price`, `payment_method`, `payment_status`, `qty`) 
        VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("iidssi", $user_id, $pro_id, $price, $pay_method, $pay_stt, $qty);
        $sql->execute();

        return $sql->affected_rows > 0;
    }

    public function getDataToStatisticalByPay()
    {
        $sql = self::$con->prepare("SELECT product_id, products.name as namePro, image, COUNT(*) AS quantity, SUM(payment.price) AS total   
        FROM payment
        JOIN products ON products.id = payment.product_id
        GROUP BY product_id, namePro, image");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $item;
    }

    public function getQtyByPay()
    {
        $sql = self::$con->prepare("SELECT product_id, products.price as price,products.name as namePro, image, COUNT(*) AS quantity, SUM(payment.price) AS total   
        FROM payment
        JOIN products ON products.id = payment.product_id
        GROUP BY product_id, namePro, price, image
        ORDER BY quantity desc");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $item;
    }
}

