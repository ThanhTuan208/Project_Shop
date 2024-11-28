<?php
class Item extends Database
{
    public function getAllItem()
    {
        $sql = self::$con->prepare('SELECT * FROM products ORDER BY created_at desc');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllItemByAllTable()
    {
        $sql = self::$con->prepare('SELECT products.*, manufactures.manu_name as nameManu,
        manufactures.authors as authors,
        protypes.type_name as nameType 
        FROM products 
        JOIN manufactures ON manufactures.manu_id = products.manu_id 
        JOIN protypes ON protypes.type_id = products.type_id 
        ORDER BY created_at desc');
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
        JOIN protypes ON protypes.type_id = products.type_id 
        WHERE `description` LIKE ? LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
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
}
