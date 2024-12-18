<?php
class Prototypes extends Database
{
    public function getAllProtype()
    {
        $sql = self::$con->prepare('SELECT * FROM protypes');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

}

