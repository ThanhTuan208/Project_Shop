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

    public function getDataToStatisticalByPay($start, $count)
    {
        $sql = self::$con->prepare("SELECT product_id, payment.qty as qty, products.name as namePro, products.price as price, image, COUNT(*) AS quantity, SUM(payment.price) AS total   
        FROM payment
        JOIN products ON products.id = payment.product_id
        GROUP BY product_id, namePro, image, qty LIMIT ?, ?");
        $sql->bind_param('ii', $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $item;
    }

    public function sumAllPay()
    {
        $sql = self::$con->prepare("SELECT SUM(payment.price) AS total   
        FROM payment");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_assoc();
        return $item["total"];
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

    public function getUserIdToFindPurchased($id)
    {
        $sql = self::$con->prepare('SELECT *, products.name as namePro, payment.id as idPay, payment.price as pricePay FROM payment
        JOIN users ON payment.user_id = users.id
        JOIN products ON products.id = payment.product_id
        WHERE users.id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getPayByID($id)
    {
        $sql = self::$con->prepare('SELECT *, products.name as namePro, payment.product_id as idPro, products.price as pricePro FROM payment
        JOIN users ON payment.user_id = users.id
        JOIN products ON products.id = payment.product_id
        WHERE payment.id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}

