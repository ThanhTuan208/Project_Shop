<?php
class addToCart extends Database
{
    public function getAllCart()
    {
        $sql = self::$con->prepare('SELECT * FROM addtocart');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getCartItemById($id)
    {
        $sql = self::$con->prepare('SELECT * FROM addtocart WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = $sql->get_result()->fetch_assoc();
        return $item;
    }
    public function getIdProductAddQtyCart($id, $qty, $price)
    {
        $sql = self::$con->prepare('UPDATE addtocart SET qty = qty + ?, price = price + ?
        WHERE product_id IN ( SELECT id FROM products WHERE id = ?)');
        $sql->bind_param('idi', $qty, $price, $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function updateCartById($id, $newQty, $newPrice)
    {
        if ($newQty > 0) {
            $_SESSION['addToCart'][$id]["qty"] = $newQty;

            $sql = self::$con->prepare("UPDATE addToCart SET qty = ?, price = ? WHERE id = ?");
            $sql->bind_param('iii', $newQty, $newPrice, $id);
            $sql->execute();
            if ($sql->affected_rows > 0) {
                echo "Cap nhat thanh cong";
            } else
                echo "Cap nhat that bai";

        } else {
            unset($_SESSION["addToCart"][$id]);
            $sql = self::$con->prepare("DELETE FROM addToCart WHERE id = ?");
            $sql->bind_param('i', $id);
            $sql->execute();
        }
    }

    public function DeleteAllCart($product_id)
    {
        $sql = self::$con->prepare('DELETE FROM `addToCart` WHERE `product_id` = ?');
        $sql->bind_param('i', $product_id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }
}