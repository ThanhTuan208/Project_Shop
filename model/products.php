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
        $sql = self::$con->prepare('SELECT * FROM products WHERE feature = ?  LIMIT ?, ?');
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

    public function searchByType_Id($type_id)
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
        $sql = self::$con->prepare('SELECT * FROM products WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
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
}
