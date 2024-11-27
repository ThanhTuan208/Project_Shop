<?php
class Manufactures extends Database
{
    public function getAllManu()
    {
        $sql = self::$con->prepare('SELECT * FROM manufactures');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}