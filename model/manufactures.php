<?php
class Manufactures extends Database
{
    public function getAllManu()
    {
        $sql = self::$con->prepare('SELECT * FROM manufactures ORDER BY manu_id desc');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getAllManuStartCount($start, $count)
    {
        $sql = self::$con->prepare('SELECT * FROM manufactures ORDER BY manu_id desc LIMIT ?, ?');
        $sql->bind_param('ii', $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getImageByIdManu($id_manu)
    {
        $sql = self::$con->prepare('SELECT * FROM manufactures WHERE manu_id = ?');
        $sql->bind_param('i', $id_manu);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_assoc();
        return $item["img"];
    }


    public function getManuById($id_manu)
    {
        $sql = self::$con->prepare('SELECT * FROM manufactures WHERE manu_id = ?');
        $sql->bind_param('i', $id_manu);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function AddToManu($name, $image, $authors)
    {
        $sql = self::$con->prepare('INSERT INTO `manufactures`(`manu_name`, `img`, `authors`)
        VALUES (?,?,?)');
        $sql->bind_param('sss', $name, $image, $authors);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function UpdateManu($id, $name, $image, $authors)
    {
        $sql = self::$con->prepare('UPDATE `manufactures` SET `manu_name`=?,`img`=?, `authors`=? WHERE `manu_id` = ?');
        $sql->bind_param('sssi', $name, $image, $authors, $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

}