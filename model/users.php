<?php

class User extends Database
{
    public function getAllUser()
    {
        $sql = self::$con->prepare('SELECT * FROM users ORDER BY ngaydangki desc');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getUserById($id)
    {
        $sql = self::$con->prepare('SELECT * FROM users WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getUserByStartCount($start, $count)
    {
        $sql = self::$con->prepare('SELECT * FROM users ORDER BY ngaydangki desc LIMIT ?, ?');
        $sql->bind_param('ii', $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }


    public function UpdateUser($user_id, $phone, $address)
    {
        $sql = self::$con->prepare("UPDATE users SET phone = ?, address = ? WHERE id = ?");
        $sql->bind_param("ssi", $phone, $address, $user_id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }
    public function UpdatePass($user_id, $pass)
    {
        $sql = self::$con->prepare("UPDATE users SET matkhau = ? WHERE id = ?");
        $sql->bind_param("si", $pass, $user_id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function deleteUser($id)
    {
        $sql = self::$con->prepare('DELETE FROM `users` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        return $sql->affected_rows > 0;
    }

    public function getAllIUserByKeyword($keyword, $start, $count)
    {
        $sql = self::$con->prepare('SELECT *
        FROM users
        WHERE `tendangnhap` LIKE ?
        ORDER BY created_at desc LIMIT ?, ?');
        $keyword = "%$keyword%";
        $sql->bind_param('sii', $keyword, $start, $count);
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
}
