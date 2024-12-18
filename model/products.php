<?php
class Products extends Database
{
    public function getAllProducts()
    {
        $sql = self::$con->prepare('SELECT * FROM products');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getTopItem($start, $count)
    {
        $sql = self::$con->prepare('SELECT * FROM products ORDER BY created_at desc LIMIT ?, ?');
        $sql->bind_param('ii', $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getFeatureItem($feature, $start, $count)
    {
        $sql = self::$con->prepare('SELECT *, products.id as productID, protypes.type_name as nameType, payment.product_id as ProductPayID, COUNT(payment.product_id) AS quantity FROM products 
        JOIN payment ON payment.product_id = products.id
        JOIN protypes ON products.type_id = protypes.type_id
        WHERE feature = ?
        GROUP BY ProductPayID, nameType,  productID
        LIMIT ?,?');
        $sql->bind_param('iii', $feature, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getMenuByProduct($start, $count)
    {
        $sql = self::$con->prepare('SELECT products.*, manufactures.manu_name as nameManu
        FROM products 
        JOIN manufactures ON manufactures.manu_id = products.manu_id
        ORDER BY created_at desc LIMIT ?, ?');
        $sql->bind_param('ii', $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function TotalCate($keyword)
    {
        $sql = self::$con->prepare('SELECT * FROM products 
        WHERE `description` LIKE ?');
        $keyword = "%$keyword%";
        $sql->bind_param('s', $keyword);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function search($keyword, $start, $count)
    {
        $sql = self::$con->prepare('SELECT *
        FROM products
        WHERE `description` LIKE ? LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function CreatedDesc($keyword, $start, $count)
    {
        $sql = self::$con->prepare('SELECT *
        FROM products
        WHERE `description` LIKE ? ORDER BY created_at desc LIMIT ?, ? ');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function TotalCateByManuId($manu_id)
    {
        $sql = self::$con->prepare('SELECT * FROM products 
        WHERE `manu_id` LIKE ?');
        $sql->bind_param('i', $manu_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function searchFeature($feature, $start, $count)
    {
        $sql = self::$con->prepare('SELECT *
        FROM products
        WHERE `feature` LIKE ? LIMIT ?, ?');
        $sql->bind_param('iii', $feature, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function totalFeature($feature)
    {
        $sql = self::$con->prepare('SELECT *
        FROM products
        WHERE `feature` LIKE ?');
        $sql->bind_param('i', $feature);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function searchByType_Id($type_id, $start, $count)
    {
        $sql = self::$con->prepare('SELECT * FROM products WHERE type_id LIKE ? LIMIT ?, ? ');
        $sql->bind_param('iii', $type_id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function searchCountByType_Id1($type_id)
    {
        $sql = self::$con->prepare('SELECT * FROM products WHERE type_id LIKE ?');
        $sql->bind_param('i', $type_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function pageInt($url, $total, $perPage, $page)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";

        if ($page > 1) {
            $previousPage = $page - 1;
            $link = $link . "<a href='$url&page=$previousPage' class='btn btn-outline-warning mx-2 px-3 py-2 shadow'> <- Previous</a>";
        }
        for ($i = 1; $i <= $totalLinks; $i++) {
            $link = $link . "<a href='$url&page=$i' class='btn btn-outline-warning mx-2 px-3 py-2 shadow'>$i</a>";
        }
        if ($page < $totalLinks) {
            $nextPage = $page + 1;
            $link = $link . "<a href='$url&page=$nextPage' class='btn btn-outline-warning mx-2 px-3 py-2 shadow'>Next -> </a>";
        }
        return $link;
    }

    public function getProductDetail($id)
    {

        $sql = self::$con->prepare('SELECT products.*, manufactures.manu_name as nameManu,
        protypes.type_name as nameType 
        FROM products 
        JOIN manufactures ON manufactures.manu_id = products.manu_id 
        JOIN protypes ON protypes.type_id = products.type_id 
        WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getProductImageById($id)
    {
        $sql = self::$con->prepare('SELECT * FROM products WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_assoc();
        return $item["image"];
    }

    public function getSimilarProduct($id, $start, $count)
    {
        $sql = self::$con->prepare('SELECT * 
         FROM products
        WHERE manu_id = (SELECT manu_id FROM products WHERE id = ?)
        LIMIT ?, ?');
        $sql->bind_param('iii', $id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllAppleProduct($keyword, $start, $count)
    {
        $sql = self::$con->prepare('SELECT * FROM products
        WHERE `description` LIKE ? LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllManuNameProduct($id, $start, $count)
    {
        $sql = self::$con->prepare('SELECT * FROM products 
        WHERE `manu_id` = ? LIMIT ?, ?');
        $sql->bind_param('iii', $id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllItemByAllTable($keyword, $start, $count)
    {
        $sql = self::$con->prepare('SELECT products.*, manufactures.manu_name as nameManu,
        protypes.type_name as nameType 
        FROM products 
        JOIN manufactures ON manufactures.manu_id = products.manu_id 
        JOIN protypes ON protypes.type_id = products.type_id 
        WHERE `description` LIKE ?
        ORDER BY created_at desc  LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function Add($name, $manu_id, $type_id, $price, $image, $description, $feature, $author)
    {
        $sql = self::$con->prepare('INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `authors`) 
        VALUES (?,?,?,?,?,?,?,?) ');
        $sql->bind_param('siiissii', $name, $manu_id, $type_id, $price, $image, $description, $feature, $author);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function AddToCart($name, $price, $image, $qty, $product_id)
    {
        $sql = self::$con->prepare('INSERT INTO `addToCart`(`name`, `price`, `image`, `qty`, `product_id`)
        VALUES (?,?,?,?,?)');
        $sql->bind_param('sdsii', $name, $price, $image, $qty, $product_id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }
    public function Update($id, $name, $manu_id, $type_id, $price, $image, $description, $feature, $author)
    {
        $sql = self::$con->prepare('UPDATE `products` SET `name`=? ,`manu_id`=?,`type_id`= ?,`price`= ?,`image`=?,`description`=?,`feature`= ?, `authors` = ? WHERE `id` = ?');
        $sql->bind_param('siiissiii', $name, $manu_id, $type_id, $price, $image, $description, $feature, $author, $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }
    public function Delete($id)
    {
        $sql = self::$con->prepare('DELETE FROM `products` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function DeleteToCart($id)
    {
        $sql = self::$con->prepare('DELETE FROM `addToCart` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        return $sql;
    }
    public function DeleteManu($manu_id)
    {
        $this->DeleteAllProductsByIdManu($manu_id);
        $sql = self::$con->prepare('DELETE FROM `manufactures` WHERE `manu_id` = ?');
        $sql->bind_param('i', $manu_id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function DeleteAllProductsByIdManu($id)
    {
        $sql = self::$con->prepare('DELETE FROM `products` WHERE `manu_id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }


}


